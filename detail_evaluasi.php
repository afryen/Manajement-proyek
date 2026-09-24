<?php

include "config/session.php";
include "config/database.php";


$id = $_GET['id'];



$query = mysqli_query(
    $koneksi,
    "
    SELECT

    evaluasi.*,

    proyek.nama_proyek,

    proyek.lokasi


    FROM evaluasi


    JOIN proyek


    ON evaluasi.id_proyek = proyek.id_proyek


    WHERE evaluasi.id_evaluasi='$id'

    "
);



$data = mysqli_fetch_assoc($query);



if(!$data){

    echo "Data tidak ditemukan";

    exit;

}


?>


<!DOCTYPE html>

<html lang="id">


<head>


<title>
Detail Evaluasi
</title>


<link rel="stylesheet" href="assets/css/style.css">


</head>



<body>


<div class="detail-container">


<div class="detail-card">


<div class="detail-header">


<h1>

<?= $data['nama_proyek']; ?>

</h1>


<p>

📍 <?= $data['lokasi']; ?>

</p>


</div>




<div class="detail-item">

<h3>
Kendala
</h3>

<p>

<?= $data['kendala']; ?>

</p>

</div>




<div class="detail-item">

<h3>
Solusi
</h3>

<p>

<?= $data['solusi']; ?>

</p>

</div>





<div class="detail-item">

<h3>
Hasil
</h3>

<p>

<?= $data['hasil']; ?>

</p>

</div>





<div class="detail-action">


<a href="edit_evaluasi.php?id=<?= $data['id_evaluasi']; ?>"

class="btn-edit">

Edit Evaluasi

</a>



<a href="evaluasi.php"

class="btn-back">

Kembali

</a>



</div>




</div>


</div>



</body>

</html>