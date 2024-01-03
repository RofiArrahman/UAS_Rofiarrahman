<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-dark .navbar-brand {
            color: #ffffff;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-title {
            color: #007bff;
        }

        .sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            color: #ffffff;
            transition: all 0.3s;
            position: fixed;
            height: 100%;
            overflow-y: auto;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            display: block;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="halaman_user.php">Halaman User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="halaman_kepala.php">Halaman Kepala</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="halaman_admin.php">Halaman Admin</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="sidebar-sticky">
                <h5 class="text-center text-white mb-4">Sidebar</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="daftar_guru.php">
                            <i class="fas fa-chalkboard-teacher"></i> Daftar Guru
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pendaftaran_guru.php">
                            <i class="fas fa-user-plus"></i> Pendaftaran Guru
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

       <!-- Content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Selamat datang di Dashboard Admin</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="sma.png" class="card-img-top" alt="School Image">
                    <div class="card-body">
                        <h5 class="card-title">Info Sekolah</h5>
                        <p class="card-text">Nama Sekolah: SMAN 7 Tanjung Jabung Timur</p>
                        <p class="card-text">Alamat: Jl. Manunggal</p>
                        <p class="card-text">Akreditasi B</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Info Organisasi di Sekolah</h5>
                        <p class="card-text">SMA Negeri 7 Tanjung Jabung Timur memiliki beberapa organisasi yang aktif di antaranya:</p>
                        <ul>
                            <li>OSIS (Organisasi Siswa Intra Sekolah)</li>
                            <li>Rohis (Rohani Islam)</li>
                            <li>Pramuka</li>
                            <li>Paskibraka</li>
                            <li>PMR (Palang Merah Remaja)</li>
                            
                        </ul>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">kegiatan Siswa-Siswi</h5>
                        <p class="card-text">Beberapa kegiatan yang pernah di ikuti siswa-siswi SMA Negeri 7 Tanjung Jabung Timur:</p>
                        <ul>
                            <li>Lomba Sains Harapan Pramuka (LSHRP)</li>
                            <li>Bupati Cup Sepak Bola</li>
                            <li>Kaligrafi Tingkat Kabupaten</li>
                            <li>Paskibraka Tingkat Kabupaten</li>
                            <li>Bujang Dan Gadis Tingkat Kabupaten</li>
                            <li>Jambore Tingkat Nasional</li>
                            <li>Raimuna Tingkat Nasional</li>
                            <li>Pelatihan PMR</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
