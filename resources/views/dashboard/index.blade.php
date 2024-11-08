@extends('template.main')

@section('title')
<h3>Halaman Home</h3>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar Judul Mahasiswa yang Diterima</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th style="width: 40%;">Abstrak</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->user->nim }}</td>
                    <td>{{ $p->user->nama }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->abstrak }}</td>
                    <td>
                        @if ($p->status == 'diterima')
                            <span class="badge badge-success bg-green-500">Diterima</span>
                        @elseif ($p->status == 'ditolak')
                            <span class="badge badge-danger bg-red-500">Ditolak</span>
                        @else
                            <span class="badge badge-secondary bg-gray-500">Belum di Proses</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
