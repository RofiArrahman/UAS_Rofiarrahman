<?php

$koneksi = mysqli_connect("localhost","root","","uas");
if (!$koneksi) {
    die ("koneksi gagal");
}

function query($query){
    global $koneksi;
    
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function panggil($data){
        global $koneksi;

        $Nim = $data["nim"];
        $Nama = $data["nama"];
        $Alamat = $data["alamat"];
        $Tanggal_lahir = $data["tanggal_lahir"];
        $Jenis_kelamin = $data["jenis_kelamin"];
        $Prodi = $data["prodi"];
        $Fakultas = $data["fakultas"];
        $Universitas = $data["universitas"];
        $gambar = $data["gambar"];


        $query = "INSERT INTO biodata VALUES ('','$Nim','$Nama',
        '$Alamat','$Tanggal_lahir','$Jenis_kelamin','$Prodi',
        '$Fakultas','$Universitas','$gambar')";

        mysqli_query($koneksi,$query);

        return mysqli_affected_rows($koneksi);
        
}

    function hapus ($id){
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM biodata WHERE id = $id");
        return mysqli_affected_rows($koneksi); 
    }


    function ubah ($data){
        global $koneksi;

        $id = $data["id"];
        $Nim = $data["nim"];
        $Nama = $data["nama"];
        $Alamat = $data["alamat"];
        $Tanggal_lahir = $data["tanggal_lahir"];
        $Jenis_kelamin = $data["jenis_kelamin"];
        $Prodi = $data["prodi"];
        $Fakultas = $data["fakultas"];
        $Universitas = $data["universitas"];
        $gambar = $data["gambar"];

        $query = "UPDATE biodata SET
        nim = '$Nim',
        nama = '$Nama',
        alamat = '$Alamat',
        tanggal_lahir = '$Tanggal_lahir',
        jenis_kelamin = '$Jenis_kelamin',
        prodi = '$Prodi',
        fakultas = '$Fakultas',
        universitas = '$Universitas',
        gambar = '$gambar'
        WHERE id = $id";

        mysqli_query($koneksi,$query);

        return mysqli_affected_rows($koneksi);

    }




    function register($data){
        global $koneksi;

        $name = $data["name"];
        $username = $data["username"];
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
        $role = $data["role"];

        if($password !== $password2) {
            echo "<script>
                    alert('Konfirmasi password tidak sesusai!');
                  </script>";
            return false;
        } 
        return 1;
    }




    function hapus_guru ($id){
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM guru WHERE id = $id");
        return mysqli_affected_rows($koneksi); 
    }



?>


