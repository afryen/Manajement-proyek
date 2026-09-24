<?php


include "../config/database.php";



if($_POST){



// ==========================
// DATA FORM PROYEK
// ==========================


$nama_proyek = $_POST['nama_proyek'];


$lokasi = $_POST['lokasi'];


$client = $_POST['client'];


$tanggal_mulai = $_POST['tanggal_mulai'];


$tanggal_selesai = $_POST['tanggal_selesai'];


$anggaran = $_POST['anggaran'];


$status = $_POST['status'];


$progress = $_POST['progress'];




// ==========================
// DATA MAP
// ==========================


$latitude = $_POST['latitude'];


$longitude = $_POST['longitude'];







// ==========================
// SIMPAN DATA
// ==========================


$simpan = mysqli_query(

$koneksi,


"INSERT INTO proyek

(

nama_proyek,

lokasi,

latitude,

longitude,

client,

tanggal_mulai,

tanggal_selesai,

anggaran,

status,

progress

)


VALUES


(

'$nama_proyek',

'$lokasi',

'$latitude',

'$longitude',

'$client',

'$tanggal_mulai',

'$tanggal_selesai',

'$anggaran',

'$status',

'$progress'

)


"

);







// ==========================
// CEK SIMPAN
// ==========================


if($simpan){


header("location:../proyek.php");


exit;


}

else{


echo "Gagal menyimpan data : ";

echo mysqli_error($koneksi);


}



}



?>