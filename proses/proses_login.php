<?php

session_start();

include "../config/database.php";


$email = $_POST['email'];

$password = $_POST['password'];



$query = mysqli_query(

    $koneksi,

    "SELECT * FROM users WHERE email='$email'"

);



$data = mysqli_fetch_assoc($query);



if(!$data){

    echo "
    <script>
    alert('Email tidak ditemukan');
    window.location='../login.php';
    </script>
    ";

    exit;

}



if($password != $data['password']){


    echo "
    <script>
    alert('Password salah');
    window.location='../login.php';
    </script>
    ";

    exit;


}



$_SESSION['login'] = true;

$_SESSION['id_user'] = $data['id_user'];

$_SESSION['nama'] = $data['nama'];

$_SESSION['email'] = $data['email'];

$_SESSION['role'] = $data['role'];



header("location:../index.php");

exit;


?>