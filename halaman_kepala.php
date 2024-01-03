<?php

require 'koneksi.php';
$panggil = query("SELECT * FROM biodata");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Daftar pendaftar</title>
</head>
<body>
        <h1>DAFTAR PENDAFTAR</h1>
        <table border="1" cellpadding="10" cellspacing="0">
       
        <form action="" method="post">

        <div class="tombol">
        <a href="pdf.php"> <i class="bi bi-download"></i> | downloadpdf</a>
        </div>

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
            
               
            
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>

        
        
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

        h1{
            text-align: center;
        }
        td{
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
        }
        th{
            font-size: 22px;
            font-family: 'Times New Roman', Times, serif;
        }
        a{
            text-decoration: none;
            background-color: red ;
            padding: 5px 10px;
            color: white;
            border: 2px solid black;  
        }
        a:hover{
            color: white;
            background-color: blue;
        }
       
        .tombol{
            text-align: right;
            margin-bottom: 10px;
        }
</style>
</html>