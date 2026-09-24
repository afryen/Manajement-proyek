<?php

require_once __DIR__ . "/../config/database.php";



if($_SERVER['REQUEST_METHOD']=="POST"){



$id_proyek = mysqli_real_escape_string(
    $koneksi,
    $_POST['id_proyek']
);



$nilai = mysqli_real_escape_string(
    $koneksi,
    $_POST['nilai']
);



$catatan = mysqli_real_escape_string(
    $koneksi,
    $_POST['catatan']
);



$tanggal = date("Y-m-d");





$query = mysqli_query(

    $koneksi,

    "

    INSERT INTO evaluasi

    (

    id_proyek,

    nilai,

    catatan,

    tanggal

    )


    VALUES

    (

    '$id_proyek',

    '$nilai',

    '$catatan',

    '$tanggal'

    )


    "

);







if($query){


    header("location:../evaluasi.php");

    exit;


}else{


    echo "Gagal menyimpan evaluasi";

    echo "<br>";

    echo mysqli_error($koneksi);


}



}else{


echo "Form tidak dikirim";


}


?>