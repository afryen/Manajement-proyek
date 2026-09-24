<?php

include "../config/database.php";



if($_SERVER['REQUEST_METHOD']=="POST"){



$id = $_POST['id_monitoring'];

$jenis = $_POST['jenis_proyek'];

$tanggal = $_POST['tanggal_monitoring'];

$progress = $_POST['progress'];

$kendala = $_POST['kendala'];

$solusi = $_POST['solusi'];

$catatan = $_POST['catatan'];





$query = mysqli_query(

$koneksi,

"

UPDATE monitoring SET


jenis_proyek='$jenis',

tanggal_monitoring='$tanggal',

progress='$progress',

kendala='$kendala',

solusi='$solusi',

catatan='$catatan'


WHERE id_monitoring='$id'


"

);





if($query){


header("location:../monitoring.php");

exit;


}else{


echo mysqli_error($koneksi);


}



}

?>