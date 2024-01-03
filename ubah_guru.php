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

    $sql = "SELECT * FROM guru WHERE id = $id";
    $hasil = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($hasil);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST["id"]);
    $Nip = ubah($_POST["nip"]);
    $Nama = ubah($_POST["nama"]);
    $Gumapel = ubah($_POST["gumapel"]); 

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


    $sql = "UPDATE guru SET
    nip = '$Nip',
    nama = '$Nama',
    gumapel = '$Gumapel',
    gambar = '$gambar_path'
    WHERE id = $id";

    $hasil = mysqli_query($conn,$sql);

    
    if(isset($hasil)>0){
        echo "<script>
        alert('Data Berhasil Di Ubah :) ');
        document.location.href = 'daftar_guru.php';
        </script>";
    }else {
        echo "<script>
        alert('Data Gagal Di Ubah :( ');
        document.location.href = 'daftar_guru.php';
        </script>";
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Guru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Ubah Data Guru</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      
        <input type="hidden" name="id" value="<?= $data["id"];?>">
      
        <div class="form-group">
                <label for="nim">Nip : </label>
                <input type="text" class="form-control" name="nip" required value="<?= $data["nip"];?>">
            </div>

            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" name="nama" required value="<?= $data["nama"];?>">
            </div>

            <div class="form-group">
                <label for="gumapel">Guru Mata Pelajaran :</label>
                <select class="form-control" name="gumapel" required>
                    <option value="" disabled selected>Pilih Mata Pelajaran</option>
                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="biologi">Biologi</option>
                    <option value="ekonomi">Ekonomi</option>
                    <option value="fisika">Fisika</option>
                    <option value="geografi">Geografi</option>
                    <option value="kimia">Kimia</option>
                    <option value="matematika">Matematika</option>
                    <option value="matematika p">Matamatika Peminatan</option>
                    <option value="agama">Pendidikan Agama Dan Budi Pekerti</option>
                    <option value="pkn">Pendidikan Pancasila Dan Kewarganegaraan</option>
                    <option value="penjas">Pendidikan Jasmani,Kesehatan,Dan Olah Raga</option>
                    <option value="prakarya">Prakarya Dan Kewirausahaan</option>
                    <option value="sejarah">Sejarah Indonesia</option>
                    <option value="sosiologi">Sosiologi</option>
                    <option value="seni">Seni Budaya</option>
                </select>
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
            background-image: url('jmbtn.jpg'); 
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
