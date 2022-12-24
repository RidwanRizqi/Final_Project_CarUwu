<?php
session_start();
include('config.php');
//check session if user is logged in

if (!isset($_SESSION['ulogin'])) {
    $_SESSION['ulogin'] = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Uwu</title>
    <!--    modal-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/e213a3e1e1.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="nav container">
        <i class="fa-solid fa-bars" id="menu-icon"></i>
        <a href="#" class="logo">Car <span>Uwu</span></a>
        <ul class="navbar">
            <li><a href="#home" class="navbar-item">Home</a></li>
            <li><a href="#cars" class="navbar-item">Cars</a></li>
            <li><a href="#about" class="navbar-item">About</a></li>
            <li><a href="#parts" class="navbar-item">Parts</a></li>
            <li><a href="#news" class="navbar-item">News</a></li>
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
<!--        <i class="fa-solid fa-magnifying-glass" id="search-icon"></i>-->
<!--        <div class="search-box container">-->
<!--            <label for=""></label><input required type="search" name="" id="" placeholder="Search here...">-->
<!--        </div>-->

    </div>
</header>
<section class="home" id="home">
    <div class="home-text">
        <h1>The Free, Easy Way To <br>Change Your <span>Car</span> Online</h1>
        <p>It only takes a few minutes to get started. Whether you are buying <br>
            car or spare part, we send your information out to local and national <br>
            partners and they come back to you with great offers.</p>
        <a href="#cars" class="btn">Discover Now</a>
    </div>
</section>
<section class="cars" id="cars">
    <div class="heading">
        <h2>Our Car Collection</h2>
        <p>No haggling, no fees, just great prices</p>
    </div>
    <div class="slideshow container">
        <div class="mySlides fadee">
            <div class="text">Porsche 911 GT2 RS</div>
            <img src="img/slideshow/slideshow3.jpg" style="width:100%" alt="">
        </div>

        <div class="mySlides fadee">
            <div class="text">Ferrari SF90 Stradale</div>
            <img src="img/slideshow/slideshow1.jpg" style="width:100%" alt="">
        </div>

        <div class="mySlides fadee">
            <div class="text">Lamborghini Gallardo</div>
            <img src="img/slideshow/slideshow2.jpg" style="width:100%" alt="">
        </div>

        <div class="mySlides fadee">
            <div class="text">McLaren 720s</div>
            <img src="img/slideshow/slideshow5.jpg" style="width:100%" alt="">
        </div>

        <div class="mySlides fadee">
            <div class="text">Mercedes Benz AMG GT</div>
            <img src="img/slideshow/slideshow6.jpg" style="width:100%" alt="">
        </div>
    </div>
    <div class="cars-container container">
        <div class="box" id="porsche" onclick="location.href='listCar.php?BRDID=BRD001'">
            <img src="img/logo/porschelogo.jpg" alt="">
            <h2>Porsche</h2>
        </div>
        <div class="box" id="lamborghini" onclick="location.href='listCar.php?BRDID=BRD002'">
            <img src="img/logo/lamborghinilogo.jpg" alt="">
            <h2>Lamborghini</h2>
        </div>
        <div class="box" id="ferrari" onclick="location.href='listCar.php?BRDID=BRD003'">
            <img src="img/logo/ferrarilogo.jpg" alt="" >
            <h2>Ferrari</h2>
        </div>
        <div class="box" id="bentley" onclick="location.href='listCar.php?BRDID=BRD004'">
            <img src="img/logo/bentleylogo.jpg" alt="">
            <h2>Bentley</h2>
        </div>
        <div class="box" id="mercedes" onclick="location.href='listCar.php?BRDID=BRD005'">
            <img src="img/logo/merclogo.jpg" alt="">
            <h2>Mercedes Benz</h2>
        </div>
        <div class="box" id="mclaren" onclick="location.href='listCar.php?BRDID=BRD006'">
            <img src="img/logo/mclarenlogo.jpg" alt="">
            <h2>Mclaren</h2>
        </div>
    </div>
</section>
<section class="about container" id="about">
    <div class="about-img">
        <img src="img/about.png" alt="">
    </div>
    <div class="about-text">
        <span>About Us</span>
        <h2>Cheap Prices With <br>Quality Cars</h2>
        <p>Car uwu is Southeast Asia’s largest integrated car e-commerce platform. <br>
            With presence across Malaysia, Indonesia, Thailand and Singapore, we aim to digitalize
            the region’s used car industry by reshaping and elevating the car buying and selling experience.</p>
        <a href="#" class="btn">Learn More</a>
    </div>
</section>
<section class="parts" id="parts">
    <div class="heading">
        <h2>Auto Spare Part</h2>
        <p>Car Uwu provides end-to-end solutions to consumers and used car dealers, <br>
            from car inspection to ownership transfer to financing, promising a service that is trusted, convenient and efficient.</p>
    </div>
    <div class="parts-container container">
        <?php
        $sql = "SELECT * FROM sparepart WHERE stok_sparepart > 0";
        $result = mysqli_query($koneksi, $sql);
        foreach ($result as $row) {
            ?>
            <div class="box">
                <img src="img/parts/<?php echo $row['gambar_sparepart'] ?>" alt="">
                <h3 class="mb-2"><?php echo $row['nama_sparepart'] ?></h3>
                <span class="mb-2"><?php echo format_rupiah($row['harga_sparepart'])?></span>
<!--                <a href="" class="btn">Buy Now</a>-->
                <a href="detailPart.php?SPID=<?php echo $row['id_sparepart'] ?>" class="details">View Details</a>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<section class="news" id="news">
    <div class="heading">
        <span>News</span>
        <h2>News Content</h2>
        <p>With over 70+ million views a month, there’s a review for everyone</p>
    </div>
    <div class="news-container container">
        <?php
        $sql = "SELECT * FROM berita";
        $result = mysqli_query($koneksi, $sql);
        foreach ($result as $row) {
            ?>
            <div class="box">
                <img src="img/news/<?php echo $row['gambar_berita'] ?>" alt="">
                <span><?php echo $row['tanggal_berita']?></span>
                <h3><?php echo $row['judul_berita'] ?></h3>
                <p><?php echo $row['subjudul_berita']?></p>
                <a href="news.php?NWSID=<?php echo $row['id_berita'] ?>" class="news-btn" id="news1">Read More<i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <?php
        }
        ?>
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

<!--<script src="script/data.js"></script>-->
<script src="script/main.js"></script>
</body>
</html>