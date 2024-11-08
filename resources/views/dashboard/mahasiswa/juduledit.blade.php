@extends('template.main')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Form Tambah Data Judul</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('judulupdate', $data->id) }}" method="POST" id="dataForm" >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan judul" required value="{{ $data->title }}">
                </div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Abstrak</label>
                    <div id="editor" style="height: 200px;">{{ $data->abstrak }}</div>
                    <input type="hidden" name="abstrak" id="abstract">
                    <div class="word-count" id="wordCount">Jumlah kata: 0 / 150</div>
                    <div class="error text-danger" id="errorMessage" style="display: none;">Abstrak harus diisi dan tidak boleh lebih dari 150 kata.</div>
                </div>
                <button type="submit" class="btn btn-primary">edit Data</button>
                <a href="{{ route('judul') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Inisialisasi Quill
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Update word count
    function updateWordCount() {
        const text = quill.getText().trim();
        const words = text ? text.split(/\s+/) : [];
        const wordCount = words.length;
        $('#wordCount').text(`Jumlah kata: ${wordCount} / 150`);

        // Tampilkan pesan kesalahan jika jumlah kata lebih dari 150
        if (wordCount > 150) {
            $('#errorMessage').show();
            return false;
        } else if (wordCount < 1) {
            return false;
        } else {
            $('#errorMessage').hide();
            return true;
        }
    }

    // Listen for text change in Quill editor
    quill.on('text-change', function() {
        updateWordCount();
    });

    $('#dataForm').on('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form default
        if (!updateWordCount()) {
            $('#errorMessage').show();
            return;
        }
        $('#errorMessage').hide();
        $('#abstract').val(quill.root.innerText); // Ambil konten dari Quill
        this.submit(); // Kirim form
    });
</script>
@endpush
