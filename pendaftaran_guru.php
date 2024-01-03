<?php

    $koneksi = mysqli_connect("localhost","root","","uas");
    if(isset($_POST["submit"])){

        $Nip = $_POST["nip"];
        $Nama = $_POST["nama"];
        $Gumapel = $_POST["gumapel"];
        
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $folder_tujuan = '';
        $gambar_path = $folder_tujuan . $gambar_name;

        move_uploaded_file($gambar_tmp,$gambar_path);

        $query = "INSERT INTO guru VALUES ('','$Nip','$Nama', '$Gumapel','$gambar_path')";


        mysqli_query($koneksi,$query);

        if(isset($_POST)>0){
            echo "<script>
            alert('formulir telah terkirim :)');
            document.location.href = 'daftar_guru.php';
            </script>";
        }else {
            echo "<script>
            alert('formulir gagal terkirim :(');
            document.location.href = 'pendaftaran_guru.php';
            </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Guru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Formulir Pendaftaran Guru</h2>


        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nip">Nip : </label>
                <input type="text" class="form-control" name="nip" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" name="nama" required>
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
