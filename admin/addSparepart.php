<?php
session_start();
include('../config.php');

$query = mysqli_query($koneksi, "SELECT max(id_sparepart) as idSparepartTerbesar FROM sparepart");
$data = mysqli_fetch_array($query);
$idPart = $data['idSparepartTerbesar'];
$urutan = (int)substr($idPart, 3, 3);
$urutan++;
$huruf = "SPR";
$idPart = $huruf . sprintf("%03s", $urutan);

if (isset($_POST['tambah'])) {
//    $idMobil = $_POST['idMobil'];
    $namaPart = $_POST['namaPart'];
    $tipePart = $_POST['tipePart'];
    $deskripsiPart = $_POST['deskripsiPart'];
    $hargaPart = $_POST['hargaPart'];
    $stokPart = $_POST['stokPart'];
    $gambarPart = uploadPart();
    if (!$gambarPart) {
        return false;
    }

    $query = "INSERT INTO sparepart VALUES 
                      ('$idPart', '$namaPart', '$tipePart', '$deskripsiPart', '$hargaPart', '$stokPart', '$gambarPart')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'sparepart.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'sparepart.php';
            </script>";
        echo '<br>';
        echo mysqli_error($koneksi);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/e213a3e1e1.js" crossorigin="anonymous"></script>
    <!--    link bootstrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--    Data Tables-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/e213a3e1e1.js" crossorigin="anonymous"></script>
    <!--    modal-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .modal-header, h4, .close {
            background-color: #0057FF;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
        form {
            width: 100%;
            margin-left: 20px;
        }
    </style>
    <title>Dashboard Admin</title>
</head>
<body>
<div class="navigasi clearfix">
    <a href="dashboard.php" style="font-size: 20px; color: white; padding-left: 20px" ;><span
                style="color: white">Car</span> Uwu | Admin Panel</a>
    <ul class="profile-nav">

        <li class="ts-account">
            <a href="#">Administrator <i class="fa fa-angle-down hidden-side"></i></a>
            <ul>
                <li><a href="" data-toggle="modal" data-target="#changePasswordModal">Ubah Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="konten">
    <nav class="sidebar">
        <ul class="sidebar-menu">
            <li class="label"></li>
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="pembelian.php"><i class="fa-solid fa-cart-shopping"></i> Pembelian</a></li>
            <li><a href="mobil.php"><i class="fa fa-car"></i> Mobil</a></li>
            <li><a href="sparepart.php"><i class="fa-solid fa-gears"></i> Sparepart</a></li>
            <li><a href="berita.php"><i class="fa-solid fa-newspaper"></i> Berita</a></li>
            <li><a href="user.php"><i class="fa-solid fa-users"></i> User</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
    </nav>
    <div class="wrap">
        <div class="container-fluid">
            <h2 class="page-title">Tambah Data Sparepart</h2>
            <form method="post" action="" enctype="multipart/form-data" class="row g-3">
                <div class="mb-3 col-md-4">
                    <label for="idPart" class="form-label">ID Sparepart</label>
                    <input required type="text" name="idPart" class="form-control" id="idPart" placeholder="MBLxxx"
                           value="<?php echo $idPart ?>" disabled>
                </div>
                <div class="mb-3 col-md-8">
                    <label for="namaPart" class="form-label">Nama Sparepart</label>
                    <input required type="text" name="namaPart" class="form-control" id="namaPart" placeholder="Nama Sparepart">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="tipeMobil" class="form-label">Tipe Sparepart</label>
                    <input required type="text" name="tipePart" class="form-control" id="tipeMobil" placeholder="Tipe Sparepart">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="hargaPart" class="form-label">Harga Sparepart</label>
                    <input required type="number" name="hargaPart" class="form-control" id="hargaPart" placeholder="1000000">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="stokPart" class="form-label">Stok Sparepart</label>
                    <input required type="number" name="stokPart" class="form-control" id="stokPart" placeholder="10">
                </div>
                <div class="mb-3 col-md-12">
                    <label for="deskripsiPart" class="form-label">Deskripsi Sparepart</label>
                    <textarea required class="form-control" name="deskripsiPart" id="deskripsiPart" rows="3"></textarea>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="gambarPart" class="form-label">Gambar Sparepart</label>
                    <input required type="file" name="GambarPart" class="form-control" id="gambarPart">
                </div>
                <br>
                <button type="submit" name="tambah" class="mb-5 ml-3 btn btn-primary col-md-2 ">Tambahkan</button>
            </form>
        </div>
    </div>
    <?php include('modal.php')?>
</body>
</html>
