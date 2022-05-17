<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\mataPelajaran;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $dashboard['Kelas'] = Kelas::all()->count();
        $dashboard['mataPelajaran'] = mataPelajaran::all()->count();
        $dashboard['teacher'] = User::whereRole('teacher')->get()->count();
        $dashboard['student'] = User::whereRole('student')->get()->count();

        return view('dashboard.index', compact('dashboard'));
    }
}
