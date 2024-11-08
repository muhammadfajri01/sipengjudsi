@extends('template.main')

@section('title')
Selamat datang di halaman StaffProdi
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar Judul Mahasiswa Yang Diterima </h5>
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
                    <th>Alasan</th>
                    <th>Bukti Pembayaran</th>
                    <th style="width: 5%;">Aksi</th>
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
                    <td>{{ $p->status }}</td>
                    <td>
                        @if ($p->alasan != null)
                            {{ $p->alasan }}
                        @else
                            <p class="text-center">-</p>
                        @endif
                    </td>
                    <td>
                        @if ($p->bukti_pembayaran != null)
                        <p class="badge badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i></p>
                        @else
                        <p class="badge badge-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('staffprodi.suratadd', $p->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-upload" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Data Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
