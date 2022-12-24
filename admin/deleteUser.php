<?php
include '../config.php';
$iduser = $_GET['USRID'];

$user = mysqli_query($koneksi, " SELECT ktp FROM user WHERE id_user = '$iduser' ");
$result = mysqli_fetch_array($user);
$gambarKTP = $result['ktp'];
unlink("../img/user/ktp/$gambarKTP");

$query = "DELETE FROM user WHERE id_user = '$iduser'";
$result = mysqli_query($koneksi , $query);
if ($result) {
    echo "
        <script>
            alert('User berhasil dihapus');
            document.location.href = 'user.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus user');
            document.location.href = 'user.php';
        </script>";
    echo '<br>';
    echo mysqli_error($koneksi);
}

