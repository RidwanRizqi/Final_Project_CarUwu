<?php
include '../config.php';
$idmobil = $_GET['MBLID'];

$mobil = mysqli_query($koneksi, " SELECT gambar_mobil, gambarSlide_mobil FROM mobil WHERE id_mobil = '$idmobil' ");
$result = mysqli_fetch_array($mobil);
$gambarMobil = $result['gambar_mobil'];
$gambarSlideMobil = $result['gambarSlide_mobil'];
unlink("../img/cars/$gambarMobil");
unlink("../img/slideshow/$gambarSlideMobil");

$query = "DELETE FROM mobil WHERE id_mobil = '$idmobil'";
$result = mysqli_query($koneksi , $query);
if ($result) {
    echo "
        <script>
            alert('Mobil berhasil dihapus');
            document.location.href = 'mobil.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus order');
            document.location.href = 'mobil.php';
        </script>";
    echo '<br>';
    echo mysqli_error($koneksi);
}
