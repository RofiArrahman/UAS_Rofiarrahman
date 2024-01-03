<?php

require 'koneksi.php';
$panggil = query("SELECT * FROM biodata");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.</title>
</head>
<body onload="print()">
        <h1>DAFTAR PENDAFTAR</h1>
        <table border="1" cellpadding="10" cellspacing="0">
       
        <form action="" method="post">
        
        </form>

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
            backdrop-filter: blur(30px);
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
            font-weight: bold;
            background-color: dodgerblue ;
            padding: 5px 10px;
            color: white;
        }
        a:hover{
            color: black;
        }
        input{
            color: white;
            background-color: red;
            margin-bottom: 10px;
        }
        input:hover{
            background-color: blue;
        }
        .tombol{
            text-align: right;
        }
</style>
</html>