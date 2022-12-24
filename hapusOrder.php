<?php
//delete order
include 'config.php';
$idpembelian = $_GET['ORDID'];
$query = "DELETE FROM pembelian WHERE id_pembelian = '$idpembelian'";
$result = mysqli_query($koneksi , $query);
if ($result) {
    echo "
        <script>
            alert('Order berhasil dihapus');
            document.location.href = 'order.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus order');
            document.location.href = 'order.php';
        </script>";
            echo '<br>';
            echo mysqli_error($koneksi);
}

