<?php

$host = "localhost";
$user= "root";
$pw = "";
$db = "uas";
$conn = mysqli_connect($host,$user,$pw,$db);
if(!$conn){
    die("koneksi gagal" .mysqli_connect_error());
 
}

function ubah($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_GET['id'])) {
    $id = ubah ($_GET['id']);

    $sql = "SELECT * FROM biodata WHERE id = $id";
    $hasil = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($hasil);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST["id"]);
    $Nim = ubah($_POST["nim"]);
    $Nama = ubah($_POST["nama"]);
    $Alamat = ubah($_POST["alamat"]);
    $Tanggal_lahir = ubah($_POST["tanggal_lahir"]);
    $Jenis_kelamin = ubah ($_POST["jenis_kelamin"]);
    $Prodi = ubah ($_POST["prodi"]);
    $Fakultas = ubah ($_POST["fakultas"]);
    $Universitas = ubah ($_POST["universitas"]);
    

    $gambar_lama = ubah($_POST["gambar_lama"]);

    if (!empty($_FILES['gambar']['name'])) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $folder_tujuan = '';
        $gambar_path = $folder_tujuan . $gambar_name;

        move_uploaded_file($gambar_tmp, $gambar_path);
    } else {
        $gambar_path = $gambar_lama;
    }


    $sql = "UPDATE biodata SET
    nim = '$Nim',
    nama = '$Nama',
    alamat = '$Alamat',
    tanggal_lahir = '$Tanggal_lahir',
    jenis_kelamin = '$Jenis_kelamin',
    prodi = '$Prodi',
    fakultas = '$Fakultas',
    universitas = '$Universitas',
    gambar = '$gambar_path'
    WHERE id = $id";

    $hasil = mysqli_query($conn,$sql);

    
    if(isset($hasil)>0){
        echo "<script>
        alert('Data Berhasil Di Ubah :) ');
        document.location.href = 'halaman_admin.php';
        </script>";
    }else {
        echo "<script>
        alert('Data Gagal Di Ubah :( ');
        document.location.href = 'halaman_admin.php';
        </script>";
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Ubah Data Mahasiswa</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      
        <input type="hidden" name="id" value="<?= $data["id"];?>">
      
        <div class="form-group">
                <label for="nim">Nim : </label>
                <input type="text" class="form-control" name="nim" required value="<?= $data["nim"];?>">
            </div>

            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" name="nama" required value="<?= $data["nama"];?>">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat : </label>
                <textarea class="form-control" name="alamat" rows="4" required > <?= $data["alamat"];?></textarea>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir : </label>
                <input type="date" class="form-control" name="tanggal_lahir" required value="<?= $data["tanggal_lahir"];?>">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin : </label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki" required >
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" required>
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="prodi">Program Studi : </label>
                <input type="text" class="form-control" name="prodi" required value="<?= $data["prodi"];?>">
            </div>

            <div class="form-group">
                <label for="fakultas">Fakultas : </label>
                <input type="text" class="form-control" name="fakultas" required value="<?= $data["fakultas"];?>">
            </div>

            <div class="form-group">
                <label for="universitas">Universitas : </label>
                <input type="text" class="form-control" name="universitas" required value="<?= $data["universitas"];?>">
            </div>

           
            <div class="form-group">
                <label for="gambar">Foto Saat Ini:</label>
                <br>
                <?php if (!empty($data["gambar"])) : ?>
                    <img src="<?= $data["gambar"]; ?>" alt="Foto Saat Ini" width="100">
                <?php else : ?>
                    <p>Tidak Ada Foto Saat Ini</p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="gambar">Upload Foto Baru (kosongkan jika tidak ingin mengganti): </label>
                <input type="file" class="form-control-file" name="gambar" accept="image/*">
            </div>
            <input type="hidden" name="gambar_lama" value="<?= $data["gambar"]; ?>">


            <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<style>
    body {
            background-image: url('IMG20220723183920.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(1px);
        }
        .form-group{
            color: white ;
            
        }

        h2{
            color: white;
        }

        .form-control {
            border: 2px solid black; 
        }
        .btn-primary {
            width: 100%; 
            margin-top: 15px; 
            margin-bottom: 30px;
            border: 2px solid white;
        }
</style>
</html>
