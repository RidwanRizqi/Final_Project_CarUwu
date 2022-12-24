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
            <h2 class="page-title">Berita</h2>
            <button type="button" class="btn btn-success mb-3 mt-3" onclick="location.href='addNews.php'">Tambahkan
                Berita Baru
            </button>
            <table id="tabel-data" class="table table-striped table-bordered border-dark">
                <thead>
                <tr align="center">
                    <th>No</th>
                    <th>ID Berita</th>
                    <th>Judul Berita</th>
                    <th>Tanggal Berita</th>
                    <th>Gambar Berita</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $sqlberita = "SELECT * FROM berita";
                $queryberita = mysqli_query($koneksi, $sqlberita);
                while ($result = mysqli_fetch_array($queryberita)) {
                    $idberita = $result['id_berita'];
                    $i++;
                    ?>
                    <tr align="center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['id_berita']; ?></td>
                        <td><?php echo $result['judul_berita']; ?></td>
                        <td><?php echo $result['tanggal_berita']; ?></td>
                        <td><?php
                            echo "<img src='../img/news/" . $result['gambar_berita'] . "' height='100'>";
                            ?></td>
                        <td>
                            <button type='button' class='btn btn-warning mb-2 edt-dlt'
                                    onclick="location.href='editNews.php?NWSID=<?php echo $idberita ?>'"> Edit
                            </button>
                            <button type='button' class='btn btn-danger mb-2 edt-dlt'
                                    onclick="location.href='deleteNews.php?NWSID=<?php echo $idberita ?>'">Hapus
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('modal.php')?>
<script>
    $(document).ready(function () {
        $('#tabel-data').DataTable();
    });
</script>

</body>
</html>
