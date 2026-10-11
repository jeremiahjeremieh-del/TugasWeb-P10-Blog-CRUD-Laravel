@extends('app')

@section('title', 'Daftar Artikel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Daftar Artikel</h2>
            <p class="text-secondary mb-0">
                Kelola artikel blog kamu di sini.
            </p>
        </div>

        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            + Tambah Artikel
        </a>
    </div>

    <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari judul atau isi artikel..."
                value="{{ request('search') }}"
            >

            <button class="btn btn-dark" type="submit">Cari</button>

            @if (request('search'))
                <a href="{{ route('posts.index') }}"
                   class="btn btn-outline-secondary">
                    Reset
                </a>
            @endif
        </div>
    </form>

    @if ($posts->count())
        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <x-card>
                        @if ($post->image)
                            <img
                                src="{{ asset('storage/' . $post->image) }}"
                                class="card-img-top"
                                alt="{{ $post->title }}"
                                style="height: 200px; object-fit: cover;"
                            >
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">
                                {{ $post->title }}
                            </h5>

                            <p class="text-secondary small">
                                {{ $post->created_at->format('d-m-Y H:i') }}
                            </p>

                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($post->excerpt ?: $post->body, 110) }}
                            </p>

                            <div class="mt-auto d-flex flex-wrap gap-2">
                                <a href="{{ route('posts.show', $post) }}"
                                   class="btn btn-sm btn-primary">
                                    Detail
                                </a>

                                <a href="{{ route('posts.edit', $post) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('posts.destroy', $post) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </x-card>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="alert alert-info">
            @if (request('search'))
                Artikel dengan kata kunci tersebut tidak ditemukan.
            @else
                Belum ada artikel. Silakan tambahkan artikel pertama.
            @endif
        </div>
    @endif
@endsection
