<?php
$koneksi = mysqli_connect("localhost", "root", "", "uas");

$query = "SELECT * FROM biodata WHERE waktu_submit >= NOW() - INTERVAL 15 SECOND";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Untuk User</title>
</head>
<body onload="print()">

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
        
</div>

</body>
<style>
    body {
        margin: 0;
        background-color: white;
    }
    h3 {
        text-align: center;
    }
    .kertas {
        margin: auto;
        background-color: white;
        padding: 20px;
        box-sizing: border-box;
        border: 1.5px solid black;
    }
    img {
        width: 100px;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid black;
    }

    @media print {
        body * {
            visibility: hidden;
        }
        .kertas, .kertas * {
            visibility: visible;
        }
        .kertas {
            width: 100%;
            margin: 0;
            border: 1.5px solid black;
            
        }
    }
</style>
</html>

<?php
mysqli_close($koneksi);
?>
