<?php
include '../config.php';
$idberita = $_GET['NWSID'];
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
