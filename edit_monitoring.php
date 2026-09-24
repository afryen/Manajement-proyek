<?php

include "config/session.php";
include "config/database.php";


// cek id

if(!isset($_GET['id'])){

    header("location:monitoring.php");

    exit;

}


$id = $_GET['id'];



// ambil data monitoring

$query = mysqli_query(

    $koneksi,

    "

    SELECT *

    FROM monitoring

    WHERE id_monitoring='$id'

    "

);



if(!$query){

    die(mysqli_error($koneksi));

}



$data = mysqli_fetch_assoc($query);



?>



<!DOCTYPE html>

<html lang="id">


<head>

<meta charset="UTF-8">

<title>Edit Monitoring</title>


<link rel="stylesheet" href="assets/css/style.css">


</head>



<body>



<div id="pageLoader">

<div class="loader-logo">
DR
</div>


<div class="loader-title">
Duta Riau Konsultan
</div>

</div>




<?php include "layout/sidebar.php"; ?>


<div class="main-content">


<?php include "layout/topbar.php"; ?>




<div class="page-title">


<span class="page-label">

PROJECT MONITORING

</span>


<h1>

Edit Monitoring

</h1>


<p>

Perbarui data perkembangan proyek.

</p>


</div>







<div class="form-card">



<form method="POST"

action="proses/update_monitoring.php">



<input type="hidden"

name="id_monitoring"

value="<?= $data['id_monitoring']; ?>">




<div class="form-group">

<label>

Jenis Proyek

</label>


<select name="jenis_proyek" required>



<option value="Drainase"

<?= $data['jenis_proyek']=="Drainase"?'selected':'';?>>

Drainase

</option>



<option value="Jalan"

<?= $data['jenis_proyek']=="Jalan"?'selected':'';?>>

Jalan

</option>



<option value="Jembatan"

<?= $data['jenis_proyek']=="Jembatan"?'selected':'';?>>

Jembatan

</option>



<option value="Bangunan Gedung"

<?= $data['jenis_proyek']=="Bangunan Gedung"?'selected':'';?>>

Bangunan Gedung

</option>



<option value="Irigasi"

<?= $data['jenis_proyek']=="Irigasi"?'selected':'';?>>

Irigasi

</option>


</select>


</div>







<div class="form-row">



<div class="form-group">


<label>

Tanggal Monitoring

</label>


<input

type="date"

name="tanggal_monitoring"

value="<?= $data['tanggal_monitoring']; ?>"

required>


</div>






<div class="form-group">


<label>

Progress (%)

</label>


<input

type="number"

name="progress"

min="0"

max="100"

value="<?= $data['progress']; ?>"

required>


</div>



</div>






<div class="form-group">


<label>

Kendala

</label>


<textarea

name="kendala"><?= $data['kendala']; ?></textarea>


</div>







<div class="form-group">


<label>

Solusi

</label>


<textarea

name="solusi"><?= $data['solusi']; ?></textarea>


</div>







<div class="form-group">


<label>

Catatan

</label>


<textarea

name="catatan"><?= $data['catatan']; ?></textarea>


</div>







<button

type="submit"

class="btn-submit">

Update Monitoring

</button>



<a href="monitoring.php"

class="btn-danger">

Batal

</a>






</form>


</div>


</div>



<script src="assets/js/theme.js"></script>

<script src="assets/js/script.js"></script>


</body>


</html>