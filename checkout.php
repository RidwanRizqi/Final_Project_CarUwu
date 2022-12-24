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


    $iduser = $_SESSION['iduser'];
    $tglbeli = date('Y-m-d');
    $status = "Belum Lunas";
    $payment = null;
    if (isset($_GET['MBLID'])) {
        $idmobil = $_GET['MBLID'];
        $query = "INSERT INTO pembelian (id_mobil, id_sparepart, id_user, tgl_pembelian, status, payment) VALUES ('$idmobil', '-', '$iduser', '$tglbeli', '$status', '$payment')";
        $querystok = "UPDATE mobil SET stok = stok - 1 WHERE id_mobil = '$idmobil'";
        $resultstok = mysqli_query($koneksi, $querystok);
        $result = mysqli_query($koneksi, $query);
    } elseif (isset($_GET['SPID'])) {
        $idpart = $_GET['SPID'];
        $query = "INSERT INTO pembelian (id_mobil, id_sparepart, id_user, tgl_pembelian, status, payment) VALUES ('-', '$idpart', '$iduser', '$tglbeli', '$status', '$payment')";
        //    stok - 1 from table sparepart
        $querystok = "UPDATE sparepart SET stok_sparepart = sparepart.stok_sparepart - 1 WHERE id_sparepart = '$idpart'";
        $resultstok = mysqli_query($koneksi, $querystok);
        $result = mysqli_query($koneksi, $query);
    }
    if ($result) {
        echo "
            <script>
                alert('Data berhasil ditambahkan silahkan melakukan pembayaran');
                document.location.href = 'order.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
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
    <!--    link bootstrap cdn-->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
        $getUserData = mysqli_query($koneksi, "SELECT id_user, nama_user, email, telp, alamat
                                                        FROM user
                                                        WHERE id_user = $id");
        foreach ($getUserData as $data) {
            ?>
        <h2 class="mt-5">Checkout</h2>
        <form method="post" enctype="multipart/form-data" class="checkout">
            <div class="mb-3">
                <label for="InputName" class="form-label">Nama User</label>
                <input required type="text" class="form-control" id="InputName" value="<?php echo $data['nama_user']?>" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                <input required type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $data['email']?>" disabled>
            </div>
            <div class="mb-3">
                <label for="inputTelp" class="form-label">Nomor Telepon</label>
                <input required type="number" class="form-control" id="inputTelp" value="<?php echo $data['telp']?>" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $data['alamat']?></textarea>
            </div>
            <?php } ?>
            <?php
            if (isset($_GET['MBLID'])) {
                $idcar = $_GET['MBLID'];
                $getItemData = mysqli_query($koneksi, "SELECT id_mobil, nama_mobil, harga_mobil, gambar_mobil
                                                        FROM mobil
                                                        WHERE id_mobil = '$idcar'");
            foreach ($getItemData as $dataItem) {
                ?>
                <div class="mb-3">
                    <label for="InputNameCar" class="form-label">Nama Mobil</label>
                    <input required type="text" class="form-control" id="InputNameCar" value="<?php echo $dataItem['nama_mobil']?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="InputPriceCar" class="form-label">Harga Mobil</label>
                    <input required type="text" class="form-control" id="InputPriceCar" value="<?php echo format_rupiah($dataItem['harga_mobil'])?>" disabled>
                </div>
                <label for="">Foto Mobil</label> <br>
            <img src="/img/cars/<?php echo $dataItem['gambar_mobil']?>" class="rounded float-start" alt="..." style="width: 20%"><br>

            <?php }
            } elseif (isset($_GET['SPID'])) {
                $idcar = $_GET['SPID'];
                $getItemData = mysqli_query($koneksi, "SELECT id_sparepart, nama_sparepart, harga_sparepart, gambar_sparepart
                                                        FROM sparepart
                                                        WHERE id_sparepart = '$idcar'");
            foreach ($getItemData as $dataItem) {
                ?>
                <div class="mb-3">
                    <label for="InputNameCar" class="form-label">Nama Sparepart</label>
                    <input required type="text" class="form-control" id="InputNameCar" value="<?php echo $dataItem['nama_sparepart']?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="InputPriceCar" class="form-label">Harga Sparepart</label>
                    <input required type="text" class="form-control" id="InputPriceCar" value="<?php echo format_rupiah($dataItem['harga_sparepart'])?>" disabled>
                </div>
                <label for="">Foto Sparepart</label> <br>
                <img src="/img/parts/<?php echo $dataItem['gambar_sparepart']?>" class="rounded float-start" alt="..." style="width: 20%"><br>

            <?php } }?>

            <h3 class="mt-3">Pembayaran</h3>
            <p>Lakukan Pembayaran pada rekening berikut: <?php echo rand()?></p>
            <button type="button" class="mt-3 btn btn-danger" onclick="location.href='index.php'">Back</button>
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

