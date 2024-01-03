<?php
require 'koneksi.php';

if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    $panggil = query("SELECT * FROM biodata WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%'");
} else {
    $panggil = query("SELECT * FROM biodata");
}

if (isset($_GET['tampilkan_semua'])) {
    $panggil = query("SELECT * FROM biodata");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Daftar Pendaftar</title>
</head>
<body>
    <h1>Daftar Pendaftar</h1>
    
    <div class="container">
        <div class="search-form">
            <form action="" method="GET">
                <input type="text" name="cari" placeholder="Cari berdasarkan Nama atau Nim"  style="width: 300px;">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <?php if (isset($_GET['cari'])) : ?>
                <a href="?tampilkan_semua" class="tampilkan_semua">Tampilkan Semua</a>
            <?php endif; ?>
        </div>
    </div>

    <table border="1" cellpadding="10" cellspacing="0">
        <a href="halaman_user.php">Tambah<i class="bi bi-person-add"></i></a>
        <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
            <th>Fakultas</th>
            <th>Universitas</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
       
        <?php $no = 1; ?>
        <?php foreach($panggil as $row) : ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row["nim"];?></td>
                <td><?= $row["nama"];?></td>
                <td><?= $row["alamat"];?></td>
                <td><?= $row["tanggal_lahir"];?></td>
                <td><?= $row["jenis_kelamin"];?></td>
                <td><?= $row["prodi"];?></td>
                <td><?= $row["fakultas"];?></td>
                <td><?= $row["universitas"];?></td>
                <td><img src="/ProjekUAS/<?= $row["gambar"];?>" width="100" ></td>
                <td><a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="bi bi-trash"></i></a>|<a href="ubah.php?id=<?= $row["id"];?>"><i class="bi bi-pencil-square"></i></a></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</body>
<style>
    body {
        background-image: url('Logo_UIN_STS_Jambi.JPG'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        backdrop-filter: blur(2px);
        background-size: contain;    
    }
    a i{
        width: 30px;
    }
    h1 {
        text-align: center;
    }

    td {
        font-size: 18px;
        font-family: 'Times New Roman', Times, serif;
    }

    th {
        font-size: 22px;
        font-family: 'Times New Roman', Times, serif;
    }

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        color: blue;
    }

    .container {
        display: flex;
        justify-content: flex-end;
        
    }

    .search-form {
        display: flex;
    }

    form {
        display: flex;
        margin-left: auto;
    }

    input {
        padding: 8px;
        margin-right: 5px;
        border: 1.5px solid black;
    }

    button {
        padding: 8px;
        cursor: pointer;
        background-color: white;
    }
    .tampilkan_semua {
        text-decoration: none;
        font-size: 16px;
        padding: 5px;
        color: black;
    }

    .tampilkan_semua:hover {
        color: blue;
    }
</style>
</html>
