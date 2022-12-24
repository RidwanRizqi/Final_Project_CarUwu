<?php
include '../config.php';
$idberita = $_GET['NWSID'];

$berita = mysqli_query($koneksi, " SELECT gambar_berita FROM berita WHERE id_berita = '$idberita' ");
$result = mysqli_fetch_array($berita);
$gambarBerita = $result['gambar_berita'];
unlink("../img/news/$gambarBerita");

$query = "DELETE FROM berita WHERE id_berita = '$idberita'";
$result = mysqli_query($koneksi , $query);
if ($result) {
    echo "
        <script>
            alert('Berita berhasil dihapus');
            document.location.href = 'berita.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus berita');
            document.location.href = 'berita.php';
        </script>";
    echo '<br>';
    echo mysqli_error($koneksi);
}
