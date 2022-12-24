<?php
session_start();
include "config.php";
if(!isset($_GET['SPID'])){
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
      <li><a href="#parts" class="navbar-item active">Parts</a></li>
      <li><a href="index.php#news" class="navbar-item">News</a></li>
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
<section class="parts" id="parts">
    <?php
    $SPID = $_GET['SPID'];
    $sql = mysqli_query($koneksi, "SELECT * FROM sparepart WHERE id_sparepart = '$SPID'");
    function add_new_line($string)
    {
        $string = str_replace("..", ".<br>", $string);
        return $string;
    }
    foreach ($sql as $row) {?>
        <div class="slideshow container">
            <div class="mySlides fadee">
                <img src="img/parts/<?php echo $row['gambar_sparepart']?>" style="width:100%" alt="parts-image" class="parts-img">
                <div class="details-text">
                    <h2 class="parts-title"><?php echo $row['nama_sparepart']?></h2>
                    <div class="tags">
                        <span class="parts-price"><?php echo format_rupiah($row['harga_sparepart'])?></span>
                        <span class="parts-type"><i class="fa-solid fa-receipt"> </i><?php echo $row['tipe_sparepart']?></span>
                    </div>
                    <a href="checkout.php?SPID=<?php echo $row['id_sparepart'] ?>" class="btn">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="about-car container">
            <h2 class="parts-title"><?php echo $row['nama_sparepart'] ?></h2>
            <p class="parts-description"><?php echo add_new_line($row['deskripsi_sparepart']) ?></p>
        </div>
    <?php }
    ?>

  <div class="parts-container container">
      <?php
      $sql = "SELECT * FROM sparepart WHERE stok_sparepart > 0";
      $result = mysqli_query($koneksi, $sql);
      foreach ($result as $row) {
          ?>
          <div class="box">
              <img src="img/parts/<?php echo $row['gambar_sparepart'] ?>" alt="">
              <h3 class="mb-3"><?php echo $row['nama_sparepart'] ?></h3>
              <span class="mb-3"><?php echo format_rupiah($row['harga_sparepart'])?></span>
<!--              <a href="" class="btn">Buy Now</a>-->
              <a href="detailPart.php?SPID=<?php echo $row['id_sparepart'] ?>" class="details">View Details</a>
          </div>
          <?php
      }
      ?>
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
      <a href="#parts">Parts</a>
      <a href="index.php#news">News</a>
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
<!--<script src="script/detailPart.js"></script>-->
</body>
</html>