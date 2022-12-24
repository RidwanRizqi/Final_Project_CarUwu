<?php
//delete pembelian
include '../config.php';
$idpembelian = $_GET['ORDID'];
$query = "DELETE FROM pembelian WHERE id_pembelian = '$idpembelian'";
$result = mysqli_query($koneksi , $query);
if ($result) {
    echo "
        <script>
            alert('Pembelian berhasil dihapus');
            document.location.href = 'pembelian.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus pembelian');
            document.location.href = 'pembelian.php';
        </script>";
    echo '<br>';
    echo mysqli_error($koneksi);
}

