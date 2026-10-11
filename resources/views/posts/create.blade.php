@extends('app')

@section('title', 'Tambah Artikel')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Tambah Artikel Baru</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('posts.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        required
                    >

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="excerpt" class="form-label">Ringkasan</label>

                    <textarea
                        id="excerpt"
                        name="excerpt"
                        rows="3"
                        maxlength="500"
                        class="form-control @error('excerpt') is-invalid @enderror"
                    >{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Isi Artikel</label>

                    <textarea
                        id="body"
                        name="body"
                        rows="8"
                        class="form-control @error('body') is-invalid @enderror"
                        required
                    >{{ old('body') }}</textarea>

                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">
                        Gambar Artikel (opsional)
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="form-control @error('image') is-invalid @enderror"
                    >

                    <div class="form-text">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </div>

                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Artikel
                </button>

                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@endsection
