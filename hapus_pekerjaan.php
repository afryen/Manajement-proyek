<?php


include "config/database.php";


$id=$_GET['id'];

$proyek=$_GET['proyek'];



mysqli_query(

$koneksi,

"

DELETE FROM pekerjaan

WHERE id_pekerjaan='$id'

"

);



include "config/hitung_progress.php";


hitungProgress(
$proyek,
$koneksi
);



header(
"location:pekerjaan.php?id=$proyek"
);


?>