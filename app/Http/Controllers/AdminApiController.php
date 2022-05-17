<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['message' => 'Success','data' => $users]);
    }
}
