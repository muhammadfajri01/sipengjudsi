<?php

namespace App\Http\Controllers;

use App\Models\judul;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = judul::where('status', 'diterima')->get();
        return view('dashboard.index',compact('data'));
    }
}
