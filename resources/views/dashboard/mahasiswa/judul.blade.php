@extends('template.main')

@section('title')
    Selamat datang di halaman judul
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Judul Anda</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('judul-tambah') }}" class="btn btn-primary my-1">TAMBAH</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th style="width: 50%;">Abstrak</th>
                        <th>Status</th>
                        <th>Alasan</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
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
                            <td>
                                @if ($p->alasan != null)
                                    {{ $p->alasan }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('juduledit', $p->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('juduldelete', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                @if ($p->status == 'diterima')
                                    <a href="{{ route('judulbukti', $p->id) }}" class="btn btn-warning m-1 text-sm">Upload
                                        Bukti Pembayaran</a>
                                @endif
                                @if ($p->surat_bimbingan != null)
                                    <a href="{{ route('judulsuratpengantar', $p->id) }}"
                                        class="btn btn-success m-1 text-sm">Download Surat bimbingan</a>
                                @endif
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
