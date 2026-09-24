<?php

include "config/session.php";
include "config/database.php";



// cek id proyek

if(!isset($_GET['id'])){


    header("location:proyek.php");

    exit;


}


$id = $_GET['id'];




// ==========================
// DATA PROYEK
// ==========================


$query_proyek = mysqli_query(

$koneksi,

"

SELECT *

FROM proyek

WHERE id_proyek='$id'

"

);



$proyek = mysqli_fetch_assoc($query_proyek);



if(!$proyek){


    echo "Data proyek tidak ditemukan";

    exit;


}






// ==========================
// DATA PEKERJAAN
// ==========================


$query_pekerjaan = mysqli_query(

$koneksi,

"

SELECT *

FROM pekerjaan

WHERE id_proyek='$id'

ORDER BY id_pekerjaan DESC


"

);




?>



<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<title>

Detail Proyek

</title>



<link rel="stylesheet" href="assets/css/style.css">


</head>



<body>




<?php include "layout/sidebar.php"; ?>





<div class="main-content">





<?php include "layout/topbar.php"; ?>







<div class="detail-project-container">






<!-- HEADER PROYEK -->


<div class="project-detail-header">


<div>


<span class="page-label">

DETAIL PROYEK

</span>


<h1>

<?= htmlspecialchars($proyek['nama_proyek']); ?>

</h1>



<p>

📍 <?= htmlspecialchars($proyek['lokasi']); ?>

</p>


</div>





<div class="project-status">


<span>

<?= htmlspecialchars($proyek['status']); ?>

</span>


</div>


</div>









<!-- INFORMASI PROYEK -->


<div class="project-info-card">



<div class="info-box">


<h4>

Client

</h4>


<p>

<?= htmlspecialchars($proyek['client']); ?>

</p>


</div>






<div class="info-box">


<h4>

Progress

</h4>


<h2>

<?= $proyek['progress']; ?>%

</h2>


</div>





<div class="info-box">


<h4>

Status

</h4>


<p>

<?= $proyek['status']; ?>

</p>


</div>



</div>









<!-- PROGRESS -->


<div class="project-progress-card">


<h3>

Progress Proyek

</h3>



<div class="progress-bg large">


<div class="progress-fill"

style="width:<?= $proyek['progress']; ?>%">

</div>


</div>



<b>

<?= $proyek['progress']; ?>%

</b>


</div>









<!-- PEKERJAAN -->


<div class="project-work-card">



<div class="card-header">


<h2>

Daftar Pekerjaan

</h2>



<a href="tambah_pekerjaan.php?id=<?= $id ?>"

class="btn-primary">


+ Tambah Pekerjaan


</a>


</div>








<table class="project-table">


<thead>


<tr>


<th>

Pekerjaan

</th>


<th>

Bobot

</th>


<th>

Status

</th>


<th>

Aksi

</th>


</tr>


</thead>




<tbody>




<?php while($p=mysqli_fetch_assoc($query_pekerjaan)){ ?>



<tr>



<td>


<?= htmlspecialchars($p['nama_pekerjaan']); ?>


</td>




<td>


<?= $p['bobot']; ?>%


</td>





<td>


<?php


if($p['status']=="Selesai"){


echo '<span class="status-done">

Selesai

</span>';


}

elseif($p['status']=="Proses"){


echo '<span class="status-process">

Proses

</span>';


}

else{


echo '<span class="status-wait">

Belum

</span>';


}


?>



</td>






<td>



<a href="edit_pekerjaan.php?id=<?= $p['id_pekerjaan']; ?>"

class="btn-warning">


Edit


</a>




<a href="hapus_pekerjaan.php?id=<?= $p['id_pekerjaan']; ?>&proyek=<?= $id; ?>"

class="btn-danger"


onclick="return confirm('Hapus pekerjaan ini?')">


Hapus


</a>



</td>




</tr>



<?php } ?>





</tbody>



</table>




</div>









</div>







<script src="assets/js/theme.js"></script>


</body>


</html>