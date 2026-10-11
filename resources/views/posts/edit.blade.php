@extends('app')

@section('title', 'Edit Artikel')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Edit Artikel</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('posts.update', $post) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $post->title) }}"
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
                    >{{ old('excerpt', $post->excerpt) }}</textarea>

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
                    >{{ old('body', $post->body) }}</textarea>

                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if ($post->image)
                    <div class="mb-3">
                        <label class="form-label">Gambar saat ini</label>

                        <img
                            src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            style="max-width: 250px; max-height: 180px;"
                            class="d-block rounded mb-2"
                        >
                    </div>
                @endif

                <div class="mb-4">
                    <label for="image" class="form-label">
                        Ganti Gambar (opsional)
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="form-control @error('image') is-invalid @enderror"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Maksimal 2 MB.
                    </div>

                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </form>
        </div>
    </div>
@endsection
