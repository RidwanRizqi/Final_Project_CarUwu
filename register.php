<?php
session_start();
include('config.php');
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $ktp = upload();
    $password = $_POST['password'];
    $konfirmpass = $_POST['konfirmpass'];
    $tanggalDaftar = date('Y-m-d');

    if ($password != $konfirmpass) {
        echo "
            <script>
                alert('Password tidak sama');
                document.location.href = 'register.php';
            </script>
        ";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user VALUES ('', '$nama', '$email', '$telp', '$alamat', '$ktp', '$password', '', $tanggalDaftar)";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'login.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = 'login.php';
                </script>";
                echo '<br>';
                echo mysqli_error($koneksi);
        }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/e213a3e1e1.js" crossorigin="anonymous"></script>

</head>
<body>
<header>
    <div class="nav container">
        <i class="fa-solid fa-bars" id="menu-icon"></i>
        <a href="index.php" class="logo">Car <span>Uwu</span></a
        </div>
    </div>
</header>
<section class="home" id="home">
    <div class="home-text login-form">
        <h2 class="home-title mb-3">Registrasi User</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input required type="text" name="nama" class="form-control" id="nama" placeholder="nama">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" placeholder="example@gmail.com">
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Nomor Telepon</label>
                <input required type="number" name="telp" class="form-control" id="telp" placeholder="Nomor Telepon">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea required class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input required type="file" name="Gambar" class="form-control" id="gambar">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input required type="password" name="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
                <input required type="password" name="konfirmpass" class="form-control" id="exampleInputPassword2"
                       placeholder="Konfirmasi Password">
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    </div>
</section>
<script src="script/data.js"></script>
<script src="script/main.js"></script>
</body>
</html>