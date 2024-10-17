<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Custom style for the sidebar */
        .sidebar {
            height: 100vh; /* Full height */
            position: fixed; /* Fixed Sidebar (stay in place when scrolling) */
            top: 0; /* Stay at the top */
            left: 0; /* Stay at the left */
            z-index: 100; /* Sit on top of everything else */
            background-color: #f8f9fa; /* Light background */
            padding-top: 20px; /* Top padding */
            box-shadow: 2px 0 5px rgba(0,0,0,0.1); /* Add shadow for better visibility */
        }

        .sidebar img {
            width: 100%; /* Membuat gambar mengisi lebar sidebar */
            height: auto; /* Mengatur tinggi secara otomatis agar proporsional */
            max-height: 100px; /* Maksimal tinggi gambar */
            object-fit: contain; /* Memastikan gambar tetap dalam proporsi */
            margin-bottom: 20px; /* Memberikan jarak di bawah gambar */
        }

        .content {
            margin-left: 250px; /* Space for the sidebar */
            padding: 20px; /* Padding for content */
        }

        .nav-link {
            color: #495057; /* Dark text color for links */
        }

        .nav-link.active {
            background-color: #007bff; /* Primary color for active link */
            color: #fff; /* White text for active link */
        }
    </style>
</head>
<body>
    @if (Auth::check())
    <div class="sidebar">
        <img src="{{ asset('images/wikrama-logo.png') }}" alt="logo" class="img-fluid">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ ('home') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('data.index') ? 'active' : '' }}" href="{{ route('data.index') }}">
                    <i class="fas fa-user-graduate"></i> Data Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('users.index') }}">
                    <i class="fas fa-user"></i> Kelola Akun
                </a>
            </li>
            <li class="nav-item">
                <form class="d-inline" action="{{ 'logout'}}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
    @endif

    <div class="content">
        <div class="container mt-5">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    @stack('script')
</body>
</html>
