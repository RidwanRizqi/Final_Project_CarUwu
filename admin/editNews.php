<?php
session_start();
include('../config.php');
$NWSID = $_GET['NWSID'];

if (isset($_POST['edit'])) {
    $judulBerita = $_POST['judulBerita'];
    $subjudulBerita = $_POST['subjudulBerita'];
    $tanggalBerita = $_POST['tanggalBerita'];
    $gambarBerita = uploadBerita();
    if (!$gambarBerita) {
        return false;
    }

    $query = "UPDATE berita SET judul_berita='$judulBerita', subjudul_berita='$subjudulBerita', tanggal_berita='$tanggalBerita', gambar_berita='$gambarBerita' WHERE id_berita='$NWSID'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "
            <script>
                alert('Data berhasil diupdate');
                document.location.href = 'berita.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diupdate');
                document.location.href = 'berita.php';
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

    <!--    Date picker-->
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css"/>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
            <h2 class="page-title">Edit Data Berita</h2>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita = '$NWSID'");
            $data = mysqli_fetch_array($query);
            ?>
            <form method="post" action="" enctype="multipart/form-data" class="row g-3">
                <div class="mb-3 col-md-2">
                    <label for="idBerita" class="form-label">ID Berita</label>
                    <input required type="text" name="idBerita" class="form-control" id="idBerita"
                           placeholder="MBLxxx" value="<?php echo $NWSID ?>" disabled>
                </div>
                <div class="mb-3 col-md-10">
                    <label for="judulBerita" class="form-label">Judul Berita</label>
                    <input required type="text" name="judulBerita" class="form-control" id="judulBerita"
                           placeholder="Judul Berita" value="<?php echo $data['judul_berita'] ?>">
                </div>
                <div class="mb-3 col-md-12">
                    <label for="subjudulBerita" class="form-label">Subjudul Berita</label>
                    <textarea required class="form-control" name="subjudulBerita" id="subjudulBerita"
                              rows="2"><?php echo $data['subjudul_berita'] ?></textarea>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="isiBerita" class="form-label">Isi Berita</label>
                    <textarea required class="form-control" name="isiBerita" id="isiBerita"
                              rows="2"><?php echo $data['isi_berita'] ?></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="gambarBerita" class="form-label">Gambar Berita</label>
                    <input required type="file" name="GambarBerita" class="form-control" id="gambarBerita">
                </div>
                <div class="form-group col-md-6">
                    <label for="tanggalBerita">Tanggal Berita :</label>
                    <input required class="date form-control" type="text" data-name="tanggalBerita"
                           name="tanggalBerita" value="<?php echo $data['tanggal_berita'] ?>">
                </div>
                <button type="submit" name="edit" class="mb-5 ml-2 btn btn-primary col-md-2">Edit</button>
            </form>
        </div>
    </div>
    <?php include('modal.php')?>
        <script>
            $(document).ready(function () {
                // Initialize the datepicker
                $('.date').datepicker({
                    todayHighlight: true, // to highlight the today's date
                    orientation: "top right",
                    format: 'yyyy-mm-dd', // we format the date before we will submit it to the server side
                    autoclose: true //we enable autoclose so that once we click the date it will automatically close the datepicker
                });
            })
        </script>
</body>
</html>
