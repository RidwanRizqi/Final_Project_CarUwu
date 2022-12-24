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
        <h2 class="mt-5 mb-5">Your Order</h2>
        <table id="tabel-data" class="table table-striped table-bordered border-dark">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Tgl Pembelian</th>
                <th scope="col">Status</th>
                <th scope="col">Payment</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $id = $_SESSION['iduser'];
            $query = mysqli_query($koneksi, "SELECT id_pembelian, pembelian.id_mobil, nama_mobil, nama_sparepart, harga_mobil, harga_sparepart, tgl_pembelian, status, payment
                                                    FROM pembelian
                                                    INNER JOIN mobil ON pembelian.id_mobil = mobil.id_mobil
                                                    INNER JOIN sparepart ON pembelian.id_sparepart = sparepart.id_sparepart
                                                    WHERE pembelian.id_user = $id;");
            while ($data = mysqli_fetch_array($query)) {
                $idpembelian = $data['id_pembelian'] ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php
                                if ($data['id_mobil'] === '-') {
                                    $harga = $data['harga_sparepart'];
                                    echo $data['nama_sparepart'];
                                } else {
                                    $harga = $data['harga_mobil'];
                                    echo $data['nama_mobil'];
                                }
                                ?></td>
                            <td><?php echo format_rupiah($harga); ?></td>
                            <td><?php echo $data['tgl_pembelian']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <?php
                                if ($data['payment'] == null) { ?>
                                    Menunggu Pembayaran
                                <?php } else { ?>
                                    <img src="img/user/payment/<?php echo $data['payment']; ?>" width="100px" height="100px">
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if ($data['payment'] == null) { ?>
                                    <button type='button' class='btn btn-warning mb-2 edt-dlt'
                                            onclick="location.href='payment.php?ORDID=<?php echo $idpembelian?>'"> Bayar
                                    </button>
                                    <button type='button' class='btn btn-danger mb-2 edt-dlt'
                                            onclick="location.href='hapusOrder.php?ORDID=<?php echo $idpembelian; ?>'">Hapus
                                    </button>
                                <?php } else { ?>
                                    <button type='button' class='btn btn-danger mb-2 edt-dlt'
                                            onclick="location.href='hapusOrder.php?ORDID=<?php echo $idpembelian; ?>'">Hapus
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
        <?php } ?>
<!--                <tr>-->
<!--                    <td>--><?php //echo $no++; ?><!--</td>-->
<!--                    <td>--><?php //echo $nama; ?><!--</td>-->
<!--                    <td>--><?php //echo format_rupiah($harga)?><!--</td>-->
<!--                    <td>--><?php //echo $data['tgl_pembelian']; ?><!--</td>-->
<!--                    <td>--><?php //echo $data['status']; ?><!--</td>-->
<!--                    -->
<!--                </tr>-->
            </tbody>
        </table>
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
        </div>
        <div class="footer-box">
            <h3>Legal</h3>
            <a href="#">Privacy</a>
            <a href="#">Refund Policy</a>
            <a href="#">Cookie Policy</a>
            <a href="admin/index.php">Login Admin</a>

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
