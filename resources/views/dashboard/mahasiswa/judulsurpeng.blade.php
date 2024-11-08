@extends('template.main')

@section('title')
Download
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar Judul Anda</h5>
    </div>
    <div class="card-body">
        <iframe src="{{ asset('surat/'.$data->surat_bimbingan) }}" frameborder="0"></iframe>
    </div>
</div>
@endsection
