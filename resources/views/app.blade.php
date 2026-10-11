
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Blog CRUD Laravel')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            color: #212529;
        }

        .navbar {
            background: #172554;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #bfdbfe;
        }

        .page-container {
            max-width: 1100px;
            margin: 35px auto;
        }

        .article-image {
            width: 100%;
            max-height: 350px;
            object-fit: cover;
            border-radius: 10px;
        }

        .content-body {
            white-space: pre-line;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">
                Blog CRUD
            </a>

            <a href="{{ route('posts.create') }}"
               class="btn btn-light btn-sm">
                + Artikel Baru
            </a>
        </div>
    </nav>

    <main class="container page-container">
        <x-alert />
        @yield('content')
    </main>

    <footer class="text-center text-secondary py-4">
        <small>Blog CRUD Laravel &copy; {{ date('Y') }}</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
