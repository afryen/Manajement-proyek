<?php

include "config/session.php";

include "config/database.php";



// ==========================
// AMBIL DATA PROYEK + FOTO DOKUMENTASI
// ==========================


$query = mysqli_query(

    $koneksi,

    "

    SELECT 

    proyek.*,

    dokumentasi.nama_file


    FROM proyek



    LEFT JOIN dokumentasi


    ON proyek.id_proyek = dokumentasi.id_proyek



    GROUP BY proyek.id_proyek



    ORDER BY proyek.id_proyek DESC


    "

);



?>







<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>

Laporan Proyek

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


<div class="page-title laporan-title">






<span class="page-label">

LAPORAN

</span>






<h1>

Laporan Proyek

</h1>






<p>

Rekapitulasi pekerjaan konstruksi CV Duta Riau.

</p>





</div>









<!-- ==========================
     BUTTON CETAK
=========================== -->


<div class="report-header">





<a href="cetak_laporan.php"

target="_blank"

class="btn-print">


📄 Cetak PDF


</a>








<button 

onclick="window.print()"

class="btn-print btn-print-biasa">


🖨 Cetak Biasa


</button>






</div>









<!-- ==========================
     TABLE REPORT
=========================== -->


<div class="report-card">







<table class="report-table">





<thead>


<tr>


<th>

No

</th>



<th>

Foto

</th>




<th>

Nama Proyek

</th>




<th>

Lokasi

</th>




<th>

Client

</th>




<th>

Anggaran

</th>




<th>

Status

</th>




<th>

Progress

</th>



</tr>


</thead>








<tbody>





<?php


$no=1;



while($p=mysqli_fetch_assoc($query)){



?>








<tr>





<td>

<?= $no++; ?>

</td>









<td>





<?php



if(!empty($p['nama_file'])){



?>




<img 

src="uploads/gambar_proyek/<?= $p['nama_file']; ?>"

class="project-image">





<?php



}else{



?>




<img 

src="assets/img/no-image.png"

class="project-image">





<?php



}



?>






</td>









<td>


<strong>

<?= htmlspecialchars($p['nama_proyek']); ?>

</strong>


</td>









<td>


<?= htmlspecialchars($p['lokasi']); ?>


</td>









<td>


<?= htmlspecialchars($p['client']); ?>


</td>









<td>


Rp <?= number_format(

$p['anggaran'],

0,

',',

'.'

); ?>


</td>









<td>


<span class="status-badge">


<?= htmlspecialchars($p['status']); ?>


</span>


</td>









<td>





<div class="report-progress">






<div class="report-progress-bar">


<span 

style="width:<?= $p['progress']; ?>%">


</span>


</div>






<small>

<?= $p['progress']; ?>%

</small>






</div>







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