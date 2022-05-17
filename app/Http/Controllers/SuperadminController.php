<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Kelas;
use App\mataPelajaran;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SuperadminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.superadmin.home', compact('user', $user));
    }

    //Role Middleware For Admin
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Superadmin');
    }
    public function profilePicture()
    {
        $user = Auth::user();
        return view('pages.superadmin.profile.picture', compact('user', $user));
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
    public function createAdmin(Request $request)
    {
        $this->validate($request,[
            "name" => 'required',
            "nama_sekolah" => 'required',
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "password" => 'required|min:5',
        ]);
        $request['password'] = bcrypt($request['password']);
        $admin = User::create([
            'name'=> $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'password' => $request->input('password'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'alamat' => $request->input('alamat'),

        ]);
        $admin->roles()->attach(Role::where('name', 'Admin')->first());
        


        return back()->with('success','Sekolah telah berhasil ditambahkan...');
    }

    public function showCreateAdmin()
    {
        $user = Auth::user();
    	return view('pages.superadmin.admin.createAdmin', compact('user'));
    }

    public function EditPasswordAdmin($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $admin = User::findOrFail($id);
        User::find($admin->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Password was successfully updated!');

        return redirect()->back();
    }

    public function showProfileAdmin($id)
    {
        $user = Auth::user();
        $admin = User::findOrFail($id);
    	return view('pages.superadmin.admin.profile.profilePage', compact('user', 'admin'));
    }

    public function editProfileAdmin($id, Request $request)
    {

        $this->validate($request,[
            'nama_sekolah' => 'required',
            'username' => 'required',
            'email' => 'email',
            'no_telp' => 'required',
        ]);
        $admin = User::findOrFail($id);
        $admin->nama_sekolah = $request->nama_sekolah;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->no_telp = $request->no_telp;
        $admin->save();


        $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

        return redirect()->back();
    }

    public function searchAdmin(Request $request)
	{
        $user = Auth::user(); // Untuk Photo Profile

		// menangkap data pencarian
		$search = $request->table_search;

    		// mengambil data dari table materi sesuai pencarian data
        $search = User::whereHas('roles', function($q){
            $q->where('name', 'Admin');
        })->where('name','like',"%".$search."%")
        ->orWhere('username','like',"%".$search."%")
        ->get();


    		// mengirim data materi ke view index
		return view('pages.superadmin.admin.showAdminFiltered', compact('search', 'user') );
    }

    /**
     * This is For Delete Teacher User
     *
     */
    public function deleteAdmin($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('success', 'Admin Berhasil diHapus.');
    }

    // Profile
    /*
     * This is For Profile Picture
     *
     */
    public function profilePictureAdmin($id)
    {
        $user = Auth::user();
        $admin = User::findOrFail($id);
        return view('pages.superadmin.admin.profile.picture', compact('user', 'admin',));
    }

    public function updateAvatarAdmin($id, Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $admin = User::findOrFail($id);

        $avatarName = $admin->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $admin->avatar = $avatarName;
        $admin->save();

        return back()
            ->with('success','You have successfully upload image.');
    }

    public function showAdminList()
    {
        $user = Auth::user(); // Untuk Photo Profile

        $admin = User::whereHas('roles', function($q){
            $q->where('name', 'Admin');
        })->get();

        return view('pages.superadmin.admin.showAdminList', compact('user', 'admin',));
    }

}
?>