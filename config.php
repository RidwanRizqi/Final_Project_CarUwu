<?php
// Koneksi ke database

$host = "localhost";
$user = "root";
$pass = "1234";
$db = "CarUwu";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function format_rupiah($rp) {
    $jumlah = number_format($rp, 0, ",", ".");
    $rupiah = "Rp. ". $jumlah;

    return $rupiah;
}

function upload()
{
    $nama_file  =$_FILES['Gambar']['name'];
    $ukuran_file=$_FILES['Gambar']['size'];
    $error      =$_FILES['Gambar']['error'];
    $tmpfile    =$_FILES['Gambar']['tmp_name'];

    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg','jpeg','gif'];
    $pecah_gambar=explode('.',$nama_file);
    $pecah_gambar=strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
        return false;
    }


    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 10000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    //generate id untuk penamaan gambar dengan function uniqid()
    $namafilebaru=uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    // var_dump ($namafilebaru);die();

    move_uploaded_file($tmpfile,'img/user/ktp/'.$namafilebaru);

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function uploadPayment()
{
    $nama_file  =$_FILES['Gambar']['name'];
    $ukuran_file=$_FILES['Gambar']['size'];
    $error      =$_FILES['Gambar']['error'];
    $tmpfile    =$_FILES['Gambar']['tmp_name'];

    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg','jpeg','gif'];
    $pecah_gambar=explode('.',$nama_file);
    $pecah_gambar=strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
        return false;
    }


    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 10000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    //generate id untuk penamaan gambar dengan function uniqid()
    $namafilebaru=uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    // var_dump ($namafilebaru);die();

    move_uploaded_file($tmpfile,'img/user/payment/'.$namafilebaru);

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function uploadMobil()
{
    $nama_file  =$_FILES['GambarMobil']['name'];
    $ukuran_file=$_FILES['GambarMobil']['size'];
    $error      =$_FILES['GambarMobil']['error'];
    $tmpfile    =$_FILES['GambarMobil']['tmp_name'];

    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg','jpeg','gif'];
    $pecah_gambar=explode('.',$nama_file);
    $pecah_gambar=strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
        return false;
    }


    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 10000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    //generate id untuk penamaan gambar dengan function uniqid()
    $namafilebaru=uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    // var_dump ($namafilebaru);die();

    move_uploaded_file($tmpfile,'../img/cars/'.$namafilebaru);

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function uploadSlideMobil()
{
    $nama_file  =$_FILES['GambarSlide']['name'];
    $ukuran_file=$_FILES['GambarSlide']['size'];
    $error      =$_FILES['GambarSlide']['error'];
    $tmpfile    =$_FILES['GambarSlide']['tmp_name'];

    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg','jpeg','gif'];
    $pecah_gambar=explode('.',$nama_file);
    $pecah_gambar=strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
        return false;
    }


    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 10000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    //generate id untuk penamaan gambar dengan function uniqid()
    $namafilebaru=uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    // var_dump ($namafilebaru);die();

    move_uploaded_file($tmpfile,'../img/slideshow/'.$namafilebaru);

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function uploadPart()
{
    $nama_file  =$_FILES['GambarPart']['name'];
    $ukuran_file=$_FILES['GambarPart']['size'];
    $error      =$_FILES['GambarPart']['error'];
    $tmpfile    =$_FILES['GambarPart']['tmp_name'];

    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg','jpeg','gif', 'png'];
    $pecah_gambar=explode('.',$nama_file);
    $pecah_gambar=strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
        return false;
    }


    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 10000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    //generate id untuk penamaan gambar dengan function uniqid()
    $namafilebaru=uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    // var_dump ($namafilebaru);die();

    move_uploaded_file($tmpfile,'../img/parts/'.$namafilebaru);

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function uploadBerita()
{
    $nama_file  =$_FILES['GambarBerita']['name'];
    $ukuran_file=$_FILES['GambarBerita']['size'];
    $error      =$_FILES['GambarBerita']['error'];
    $tmpfile    =$_FILES['GambarBerita']['tmp_name'];

    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg','jpeg','gif','png'];
    $pecah_gambar=explode('.',$nama_file);
    $pecah_gambar=strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
        return false;
    }


    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 10000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    //generate id untuk penamaan gambar dengan function uniqid()
    $namafilebaru=uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    // var_dump ($namafilebaru);die();

    move_uploaded_file($tmpfile,'../img/news/'.$namafilebaru);

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}
?>