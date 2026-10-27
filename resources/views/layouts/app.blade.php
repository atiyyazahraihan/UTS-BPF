<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Biodata CV')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #eef0f3; }
        .cv { max-width: 900px; margin: 0 auto; border: 1px solid #dcdfe4; }
        .cv-header { text-align: center; padding: 22px 16px; border-bottom: 3px solid #2d3748; }
        .cv-header h1 { font-size: 1.9rem; letter-spacing: 3px; font-weight: 700; margin: 0; }
        .cv-header p { margin: 4px 0 0; color: #555; letter-spacing: 1px; }
        .cv-side { background: #f3f4f6; }
        .cv h6.section {
            text-transform: uppercase; letter-spacing: 1px; font-weight: 700;
            border-bottom: 2px solid #2d3748; padding-bottom: 4px; margin: 18px 0 10px;
        }
        .cv-photo { width: 160px; height: 200px; object-fit: cover; border: 3px solid #fff; box-shadow: 0 0 6px rgba(0,0,0,.2); }
        .thumb { width: 48px; height: 60px; object-fit: cover; border-radius: 4px; }
        @media print { .no-print { display: none !important; } body { background: #fff; } .cv { border: 0; } }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4 no-print">
    <div class="container">
        <a class="navbar-brand" href="{{ route('biodata.index') }}">Biodata CV</a>
    </div>
</nav>

<div class="container pb-5">
    @if (session('success'))
        <div class="alert alert-success no-print">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger no-print">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>
