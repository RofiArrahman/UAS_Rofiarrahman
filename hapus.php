<?php 

require "koneksi.php";
$id = $_GET["id"];

if(hapus($id)>0){
    echo "<script>
    alert('Data telah Dihapus :)');
    document.location.href = 'halaman_admin.php';
    </script>";
}else {
    echo "<script>
    alert('Data gagal Dihapus :(');
    document.location.href = 'halaman_admin.php';
    </script>";
}
?>