<?php


include "../config/database.php";



// ambil data form


$id = $_POST['id_proyek'];

$nama = $_POST['nama_proyek'];

$lokasi = $_POST['lokasi'];

$client = $_POST['client'];

$status = $_POST['status'];

$progress = $_POST['progress'];




// update data


$query = mysqli_query(

$koneksi,

"

UPDATE proyek SET


nama_proyek='$nama',

lokasi='$lokasi',

client='$client',

status='$status',

progress='$progress'


WHERE id_proyek='$id'


"

);






if($query){


header("location:../proyek.php");


}

else{


echo "

Update gagal :

".mysqli_error($koneksi);


}



?>