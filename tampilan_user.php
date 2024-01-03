<?php
$koneksi = mysqli_connect("localhost", "root", "", "uas");

$query = "SELECT * FROM biodata WHERE waktu_submit >= NOW() - INTERVAL 10 SECOND";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Halaman Untuk User</title>
</head>
<body>

<div class="kertas">
    <h3>FORMULIR PENDAFTARAN</h3>
    <hr>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= $row['gambar']; ?>" alt="Foto" style="width: 80px; float: right; margin: 10px;">
            </div>
            <div class="col-md-8">
                <p>Nama : <?= $row['nama']; ?></p>
                <p>Nim : <?= $row['nim']; ?></p>
                <p>Alamat : <?= $row['alamat']; ?></p>
                <p>Tanggal Lahir : <?= $row['tanggal_lahir']; ?></p>
                <p>Jenis Kelamin : <?= $row['jenis_kelamin']; ?></p>
                <p>Program Studi : <?= $row['prodi']; ?></p>
                <p>Fakultas : <?= $row['fakultas']; ?></p>
                <p>Universitas : <?= $row['universitas']; ?></p>
                <p>Tanggal Pendaftaran : <?= $row['waktu_submit']; ?></p>
            </div>
        </div>
    <?php endwhile; ?>
        <hr>
    <div class="tombol">
    <a href="cetak_user.php"> Cetak | <i class="bi bi-printer-fill"></i> </a>
    </div>
        
</div>


</body>
<style>
    body{
        margin: auto;
        background-color: whitesmoke ;
    }
    h3{
        text-align: center;
    }
    .kertas{
        width: 400px;
        height: 500px;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        box-sizing: border-box;
        border: 1.5px solid black;
    }
    img{
        width: 100px;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid black;
    }
    a{
        text-decoration: none;
        background-color: blue ;
        padding: 5px 10px;
        color: white;
        border: 1.5px solid black;  
    }
    a:hover{
        color: white;
        background-color: mediumblue;
    }
    
    .tombol{
        text-align: center;
        margin-top: 30px;
        
    }
</style>
</html>

<?php
mysqli_close($koneksi);
?>
