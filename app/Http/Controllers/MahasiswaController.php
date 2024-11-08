<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\judul;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function judul()
    {
        $data = judul::where('user_id', auth()->user()->id)->get();
        return view('dashboard.mahasiswa.judul',compact('data'));
    }

    public function judultambah()
    {
        return view('dashboard.mahasiswa.judultambah');
    }

    public function judulStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'abstrak' => 'required|string',
        ]);

        $data = new judul();
        $data->title = $request->title;
        $data->abstrak = $request->abstrak;
        $data->user_id = auth()->user()->id;
        $data->save();

        return redirect()->route('judul');
    }

    public function judulEdit($id)
    {
        $data = judul::find($id);
        return view('dashboard.mahasiswa.juduledit',compact('data'));
    }

    public function judulUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'abstrak' => 'required|string',
        ]);

        $data = judul::find($id);
        $data->title = $request->title;
        $data->abstrak = $request->abstrak;
        $data->save();

        return redirect()->route('judul');
    }

    public function judulDelete($id)
    {
        $data = judul::find($id);
        $data->delete();
        return redirect()->route('judul');
    }

    public function judulbukti($id)
    {
        $data = judul::find($id);
        return view('dashboard.mahasiswa.judulbukti',compact('data'));
    }

    public function judulbuktipost(Request $request, $id)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $file = $request->file('bukti');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move(public_path('bukti/'),$newName);

        $data = judul::find($id);
        $data->bukti_pembayaran = $newName;
        $data->save();
        return redirect()->route('judul');
    }

    public function judulsurpeng($id)
    {
        $data = judul::find($id);
        $filePath = public_path('surat/' . $data->surat_bimbingan);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->route('dashboard');
            // return redirect()->back()->with('error', 'Surat bimbingan tidak ditemukan');
        }
    }
}
