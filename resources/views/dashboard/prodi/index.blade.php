@extends('template.main')

@section('title')
    Halaman Prodi
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Judul Mahasiswa</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th style="width: 40%;">Abstrak</th>
                        <th>Status</th>
                        <th style="width: 10%;">Alasan</th>
                        <th>Aksi</th>
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
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('prodi.juduledit', $p->id) }}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
</script>
@endpush

