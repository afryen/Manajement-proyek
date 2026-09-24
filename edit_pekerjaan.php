<?php

include "config/database.php";


$id=$_GET['id'];



$data=mysqli_fetch_assoc(

mysqli_query(

$koneksi,

"

SELECT *

FROM pekerjaan

WHERE id_pekerjaan='$id'

"

)

);



if(isset($_POST['update'])){


mysqli_query(

$koneksi,

"

UPDATE pekerjaan SET


nama_pekerjaan='$_POST[nama]',


bobot='$_POST[bobot]',


status='$_POST[status]'



WHERE id_pekerjaan='$id'

"

);



include "config/hitung_progress.php";


hitungProgress(
$data['id_proyek'],
$koneksi
);



header(
"location:pekerjaan.php?id=".$data['id_proyek']
);



}

?>