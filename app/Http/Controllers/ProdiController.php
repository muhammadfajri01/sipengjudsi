<?php

namespace App\Http\Controllers;

use App\Models\judul;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $data = judul::all();
        return view('dashboard.prodi.index',compact('data'));
    }

    public function edit($id)
    {
        $data = judul::find($id);
        return view('dashboard.prodi.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = judul::find($id);
        $data->status = $request->status;
        $data->alasan = $request->alasan;
        $data->save();

        return redirect()->route('prodi');
    }
}
