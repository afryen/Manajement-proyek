<?php

include "config/session.php";

include "config/database.php";




// ==========================
// AMBIL DATA EVALUASI
// ==========================


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



    ORDER BY evaluasi.id_evaluasi DESC



    "

);





if(!$query){

    die(
        "Query gagal : "
        .mysqli_error($koneksi)
    );

}


?>





<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<meta name="viewport" content="width=device-width, initial-scale=1.0">



<title>

Evaluasi Proyek

</title>




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









<!-- ==========================
     PAGE TITLE
=========================== -->


<div class="page-title evaluasi-title">





<span class="page-label">

EVALUASI

</span>






<h1>

Evaluasi Proyek

</h1>






<p>

Penilaian perkembangan pekerjaan proyek.

</p>





</div>









<!-- BUTTON -->



<div class="table-action">





<a href="tambah_evaluasi.php"

class="btn-primary">


+ Tambah Evaluasi


</a>





</div>









<!-- ==========================
     EVALUATION CARD
=========================== -->



<div class="evaluation-grid">







<?php while($e=mysqli_fetch_assoc($query)){ ?>








<div class="evaluation-card">







<div class="evaluation-header">





<h2>


<?= htmlspecialchars(

$e['nama_proyek']

); ?>


</h2>






<span class="badge">


Evaluasi


</span>





</div>









<p class="location">


📍 

<?= htmlspecialchars(

$e['lokasi']

); ?>


</p>









<!-- KENDALA -->


<div class="evaluation-section">



<h4>

Kendala

</h4>




<p>


<?= htmlspecialchars(

$e['kendala']

); ?>


</p>



</div>









<!-- SOLUSI -->


<div class="evaluation-section">



<h4>

Solusi

</h4>




<p>


<?= htmlspecialchars(

$e['solusi']

); ?>


</p>



</div>









<!-- HASIL -->


<div class="evaluation-result">



<h4>

Hasil

</h4>




<p>


<?= htmlspecialchars(

$e['hasil']

); ?>


</p>



</div>









<!-- ACTION -->



<div class="card-action">





<a 

href="edit_evaluasi.php?id=<?= $e['id_evaluasi']; ?>"


class="btn-warning">


✏ Edit


</a>








<a 

href="hapus_evaluasi.php?id=<?= $e['id_evaluasi']; ?>"


class="btn-danger"


onclick="return confirm('Hapus evaluasi ini?')">


🗑 Hapus


</a>







</div>








</div>







<?php } ?>








</div>









</div>









<script src="assets/js/theme.js"></script>


<script src="assets/js/app.js"></script>




</body>


</html>