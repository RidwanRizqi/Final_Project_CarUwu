<?php
session_start();
include('config.php');
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $result=mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");

    //cek username
    //mysqli_num_rows=untuk menghitung ada berapa baris yang akan dikembalikan oleh parameter
    //kalau ada yg dikembalikan nilainya adalah 1 kalau enggak ada nilainya 0

    if(mysqli_num_rows($result)===1)
    {
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"]))
        {

            $_SESSION['ulogin']=$_POST['email'];
            $_SESSION['fname']=$row['nama_user'];
            $_SESSION['iduser']=$row['id_user'];
            echo "<script>alert('Selamat Datang ".$_SESSION['fname']."');</script>";
            header("Location:index.php");
            exit;
        } else {
            echo "<script>alert('Password Salah');</script>";
        }
    } else{
        echo "<script>alert('Email atau Password Salah!');</script>";
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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="admin/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login User</title>
</head>
<body>
<header>
    <div class="nav container">
        <i class="fa-solid fa-bars" id="menu-icon"></i>
        <a href="#" class="logo">Car <span>Uwu</span></a
    </div>
    </div>
</header>
<section class="home" id="home">
    <div class="home-text login-form">
        <h1 class="home-title mb-3">Login User</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" placeholder="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input required type="password" name="password" class="form-control" id="exampleInputPassword1"
                       placeholder="password">
            </div>
            <label for="register">Don't have an account yet? </label>
            <a href="register.php" id="register">Register</a> <br>
            <!--            <div class="mb-3 form-check">-->
            <!--                <input required type="checkbox" class="form-check-input" id="exampleCheck1">-->
            <!--                <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
            <!--            </div>-->
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
