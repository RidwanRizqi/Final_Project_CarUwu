<?php
session_start();
include('config.php');
//check session if user is logged in

if (!isset($_SESSION['ulogin'])) {
    echo "
        <script>
            alert('Anda harus login terlebih dahulu');
            document.location.href = 'login.php';
        </script>";
}

if (isset($_POST['submit'])) {
    $idpembelian = $_GET['ORDID'];
    $status = "Lunas";
    $payment = uploadPayment();
    if (!$payment) {
        return false;
    }
    $query = "UPDATE pembelian SET status = '$status', payment = '$payment' WHERE id_pembelian = '$idpembelian'";
    $result = mysqli_query($koneksi , $query);
    if ($result) {
        echo "
            <script>
                alert('Pembayaran berhasil');
                document.location.href = 'order.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal upload bukti pembayaran');
                document.location.href = 'index.php';
            </script>";
                echo '<br>';
                echo mysqli_error($koneksi);
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Uwu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin/styles/style.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/e213a3e1e1.js" crossorigin="anonymous"></script>
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
        .dataTables_wrapper {
            margin-left: 30px;
            margin-right: 30px;
        }

        .dataTables_filter {
            align-items: end;
        }
    </style>
</head>
<body>
<header class="show">
    <div class="nav container">
        <i class="fa-solid fa-bars" id="menu-icon"></i>
        <a href="index.php" class="logo">Car <span>Uwu</span></a>
        <div class="loginbtn">
            <?php if ($_SESSION['ulogin'] != null) { ?>
                <!--                hapus tombol login-->
            <?php } else { ?>
                <a href="login.php" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a>
            <?php } ?>
        </div>

        <div class="dropdown">
            <?php if ($_SESSION['ulogin'] != null) { ?>
                <div class="dropbtn" id="dropbtn">
                    <i class="fa-solid fa-user-circle" id="user-icon"></i>
                    <span><?php echo $_SESSION['fname']?></span>
                    <i class="fa-solid fa-chevron-down" id="dropdown-icon"></i>
                </div>
            <?php } else { ?>
                <div class="dropbtn" id="dropbtn">
                    <i class="fa-solid fa-user-circle" id="user-icon"></i>
                    <i class="fa-solid fa-chevron-down" id="dropdown-icon"></i>
                </div>

            <?php } ?>
            <div class="dropdown-content">
                <?php if ($_SESSION['ulogin'] != null) { ?>
                    <!--                hapus tombol login-->
                <?php } else { ?>
                    <a href="login.php" >Login / Register</a>
                <?php } ?>
                <a href="profile.php">Profile</a>
                <a href="order.php">Order</a>
                <?php if ($_SESSION['ulogin'] != null) { ?>
                    <a href="" data-toggle="modal" data-target="#changePasswordModal">Change Password</a>
                    <a href="logout.php">Sign Out</a>

                <?php } else { ?>
                    <!--                hapus tombol sign out-->
                <?php } ?>
            </div>

        </div>
        <!--        <i class="fa-solid fa-magnifying-glass" id="search-icon"></i>-->
        <!--        <div class="search-box container">-->
        <!--            <label for=""></label><input required type="search" name="" id="" placeholder="Search here...">-->
        <!--        </div>-->

    </div>
</header>
<section class="cars" id="cars">
    <div class="heading">
        <?php
        $id = $_SESSION['iduser'];
        $idorder = $_GET['ORDID'];
        $queryGetIDCar = "SELECT id_mobil, id_sparepart
                            FROM pembelian
                            WHERE id_pembelian = $idorder";
        $resultGetIDCar = mysqli_query($koneksi, $queryGetIDCar);
        $rowGetIDCar = mysqli_fetch_assoc($resultGetIDCar);
        $idcar = $rowGetIDCar['id_mobil'];
        $idsparepart = $rowGetIDCar['id_sparepart'];
        if ($idcar === '-') {
            $getData =mysqli_query($koneksi, "SELECT id_sparepart, nama_sparepart, harga_sparepart, gambar_sparepart
                                                        FROM sparepart
                                                        WHERE id_sparepart = '$idsparepart'");
        } else {
            $getData = mysqli_query($koneksi, "SELECT id_mobil, nama_mobil, harga_mobil, gambar_mobil
                                                        FROM mobil
                                                        WHERE id_mobil = '$idcar'");
        }

        foreach ($getData  as $data) {
        ?>
        <h2 class="mt-5">Payment</h2>
        <form method="post" enctype="multipart/form-data" class="checkout">
                <div class="mb-3">
                    <label for="InputNameCar" class="form-label">Nama Barang</label>
                    <input required type="text" class="form-control" id="InputNameCar" value="<?php
                    if ($idcar === '-') {
                        echo $data['nama_sparepart'];
                    } else {
                        echo $data['nama_mobil'];
                    }
                    ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="InputPriceCar" class="form-label">Harga Barang</label>
                    <input required type="text" class="form-control" id="InputPriceCar" value="<?php
                    if ($idcar === '-') {
                        echo format_rupiah($data['harga_sparepart']);
                    } else {
                        echo format_rupiah($data['harga_mobil']);
                    }
                    ?>" disabled>
                </div>
            <div class="mb-3">
                <label for="">Foto Barang</label> <br>
                <img src="<?php
                if ($idcar === '-') {
                    echo "/img/parts/" . $data['gambar_sparepart'];
                } else {
                    echo "/img/cars/" . $data['gambar_mobil'];
                }
                ?>" class="rounded float-start" alt="..." style="height: 150px; width: 150px">
            </div><br><br><br><br><br><br><br>

            <?php } ?>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Bukti Pembayaran</label>
                <input required type="file" name="Gambar" class="form-control" id="gambar">
            </div>
            <button type="button" class="mt-3 btn btn-danger" onclick="location.href='order.php'">Back</button>
            <button type="submit" name="submit" class="mt-3 btn btn-primary">Submit</button>
        </form>

    </div>
</section>

<section class="footer">
    <div class="footer-container container">
        <div class="footer-box">
            <a href="#" class="logo">Car <span>Uwu</span></a>
            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCYROhAMwx0JT5-1MNCjHnjA"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://wa.me/6285600846525"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="footer-box">
            <h3>Page</h3>
            <a href="#home">Home</a>
            <a href="#cars">Cars</a>
            <a href="#parts">Parts</a>
            <a href="#news">News</a>
            <a href="admin/index.php">Login Admin</a>

        </div>
        <div class="footer-box">
            <h3>Legal</h3>
            <a href="#">Privacy</a>
            <a href="#">Refund Policy</a>
            <a href="#">Cookie Policy</a>
        </div>
        <div class="footer-box">
            <h3>Contact</h3>
            <p>Indonesia</p>
            <p>Singapore</p>
            <p>Malaysia</p>
        </div>
    </div>
</section>
<div class="copyright">
    <p>&#169; CarUwu All Right Reserved</p>
</div>
<?php include('modal.php')?>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
<script src="script/data.js"></script>
<script src="script/main.js"></script>
</body>
</html>

