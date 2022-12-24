<?php
session_start();
include('../config.php');
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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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

            <h2 class="page-title">Dashboard</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3" align="center">
                                <h5 class="card-header">Total Penjualan Lunas</h5>
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <?php
                                        $sqllunas = "SELECT id_pembelian FROM pembelian WHERE status='Lunas'";
                                        $querylunas = mysqli_query($koneksi, $sqllunas);
                                        $lunas = mysqli_num_rows($querylunas);
                                        echo $lunas;
                                        ?>
                                    </h1>
                                    <a href="pembelian.php" class="btn btn-light">Rincian</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3" align="center">
                                <h5 class="card-header">Menunggu Pembayaran</h5>
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <?php
                                        $sqlbelumlunas = "SELECT id_pembelian FROM pembelian WHERE status='Belum Lunas'";
                                        $querybelumlunas = mysqli_query($koneksi, $sqlbelumlunas);
                                        $belumlunas = mysqli_num_rows($querybelumlunas);
                                        echo $belumlunas;
                                        ?>
                                    </h1>
                                    <a href="pembelian.php" class="btn btn-light">Rincian</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3" align="center">
                                <h5 class="card-header">Jumlah User</h5>
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <?php
                                        $sqluser = "SELECT id_user FROM user";
                                        $queryuser = mysqli_query($koneksi, $sqluser);
                                        $user = mysqli_num_rows($queryuser);
                                        echo $user;
                                        ?>
                                    </h1>
                                    <a href="user.php" class="btn btn-light">Rincian</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3" align="center">
                                <h5 class="card-header">Jumlah Mobil</h5>
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <?php
                                        $sqlmobil = "SELECT id_mobil FROM mobil WHERE id_mobil != '-'";
                                        $querymobil = mysqli_query($koneksi, $sqlmobil);
                                        $mobil = mysqli_num_rows($querymobil);
                                        echo $mobil;
                                        ?>
                                    </h1>
                                    <a href="mobil.php" class="btn btn-warning">Rincian</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3" align="center">
                                <h5 class="card-header">Jumlah Berita</h5>
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <?php
                                        $sqlberita = "SELECT id_berita FROM berita";
                                        $queryberita = mysqli_query($koneksi, $sqlberita);
                                        $berita = mysqli_num_rows($queryberita);
                                        echo $berita;
                                        ?>
                                    </h1>
                                    <a href="berita.php" class="btn btn-warning">Rincian</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3" align="center">
                                <h5 class="card-header">Jumlah Sparepart</h5>
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <?php
                                        $sqlpart = "SELECT id_sparepart FROM sparepart WHERE id_sparepart != '-'";
                                        $querypart = mysqli_query($koneksi, $sqlpart);
                                        $part = mysqli_num_rows($querypart);
                                        echo $part;
                                        ?>
                                    </h1>
                                    <a href="sparepart.php" class="btn btn-warning">Rincian</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">

                        </div>

                        <div class="col-md-4">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('modal.php')?>
</body>
</html>
