@extends('template.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Form Tambah Data Judul</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('prodi.judulupdate', $data->id) }}" method="POST" id="dataForm" >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <p>{{ $data->title }}</p>
                </div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Abstrak</label><br>
                    <p>{{ $data->abstrak }} </p>

                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label><br>
                    <select class="form-select" id="status" name="status" aria-label="Default select example">
                        <option {{ $data->status == 'belum diproses' ? 'selected' : '' }} value="belum diproses">belum diproses</option>
                        <option {{ $data->status == 'diterima' ? 'selected' : '' }} value="diterima">Diterima</option>
                        <option {{ $data->status == 'ditolak' ? 'selected' : '' }} value="ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan</label>
                    <input type="text" class="form-control" name="alasan" id="alasan" placeholder="Masukkan judul" value="{{ $data->alasan }}">
                </div>
                <button type="submit" class="btn btn-primary">edit Data</button>
            </form>
        </div>
    </div>
@endsection
