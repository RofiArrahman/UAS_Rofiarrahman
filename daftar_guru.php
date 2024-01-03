<?php
require 'koneksi.php';

$panggil = query("SELECT * FROM guru");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Daftar Guru</title>
</head>
<body>
    <h1>Daftar Guru</h1>
    

    <table border="1" cellpadding="10" cellspacing="0">
        
        <tr>
            <th>No.</th>
            <th>Nip</th>
            <th>Nama</th>
            <th>Guru Mata Pelajaran</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
       
        <?php $no = 1; ?>
        <?php foreach($panggil as $row) : ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row["nip"];?></td>
                <td><?= $row["nama"];?></td>
                <td><?= $row["gumapel"];?></td>
                <td><img src="/ProjekUAS/<?= $row["gambar"];?>" width="90" ></td>
                <td><a href="hapus_guru.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="bi bi-trash"></i></a>|<a href="ubah_guru.php?id=<?= $row["id"];?>"><i class="bi bi-pencil-square"></i></a></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</body>
<style>

h1 {
    text-align: center;
}

td, th {
    text-align: center;
    font-size: 18px;
    font-family: 'Times New Roman', Times, serif;
}

table {
    margin: auto;
    border-collapse: collapse; 
}

a {
    text-decoration: none;
    color: black;
}

a:hover {
    color: blue;
}
</style>
</html>
