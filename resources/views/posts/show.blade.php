@extends('app')

@section('title', $post->title)

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-4 p-md-5">
            <div class="mb-3">
                <a href="{{ route('posts.index') }}"
                   class="btn btn-outline-secondary btn-sm">
                    &larr; Kembali ke Daftar
                </a>
            </div>

            <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

            <p class="text-secondary">
                Dipublikasikan pada
                {{ $post->created_at->format('d F Y, H:i') }}
            </p>

            @if ($post->image)
                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    class="article-image mb-4"
                    alt="{{ $post->title }}"
                >
            @endif

            @if ($post->excerpt)
                <p class="lead">{{ $post->excerpt }}</p>
            @endif

            <hr>

            <div class="content-body">{{ $post->body }}</div>

            <hr class="my-4">

            <a href="{{ route('posts.edit', $post) }}"
               class="btn btn-warning">
                Edit Artikel
            </a>

            <form action="{{ route('posts.destroy', $post) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Hapus Artikel
                </button>
            </form>
        </div>
    </div>
@endsection
