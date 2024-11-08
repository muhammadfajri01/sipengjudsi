<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role == 'mahasiswa') {
            // jika level admin, maka hanya boleh akses route cekdatapasien dan postdatapasien
            if (in_array($request->route()->getName(), ['judul', 'judul-tambah', 'judulstore', 'juduledit', 'judulupdate', 'juduldelete', 'judulbukti', 'judulbuktipost', 'judulsuratpengantar'])) {
            // if ($request->route()->getName() == 'judulall') {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        } elseif ($user->role == 'superadmin') {
            return $next($request);
        } elseif ($user->role == 'prodi') {
            // jika level kasir, maka hanya boleh akses route yang diizinkan
            if (in_array($request->route()->getName(), ['prodi', 'prodi.juduledit','prodi.judulupdate'])) {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        } elseif ($user->role == 'staffprodi') {
            // jika level dokter, maka hanya boleh akses route yang diizinkan
            if (in_array($request->route()->getName(), ['staffprodi', 'staffprodi.suratadd', 'staffprodi.suratupdate', 'staffprodi.rekapitulasi'])) {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        } else {
            return redirect()->back()->with('error', 'Level tidak valid');
        }
    }
}
