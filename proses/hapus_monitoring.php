<?php


require_once __DIR__ . "/../config/database.php";



// cek id

if(!isset($_GET['id'])){


    header("location:../monitoring.php");

    exit;


}



$id = $_GET['id'];




// hapus data monitoring


$query = mysqli_query(

    $koneksi,

    "

    DELETE FROM monitoring

    WHERE id_monitoring='$id'

    "

);





if($query){


    header("location:../monitoring.php");

    exit;


}

else{


    echo "Data gagal dihapus";

    echo "<br>";

    echo mysqli_error($koneksi);


}



?>