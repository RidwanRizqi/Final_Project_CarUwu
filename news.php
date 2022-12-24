<?php
session_start();
include "config.php";
if(!isset($_GET['NWSID'])){
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
<body>
<header>
    <div class="nav container">
        <i class="fa-solid fa-bars" id="menu-icon"></i>
        <a href="index.php" class="logo">Car <span>Uwu</span></a>
        <ul class="navbar">
            <li><a href="index.php#home" class="navbar-item">Home</a></li>
            <li><a href="index.php#cars" class="navbar-item">Cars</a></li>
            <li><a href="index.php#about" class="navbar-item">About</a></li>
            <li><a href="index.php#parts" class="navbar-item">Parts</a></li>
            <li><a href="#news" class="navbar-item active">News</a></li>
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
<section class="news" id="news">
    <?php
    $NWSID = $_GET['NWSID'];
    $result = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita = '$NWSID'");

    function add_new_line($string)
    {
        $string = str_replace("..", ".<br>", $string);
        return $string;
    }

    foreach ($result as $row) { ?>
    <div class="headline container">
        <h2 class="news-title"><?php echo $row['judul_berita']?></h2>
        <p class="news-date"><?php echo $row['tanggal_berita'] ?></p>
    </div>
    <div class="slideshow container">
        <div class="share">
            <a href="https://www.facebook.com/share.php?u=ridwanrizqi.github.io/news.html"><i class="fa-brands fa-facebook share-item"><span> SHARE</span></i></a>
            <a href="https://www.twitter.com/share?url=ridwanrizqi.github.io/news.html"><i class="fa-brands fa-twitter share-item"><span> TWEET</span></i></a>
            <a href="#"><i class="fa-brands fa-instagram share-item"><span> SHARE</span></i></a>
        </div>
        <div class="mySlides fadee">
            <img src="img/news/<?php echo $row['gambar_berita'] ?>" style="width:100%" class="news-img" alt="news-image">
        </div>
    </div>
    <div class="about-news container">
        <p class="news-content"> <?php echo add_new_line($row['isi_berita']) ?></p>
    <?php } ?>
        <h2>Related News</h2>
        <div class="news-container container">

        <?php
        $sql2 = "SELECT * FROM berita";
        $result2 = mysqli_query($koneksi, $sql2);
        foreach ($result2 as $row2) {
            ?>
            <div class="box">
                <img src="img/news/<?php echo $row2['gambar_berita'] ?>" alt="">
                <span><?php echo $row2['tanggal_berita']?></span>
                <h3><?php echo $row2['judul_berita'] ?></h3>
                <p><?php echo $row2['subjudul_berita']?></p>
                <a href="news.php?NWSID=<?php echo $row2['id_berita'] ?>" class="news-btn" id="news1">Read More<i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <?php
        }
        ?>
        </div>
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
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-box">
            <h3>Page</h3>
            <a href="index.php#home">Home</a>
            <a href="index.php#cars">Cars</a>
            <a href="index.php#parts">Parts</a>
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
<!--<script src="script/data.js"></script>-->
<script src="script/main.js"></script>
<!--<script src="script/news.js"></script>-->
</body>
</html>