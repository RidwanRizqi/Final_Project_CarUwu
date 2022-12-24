<?php
//delete order
include '../config.php';
$idsparepart = $_GET['PRTID'];
$query = "DELETE FROM sparepart WHERE id_sparepart = '$idsparepart'";
$result = mysqli_query($koneksi , $query);
if ($result) {
    echo "
        <script>
            alert('Sparepart berhasil dihapus');
            document.location.href = 'sparepart.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus sparepart');
            document.location.href = 'sparepart.php';
        </script>";
    echo '<br>';
    echo mysqli_error($koneksi);
}

