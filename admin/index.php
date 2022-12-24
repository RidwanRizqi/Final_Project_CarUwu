<?php
session_start();
include('../config.php');
if (isset($_POST['login'])) {
$username = $_POST['username'];
$password = ($_POST['password']);
$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneksi, $sql);
$results = mysqli_fetch_array($query);
if (mysqli_num_rows($query) > 0) {
    $_SESSION['alogin'] = $_POST['username'];
    $_SESSION['id_admin'] = $results['id_admin'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else {
    echo "<script>alert('Password salah');</script>";
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
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login Admin</title>
</head>
<header>
    <div class="nav container">
        <i class="fa-solid fa-bars" id="menu-icon"></i>
        <a href="#" class="logo">Car <span>Uwu</span></a
    </div>
    </div>
</header>
<body>
<section class="home" id="home">
    <div class="home-text login-form">
        <h1 class="home-title mb-3">Login Admin</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input required type="email" name="username" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" placeholder="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input required type="password" name="password" class="form-control" id="exampleInputPassword1"
                       placeholder="password">
            </div>
<!--            <label for="register">Don't have an account yet? </label>-->
<!--            <a href="register.php" id="register">Register</a> <br>-->
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
