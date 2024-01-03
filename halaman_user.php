<?php

    $koneksi = mysqli_connect("localhost","root","","uas");
    if(isset($_POST["submit"])){

        $Nim = $_POST["nim"];
        $Nama = $_POST["nama"];
        $Alamat = $_POST["alamat"];
        $Tanggal_lahir = $_POST["tanggal_lahir"];
        $Jenis_kelamin = $_POST["jenis_kelamin"];
        $Prodi = $_POST["prodi"];
        $Fakultas = $_POST["fakultas"];
        $Universitas = $_POST["universitas"];
        
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $folder_tujuan = '';
        $gambar_path = $folder_tujuan . $gambar_name;

        move_uploaded_file($gambar_tmp,$gambar_path);

        $query = "INSERT INTO biodata VALUES ('','$Nim','$Nama', '$Alamat','$Tanggal_lahir',
        '$Jenis_kelamin','$Prodi', '$Fakultas','$Universitas','$gambar_path', NOW())";


        mysqli_query($koneksi,$query);

        if(isset($_POST)>0){
            echo "<script>
            alert('formulir telah terkirim :)');
            document.location.href = 'tampilan_user.php';
            </script>";
        }else {
            echo "<script>
            alert('formulir gagal terkirim :(');
            document.location.href = 'index.php';
            </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Formulir Pendaftaran Mahasiswa</h2>


        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nim">Nim : </label>
                <input type="text" class="form-control" name="nim" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" name="nama" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat : </label>
                <textarea class="form-control" name="alamat" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir : </label>
                <input type="date" class="form-control" name="tanggal_lahir" required >
            </div>

            <div class="form-group">
                <label>Jenis Kelamin : </label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki" required>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" required>
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="prodi">Program Studi : </label>
                <input type="text" class="form-control" name="prodi" required>
            </div>

            <div class="form-group">
                <label for="fakultas">Fakultas : </label>
                <input type="text" class="form-control" name="fakultas" required>
            </div>

            <div class="form-group">
                <label for="universitas">Universitas : </label>
                <input type="text" class="form-control" name="universitas" required>
            </div>

            <div class="form-group">
                <label for="gambar">Foto : </label>
                <input type="file" class="form-control-file" name="gambar" accept="image/*" required>
            </div>


            <button type="submit" class="btn btn-primary" name="submit">Kirim <i class="bi bi-send-fill"></i></button>
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
