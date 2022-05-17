<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Auth;
// use Datatables;
use DB;
// use Input;
use Spreadsheet_Excel_Reader;
use Excel;

use App\User;
use App\Soal;
use App\Models\mataPelajaran;
use App\Models\Detailsoal;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

class UjianController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $user = Auth::user();
    $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
    $kelas = Kelas::all();
    return view('pages.teacher.ujian.showUjianList', compact('user', 'soals', 'mapel','kelas'));
  }
  public function dataSoal()
  {
    $user = Auth::user();
    $soals = Soal::where('id_user', Auth::user()->id)->get();
    $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
    $kelas = Kelas::all();
    return Datatables::of($soals)
      ->editColumn('waktu', function ($soals) {
        return $soals->waktu . ' menit';
      })
      ->editColumn('jenis', function ($soals) {
        if ($soals->jenis == 1) {
          return '<center><span class="label label-success">Ujian</label></center>';
        } else {
          return '<center><span class="label label-info">Latihan</label></center>';
        }
      })
      ->editColumn('kkm', function ($soals) {
        return "<center>" . $soals->kkm . "</center>";
      })
      ->addColumn('action', function ($soals) {
        return '<div style="text-align:center"><a href="soal/ubah/' . $soals->id . '" class="btn btn-success btn-xs">Ubah</a> <a href="soal/detail/' . $soals->id . '" class="btn btn-primary btn-xs">Detail</a></div>';
      })
      ->rawColumns(['jenis', 'action', 'kkm'])->make(true);
  }
  public function dataSoalHome()
  {
    $user = Auth::user();
    $soals = Soal::where('id_user', Auth::user()->id)->get();
    $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
    $kelas = Kelas::all();
    return Datatables::of($soals)
      ->editColumn('waktu', function ($soals) {
        return '<center>' . $soals->waktu . ' menit</center>';
      })
      ->editColumn('jenis', function ($soals) {
        if ($soals->jenis == 1) {
          return '<span class="label label-success">Ujian</label>';
        } else {
          return '<span class="label label-info">Latihan</label>';
        }
      })
      ->editColumn('kkm', function ($soals) {
        return "<center>" . $soals->kkm . "</center>";
      })
      ->addColumn('action', function ($soals) {
        return '<div style="text-align:center"><a href="elearning/soal/ubah/' . $soals->id . '" class="btn btn-success btn-xs">Ubah</a> <a href="elearning/soal/detail/' . $soals->id . '" class="btn btn-primary btn-xs">Detail</a></div>';
      })
      ->rawColumns(['waktu', 'jenis', 'action', 'kkm'])->make(true);
  }
  public function detail(Request $request)
  {
    $user = Auth::user();
      $id_soal = $request->id;
      $user = User::where('id', Auth::user()->id)->first();
      $soal = Soal::where('id', $request->id)->first();
      $soals = Detailsoal::where('id_soal', $request->id)->get();
      $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
      $kelas = Kelas::all();
      return view('soal.detail', compact('user', 'soal', 'soals', 'kelas', 'id_soal', 'mapel'));
  }
  public function dataDetailSoal(Request $request)
  {
    $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
    $kelas = Kelas::all();
    $soals = Detailsoal::where('id_soal', Input::get('id'));
    return Datatables::of($soals)
      ->editColumn('Role', function ($soals) {
        if ($soals->Role == 'Y') {
          return "<center><span class='label label-success'>Tampil</span></center>";
        } else {
          return "<center><span class='label label-danger'>Tidak tampil</span></center>";
        }
      })
      ->editColumn('kunci', function ($soals) {
        return '<center>' . $soals->kunci . '</center>';
      })
      ->editColumn('score', function ($soals) {
        return '<center>' . $soals->score . '</center>';
      })
      ->addColumn('action', function ($soals) {
        return '<div style="text-align:center"><a href="ubah/' . $soals->id . '" class="btn btn-success btn-xs">Ubah</a> <a href="data-soal/' . $soals->id . '" class="btn btn-primary btn-xs">Detail</a></div>';
      })
      ->rawColumns(['soal', 'kunci', 'kelas', 'mapel', 'score', 'action', 'Role'])
      ->make(true);
  }

  public function ubahSoal(Request $request)
  {
    $user = Auth::user();
      $soal = Soal::where('id', $request->id)->first();
      $user = User::where('id', Auth::user()->id)->first();
      $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
      $kelas = Kelas::all();
      return view('pages.teacher.ujian.form.ubah', compact('user', 'soal', 'mapel', 'kelas'));
  }


  // for crud
  public function simpanSoal(Request $request)
  {
    if ($request['kelas'] == "") {
      return "Kelas tidak boleh kosong.";
    } elseif ($request['mapel'] == "") {
      return "Nama mata pelajaran soal tidak boleh kosong.";
    } elseif ($request['deskripsi'] == "") {
      return "Deskripsi tidak boleh kosong.";
    } elseif ($request['waktu'] == "") {
      return "Waktu tidak boleh kosong.";
    } else {
      return "Anda harus memilih materi soal untuk latihan.";
      }
      if ($request['id'] == 'N') {
        $query = new Soal;
        $query->id_user = Auth::user()->id;
      } else {
        $query = Soal::where('id', $request['id'])->first();
      }
      $query->kelas = $request['kelas'];
      $query->mapel = $request['mapel'];
      $query->deskripsi = $request['deskripsi'];
      $query->kkm = $request['kkm'];
      $query->waktu = $request['waktu'];
      $query->save();
      return 'ok';
    }
  }
  public function simpanDetailSoal(Request $request)
  {
    if ($request->soal == "") {
      return "Soal tidak boleh kosong.";
    } elseif ($request->kunci == "") {
      return "Kunci jawaban soal tidak boleh kosong.";
    } elseif ($request->score == "") {
      return "Score soal tidak boleh kosong.";
    } elseif ($request->Role == "") {
      return "Role soal tidak boleh kosong.";
    } else {
      if ($request->id == 'N') {
        $query = new Detailsoal;
        $query->id_soal = $request->id_soal;
        $query->id_user = Auth::user()->id;
        $query->sesi = $request->sesi;
      } else {
        $query = Detailsoal::where('id', $request->id)->first();
      }
      $query->soal = $request->soal;
      $query->pila = $request->pila;
      $query->pilb = $request->pilb;
      $query->pilc = $request->pilc;
      $query->pild = $request->pild;
      $query->pile = $request->pile;
      $query->kunci = $request->kunci;
      $query->score = $request->score;
      $query->Role = $request->Role;
      $query->save();
      return 'ok';
    }
  }
  public function ubahDetailSoal(Request $request)
  {
    if (Auth::user()->Role == 'G' or Auth::user()->Role == 'A') {
      $id_soal = $request->id;
      $user = User::where('id', Auth::user()->id)->first();
      $soal = Detailsoal::where('id', $request->id)->first();
      return view('soal.form.ubah', compact('user', 'soal', 'id_soal'));
    } else {
      return redirect()->route('home.index');
    }
  }
  public function detailDataSoal(Request $request)
  {
    if (Auth::user()->Role == 'G' or Auth::user()->Role == 'A') {
      $id_soal = $request->id;
      $user = User::where('id', Auth::user()->id)->first();
      $soal = Detailsoal::where('id', $request->id)->first();
      return view('soal.detailSoal', compact('user', 'soal', 'id_soal'));
  }

  public function simpanDetailSoalExcel(Request $request)
  {
    $sesi = md5(rand(0000000000, mt_getrandmax()));
    $baris = 1;
    $sukses = 0;
    $gagal = 0;
    $kesalahan = '';
    if ($request->hasFile('file')) {
      $path = $request->file('file')->getRealPath();
      $data = Excel::load($request->file('file'), function ($reader) {
      })->get();
      foreach ($data as $data_arr) {
        foreach ($data_arr as $key => $value) {
          $jumlah = $key;
          if ($value->id_soal == '') {
            if ($kesalahan) {
              $kesalahan = $kesalahan . '<br>- Kode soal kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            } else {
              $kesalahan = $kesalahan . '- Kode soal kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            }
            return view('ujian.hasil_upload_via_excel', compact('sukses', 'gagal', 'jumlah', 'kesalahan'));
          } elseif ($value->soal == '') {
            if ($kesalahan) {
              $kesalahan = $kesalahan . '<br>- Soal kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            } else {
              $kesalahan = $kesalahan . '- Soal kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            }
            return view('ujian.hasil_upload_via_excel', compact('sukses', 'gagal', 'jumlah', 'kesalahan'));
          } elseif ($value->kunci_jawaban == '') {
            if ($kesalahan) {
              $kesalahan = $kesalahan . '<br>- Pilihan jawaban kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            } else {
              $kesalahan = $kesalahan . '- Pilihan jawaban kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            }
            return view('ujian.hasil_upload_via_excel', compact('sukses', 'gagal', 'jumlah', 'kesalahan'));
          } elseif ($value->score == '') {
            if ($kesalahan) {
              $kesalahan = $kesalahan . '<br>- Score kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            } else {
              $kesalahan = $kesalahan . '- Score kosong pada baris <b>' . $baris . '</b>, proses upload dihentikan. Silahkan cek file Excel Anda lalu upload kembali.';
            }
            return view('ujian.hasil_upload_via_excel', compact('sukses', 'gagal', 'jumlah', 'kesalahan'));
          }
          $query = new Detailsoal;
          $query->id_soal = $value->id_soal;
          $query->soal = $value->soal;
          $query->pila = $value->pilihan_a;
          $query->pilb = $value->pilihan_b;
          $query->pilc = $value->pilihan_c;
          $query->pild = $value->pilihan_d;
          $query->pile = $value->pilihan_e;
          $query->kunci = $value->kunci_jawaban;
          $query->score = $value->score;
          $query->id_user = Auth::user()->id;
          $query->Role = 'Y';
          $query->sesi = $sesi;
          if ($query->save()) {
            $sukses = $sukses + 1;
          }
        }
      }
      if ($sukses > $jumlah) {
        $sukses == $jumlah;
      }
      $aktifitas = new Aktifitas;
      $aktifitas->id_user = Auth::user()->id;
      $aktifitas->nama = 'Mengupload data detail soal via Excel. Jumlah data ' . $jumlah . ', sukses diupload sebanyak: ' . $sukses . ' dan gagal diupload sebanyak: ' . $gagal;
      $aktifitas->save();
      return view('soal.hasil_upload_via_excel', compact('sukses', 'gagal', 'jumlah', 'kesalahan'));
    } else {
      return redirect()->route('soal');
    }
  }

  public function saveEssay(Request $request)
  {
    return $request;
  }
}
