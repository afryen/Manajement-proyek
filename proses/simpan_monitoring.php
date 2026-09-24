<?php


require_once __DIR__ . "/../config/database.php";



// cek koneksi database

if(!$koneksi){

    die("Database tidak terhubung : " . mysqli_connect_error());

}




if($_SERVER['REQUEST_METHOD']=="POST"){



// ambil data form


$jenis_proyek = mysqli_real_escape_string(
    $koneksi,
    $_POST['jenis_proyek']
);



$tanggal_monitoring = mysqli_real_escape_string(
    $koneksi,
    $_POST['tanggal_monitoring']
);



$progress = mysqli_real_escape_string(
    $koneksi,
    $_POST['progress']
);



$kendala = mysqli_real_escape_string(
    $koneksi,
    $_POST['kendala']
);



$solusi = mysqli_real_escape_string(
    $koneksi,
    $_POST['solusi']
);



$catatan = mysqli_real_escape_string(
    $koneksi,
    $_POST['catatan']
);






// query simpan data


$sql = "

INSERT INTO monitoring

(

jenis_proyek,

tanggal_monitoring,

progress,

kendala,

solusi,

catatan

)


VALUES

(

'$jenis_proyek',

'$tanggal_monitoring',

'$progress',

'$kendala',

'$solusi',

'$catatan'

)

";







$query = mysqli_query(

    $koneksi,

    $sql

);








if($query){



    header("location:../monitoring.php");


    exit;



}else{



    echo "Gagal menyimpan monitoring";

    echo "<br>";

    echo mysqli_error($koneksi);



}






}else{



echo "Form tidak dikirim";



}



?>