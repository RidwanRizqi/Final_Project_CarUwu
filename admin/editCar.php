<?php
session_start();
include('../config.php');
$MBLID = $_GET['MBLID'];

if (isset($_POST['edit'])) {
//    $idMobil = $_POST['idMobil'];
    $namaMobil = $_POST['namaMobil'];
    $tipeMobil = $_POST['tipeMobil'];
    $mesinMobil = $_POST['mesinMobil'];
    $ccMobil = $_POST['ccMobil'];
    $deskripsiMobil = $_POST['deskripsiMobil'];
    $exteriorMobil = $_POST['exteriorMobil'];
    $interiorMobil = $_POST['interiorMobil'];
    $hargaMobil = $_POST['hargaMobil'];
    $stokMobil = $_POST['stokMobil'];
    $idBrand = $_POST['idBrand'];
    echo "<script>alert('$idBrand');</script>";

    $gambarMobil = uploadMobil();
    if (!$gambarMobil) {
        return false;
    }
    $gambarSlideMobil = uploadSlideMobil();
    if (!$gambarSlideMobil) {
        return false;
    }
    echo "<script>alert('$gambarMobil');</script>";
    $query = "UPDATE mobil SET nama_mobil = '$namaMobil', tipe_mobil = '$tipeMobil', mesin_mobil = '$mesinMobil', cc_mobil = '$ccMobil', deskripsi_mobil = '$deskripsiMobil', exterior_mobil = '$exteriorMobil', interior_mobil = '$interiorMobil', harga_mobil = '$hargaMobil', stok = '$stokMobil', id_brand = '$idBrand', gambar_mobil = '$gambarMobil', gambarSlide_mobil = '$gambarSlideMobil' WHERE id_mobil = '$MBLID'";

    $result = mysqli_query($koneksi, $query);
    echo "<script>alert('$gambarMobil');</script>";

    if ($result) {
        echo "
            <script>
                alert('Data berhasil diupdate');
                document.location.href = 'mobil.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diupdate');
                document.location.href = 'mobil.php';
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
            <h2 class="page-title">Edit Data Mobil</h2>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM mobil WHERE id_mobil = '$MBLID'");
            $data = mysqli_fetch_array($query);
            ?>
            <form method="post" action="" enctype="multipart/form-data" class="row g-3">
                <div class="mb-3 col-md-4">
                    <label for="idMobil" class="form-label">ID Mobil</label>
                    <input required type="text" name="idMobil" class="form-control" id="idMobil" placeholder="MBLxxx"
                           value="<?php echo $MBLID ?>" disabled>
                </div>
                <div class="mb-3 col-md-8">
                    <label for="namaMobil col-md-8" class="form-label">Nama Mobil</label>
                    <input required type="text" name="namaMobil" class="form-control" id="namaMobil" placeholder="Nama mobil"
                           value="<?php echo $data['nama_mobil'] ?>">
                </div>
                <div class="mb-3 col-md-4" >
                    <label for="tipeMobil" class="form-label">Tipe Mobil</label>
                    <input required type="text" name="tipeMobil" class="form-control" id="tipeMobil" placeholder="Tipe mobil"
                           value="<?php echo $data['tipe_mobil'] ?>">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="mesinMobil" class="form-label">Mesin Mobil</label>
                    <select required class="form-select" aria-label="Default select example" name="mesinMobil">
                        <?php
                        if ($data['mesin_mobil'] == "Naturally Aspirated") {
                            echo "<option value='Naturally Aspirated' selected>Naturally Aspirated</option>";
                            echo "<option value='Turbocharged'>Turbocharged</option>";
                            echo "<option value='Supercharged'>Electric</option>";
                        } else if ($data['mesin_mobil'] == "Turbocharged") {
                            echo "<option value='Naturally Aspirated'>Naturally Aspirated</option>";
                            echo "<option value='Turbocharged' selected>Turbocharged</option>";
                            echo "<option value='Supercharged'>Electric</option>";
                        } else if ($data['mesin_mobil'] == "Electric") {
                            echo "<option value='Naturally Aspirated'>Naturally Aspirated</option>";
                            echo "<option value='Turbocharged'>Turbocharged</option>";
                            echo "<option value='Supercharged' selected>Electric</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="ccMobil" class="form-label">CC Mobil</label>
                    <input required type="text" name="ccMobil" class="form-control" id="ccMobil" placeholder="2000CC"
                           value="<?php echo $data['cc_mobil'] ?>">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="hargaMobil" class="form-label">Harga Mobil</label>
                    <input required type="number" name="hargaMobil" class="form-control" id="hargaMobil" placeholder="1000000"
                           value="<?php echo $data['harga_mobil'] ?>">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="stokMobil" class="form-label">Stok Mobil</label>
                    <input required type="number" name="stokMobil" class="form-control" id="stokMobil" placeholder="10"
                           value="<?php echo $data['stok'] ?>">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="idBrand" class="form-label">Brand Mobil</label>
                    <select required class="form-select" aria-label="Default select example" name="idBrand">
                        <?php
                        if ($data['id_brand'] == "BRD001") {
                            echo "<option value='BRD001' selected>Porsche</option>";
                            echo "<option value='BRD002'>Lamborghini</option>";
                            echo "<option value='BRD003'>Ferrari</option>";
                            echo "<option value='BRD004'>Bentley</option>";
                            echo "<option value='BRD005'>Mercedes</option>";
                            echo "<option value='BRD006'>Mclaren</option>";
                        } elseif ($data['id_brand'] == "BRD002") {
                            echo "<option value='BRD001'>Porsche</option>";
                            echo "<option value='BRD002' selected>Lamborghini</option>";
                            echo "<option value='BRD003'>Ferrari</option>";
                            echo "<option value='BRD004'>Bentley</option>";
                            echo "<option value='BRD005'>Mercedes</option>";
                            echo "<option value='BRD006'>Mclaren</option>";
                        } elseif ($data['id_brand'] == "BRD003") {
                            echo "<option value='BRD001'>Porsche</option>";
                            echo "<option value='BRD002'>Lamborghini</option>";
                            echo "<option value='BRD003' selected>Ferrari</option>";
                            echo "<option value='BRD004'>Bentley</option>";
                            echo "<option value='BRD005'>Mercedes</option>";
                            echo "<option value='BRD006'>Mclaren</option>";
                        } elseif ($data['id_brand'] == "BRD004") {
                            echo "<option value='BRD001'>Porsche</option>";
                            echo "<option value='BRD002'>Lamborghini</option>";
                            echo "<option value='BRD003'>Ferrari</option>";
                            echo "<option value='BRD004' selected>Bentley</option>";
                            echo "<option value='BRD005'>Mercedes</option>";
                            echo "<option value='BRD006'>Mclaren</option>";
                        } elseif ($data['id_brand'] == "BRD005") {
                            echo "<option value='BRD001'>Porsche</option>";
                            echo "<option value='BRD002'>Lamborghini</option>";
                            echo "<option value='BRD003'>Ferrari</option>";
                            echo "<option value='BRD004'>Bentley</option>";
                            echo "<option value='BRD005' selected>Mercedes</option>";
                            echo "<option value='BRD006'>Mclaren</option>";
                        } elseif ($data['id_brand'] == "BRD006") {
                            echo "<option value='BRD001'>Porsche</option>";
                            echo "<option value='BRD002'>Lamborghini</option>";
                            echo "<option value='BRD003'>Ferrari</option>";
                            echo "<option value='BRD004'>Bentley</option>";
                            echo "<option value='BRD005'>Mercedes</option>";
                            echo "<option value='BRD006' selected>Mclaren</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="deskripsiMobil" class="form-label">Deskripsi Mobil</label>
                    <textarea required class="form-control" name="deskripsiMobil" id="deskripsiMobil"
                              rows="3"><?php echo $data['deskripsi_mobil'] ?></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exteriorMobil" class="form-label">Exterior Mobil</label>
                    <textarea required class="form-control" name="exteriorMobil" id="exteriorMobil"
                              rows="3"><?php echo $data['exterior_mobil'] ?></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="interiorMobil" class="form-label">Interior Mobil</label>
                    <textarea required class="form-control" name="interiorMobil" id="interiorMobil"
                              rows="3"><?php echo $data['interior_mobil'] ?></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="gambarMobil" class="form-label">Gambar Mobil</label>
                    <input required type="file" name="GambarMobil" class="form-control" id="gambarMobil">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="gambarSlide" class="form-label">Gambar Slide Mobil</label>
                    <input required type="file" name="GambarSlide" class="form-control" id="gambarSlide">
                </div>
                <button type="submit" name="edit" class="mb-5 ml-3 btn btn-primary col-md-2">Edit</button>
            </form>
        </div>
    </div>
    <?php include('modal.php')?>
</body>
</html>
