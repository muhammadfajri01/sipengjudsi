<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\judul;

class StaffProdiController extends Controller
{
    public function index()
    {
        $data = judul::where('status', 'diterima')->whereNotNull('bukti_pembayaran')->get();
        return view('dashboard.staffprodi.index', compact('data'));
    }

    public function edit($id)
    {
        $data = judul::find($id);
        return view('dashboard.staffprodi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'surat' => 'required|max:10240',
        ]);

        $file = $request->file('surat');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000, 1001238912) . "." . $ext;
        $file->move(public_path('surat/'), $newName);

        $data = judul::find($id);
        $data->surat_bimbingan = $newName;
        $data->save();

        return redirect()->route('staffprodi');
    }

    public function rekapitulasi(Request $request)
    {
        // dd($request->all());
        if ($request->has('start') && $request->has('end')) {
            $start = date('Y-m-d', strtotime(request('start')));
            $end = date('Y-m-d', strtotime(request('end')));
            $data = judul::where('status', 'diterima')
                ->whereBetween('created_at', [$start, $end])
                ->get();
            $data2 = judul::where('status', 'diterima')
                ->whereNotNull('bukti_pembayaran')
                ->whereBetween('created_at', [$start, $end])
                ->get();
            $data3 = judul::where('status', 'diterima')
                ->whereNull('bukti_pembayaran')
                ->whereBetween('created_at', [$start, $end])
                ->get();
        } else {
            $data = judul::where('status', 'diterima')->get();
            $data2 = judul::where('status', 'diterima')->whereNotNull('bukti_pembayaran')->get();
            $data3 = judul::where('status', 'diterima')->whereNull('bukti_pembayaran')->get();
        }
        return view('dashboard.staffprodi.rekapitulasi', compact('data', 'data2', 'data3'));
    }
}
