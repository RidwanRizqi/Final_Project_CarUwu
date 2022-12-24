<?php
session_start();
include_once "config.php";
if(!isset($_GET['BRDID'])){
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Uwu</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/e213a3e1e1.js" crossorigin="anonymous"></script>
    <!--    modal-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="list-car-body">
<header>
    <div class="nav container">
        <i class="fa-solid fa-bars" id="menu-icon"></i>
        <a href="index.php" class="logo">Car <span>Uwu</span></a>
        <ul class="navbar">
            <li><a href="index.php" class="navbar-item">Home</a></li>
            <li><a href="#cars" class="navbar-item active">Cars</a></li>
            <li><a href="index.php" class="navbar-item">About</a></li>
            <li><a href="index.php" class="navbar-item">Parts</a></li>
            <li><a href="index.php" class="navbar-item">News</a></li>
        </ul>
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
    </div>
</header>
<section class="cars" id="cars">
    <?php
    $BRDID = $_GET['BRDID'];
    $sql = mysqli_query($koneksi, "SELECT DISTINCT nama_brand from mobil
                            INNER JOIN brand ON mobil.id_brand = brand.id_brand
                            WHERE mobil.id_brand = '$BRDID';
");
    ?>
    <div class="heading">
        <h2 class="listcar-heading-h2"><?php foreach ($sql as $row) {
                echo $row['nama_brand'];
            } ?></h2>
        <p>We have all types cars</p>
    </div>
    <div class="slideshow container">
        <?php

        $sql = mysqli_query($koneksi, "SELECT * FROM mobil WHERE id_brand = '$BRDID' AND id_mobil != '-'");
        foreach ($sql as $row) {
            echo "<div class='mySlides fadee'>";
            echo "<img src='img/slideshow/{$row['gambarSlide_mobil']}' style='width:100%' class='slideshow-img' alt='car-image'>";
            echo "<div class='text'>{$row['nama_mobil']}</div>";
            echo "</div>";
        }
        ?>
    </div>
    <div class="cars-container container">
        <?php
        foreach ($sql as $row) {
            echo "<div class=\"box\" onclick=\"location.href='detailCar.php?MBLID={$row["id_mobil"]}'\">";
            echo "<img src='img/cars/{$row['gambar_mobil']}' alt='car-image'>";
            echo "<h2 class='listcar-title'>{$row['nama_mobil']}</h2>";
            echo "</div>";
        }
        ?>

    </div>
</section>
<section class="footer">
    <div class="footer-container container">
        <div class="footer-box">
            <a href="index.php" class="logo">Car <span>Uwu</span></a>
            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-box">
            <h3>Page</h3>
            <a href="index.php">Home</a>
            <a href="index.php">Cars</a>
            <a href="index.php">Parts</a>
            <a href="index.php">News</a>
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
<?php
?>
<!--<script type="text/javascript" src="script/data.js"></script>-->
<!--<script type="text/javascript" src="script/listCar.js"></script>-->
<script type="text/javascript" src="script/main.js"></script>
</body>
</html>