<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Materi;
use App\mataPelajaran;
use App\Exercise;
use App\Question;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use PDF;

class StudentController extends Controller
{
    //Index method for Student Controller
    public function index()
    {
        $user = Auth::user();
        return view('pages.student.home', compact('user', $user));
    }

    //Role Middleware For Student
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('auth');
        $this->middleware('role:Student');
    }

     /*
     * This is For Profile Picture
     *
     */
    public function profilePicture()
    {
        $user = Auth::user();
        return view('pages.student.profile.picture', compact('user', $user));
    }

    public function updateAvatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }

    /*
     * This is For Profile
     *
     */
    public function showProfile()
    {
    	$user = Auth::user();
    	return view('pages.Student.profile.profilePage', compact('user', $user));
    }

    public function editProfile($id, Request $request)
    {

            $this->validate($request,[
                'name' => 'required',
                'tgl_lahir' => 'required',
                'nisn' => 'required',
                'username' => 'required',
                'email' => 'email',
                'no_telp' => 'required',
            ]);
            $request['password'] = bcrypt($request['password']);
            $user = Auth::user();
            $user->name = $request->name;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->nisn = $request->nisn;
            $user->agama = $request->agama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
            $user->save();

            $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

            return redirect()->back();


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditPassword($id, Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Password was successfully updated!');

        return redirect()->back();
    }

    /* --------------------------------------------- MATERI SECTION --------------------------------- */
    /**
     * Show Mapel sesuai dengan kelas
     *
     */
    public function showMapel()
    {
        $user = Auth::user();
        $mapels = mataPelajaran::get();
    	return view('pages.student.materi.showMapel', compact('user', 'mapels'));
    }



    /**
     * Show Materi-Materi sesuai dengan kelas dan mapel
     *
     */
    public function showMateriList($id)
    {
        $user = Auth::user();

        $mapel = mataPelajaran::findOrFail($id);

        $materis = Materi::where('kelas', $user->kelas)->where('mapel', $mapel->nama_mapel)->get();

    	return view('pages.student.materi.showMateriList', compact('user', 'mapel', 'materis'));
    }

    public function showSingleMateri($id)
    {
        $user = Auth::user();

        $singleMateri = Materi::findOrFail($id);

        return view('pages.student.materi.showSingleMateri', compact('user', 'singleMateri'));
    }

    public function exportPdf($id)
    {
    	$singleMateri = Materi::findOrFail($id);

        $pdf = PDF::loadview('pages.student.materi.exportPdf', compact('singleMateri') );

        return $pdf->download('materi.pdf');
    }

    /* -------------------------------------------- END OF MATERI SECTION ------------------------------------------ */


    public function showMapelTugas()
    {
        $user = Auth::user();
        $mapels = mataPelajaran::get();
    	return view('pages.student.tugas.showMapel', compact('user', 'mapels'));
    }

    public function showTugasList($id)
    {
        $user = Auth::user();

        $mapel = mataPelajaran::findOrFail($id);

        $exercises = Exercise::where('kelas', $user->kelas)->where('mapel', $mapel->nama_mapel)->get();

    	return view('pages.student.tugas.showTugasList', compact('user', 'mapel', 'exercises'));
    }

    public function showSingleTugas($id)
    {
        $user = Auth::user();

        $singleExercise = Exercise::findOrFail($id);

        return view('pages.student.tugas.showSingleTugas', compact('user', 'singleExercise'));
    }

    public function showCreateJawaban()
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
        $exercise = Exercise::all(); // Untuk Show List Kelas - Select
        return view('pages.Student.Jawaban.createJawaban', compact('user', 'exercise'));
    }

    public function createJawaban(Request $request)
    {
        $this->validate($request,[
            'isi' => 'required',
            'file' => 'required|mimes:pdf,docx,doc,pptx,ppt,xls,xlsx,jpeg,png,jpg,mp4|',
            
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_tugas';
		$file->move($tujuan_upload,$nama_file);
        //$mapel = mataPelajaran::findOrFail($id);
        $mapel = mataPelajaran::findOrFail($id);
        $exercise = Exercise::findOrFail($id);

        Materi::create([
            'isi' => $request->isi,
            'file' => $nama_file,
            'user_id_student' => Auth::user()->id,
        ]);

        return back()->with('success','Jawaban Tugas Berhasil dikirim.');
    }

    // public function showCreateExercise()
    // {
    //     $user = Auth::user(); // Untuk Photo Profile
    //     $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
    //     $exercises = Exercise::all(); // Untuk Show List Kelas - Select
    //     return view('pages.teacher.exercise.createExercise', compact('user', 'mapel', 'kelas') );
    // }

    // public function createJawaban(Request $request)
    // {
    //     $this->validate($request,[
    //         'mapel' => 'required',
    //         'exercise' => 'required',
    //         'isi' => 'required',
    //         'file' => 'required|mimes:pdf,docx,doc,pptx,ppt,xls,xlsx,jpeg,png,jpg,mp4|',
    //     ]);

    //     $file = $request->file('file');
 
	// 	$nama_file = time()."_".$file->getClientOriginalName();
 
    //   	        // isi dengan nama folder tempat kemana file diupload
	// 	$tujuan_upload = 'file_jawaban';
	// 	$file->move($tujuan_upload,$nama_file);

    //     Exercise::create([
    //         'id_mapel' => $request->mapel,

    //         //Assign the "mutated" kelas value to kelas column
    //         'id_exercise' => collect($request->exercise)->implode(', '),
    //         'deskripsi' => $request->deskripsi,
    //         'file' => $nama_file,
    //         'user_id_student' => Auth::user()->id,
    //     ]);

    //     return back()->with('success','Tugas Berhasil Terkirim.');
    // }
}
