<?php 

require "koneksi.php";
$id = $_GET["id"];

if(hapus_guru($id)>0){
    echo "<script>
    alert('Data telah Dihapus :)');
    document.location.href = 'daftar_guru.php';
    </script>";
}else {
    echo "<script>
    alert('Data gagal Dihapus :(');
    document.location.href = 'daftar_guru.php';
    </script>";
}
?>