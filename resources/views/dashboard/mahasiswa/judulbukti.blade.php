@extends('template.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Upload Bukti Pembayaran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('judulbuktipost', $data->id) }}" method="POST" id="dataForm" enctype="multipart/form-data" >
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
                    <label for="formFile" class="form-label">Bukti Pembayaran</label>
                    @if($data->bukti_pembayaran)
                        <p>{{ $data->bukti_pembayaran }}</p>
                        <h6>Atau Ganti</h6>
                    @else
                        <p>Belum diupload</p>
                    @endif
                    <input class="form-control" type="file" id="formFile" name="bukti">
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
                <a href="{{ route('judul') }}" class="btn btn-secondary" >Kembali</a>
            </form>
        </div>
    </div>
@endsection
