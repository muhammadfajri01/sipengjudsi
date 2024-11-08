@extends('template.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Upload Bukti Pembayaran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('staffprodi.suratupdate', $data->id) }}" method="POST" id="dataForm" enctype="multipart/form-data" >
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
                    <p>Nama File : {{ $data->bukti_pembayaran }}</p>
                    <img src="{{ asset('bukti/' . $data->bukti_pembayaran) }}" alt="" srcset="" width="200">
                </div>
                <div class="mb-3">
                    <label for="formFile1" class="form-label">Upload Surat Bimbingan</label>
                    @if($data->surat_bimbingan)
                        <p>{{ $data->surat_bimbingan }}</p>
                        <h6>Atau Ganti</h6>
                    @else
                        <p>Belum diupload</p>
                    @endif
                    <input class="form-control" type="file" id="formFile1" name="surat">
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
                <a href="{{ route('staffprodi') }}" class="btn btn-secondary" >Kembali</a>
            </form>
        </div>
    </div>
@endsection
