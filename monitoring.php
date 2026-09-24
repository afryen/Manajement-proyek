<?php

include "config/session.php";

include "config/database.php";




// ==========================
// AMBIL DATA MONITORING
// ==========================


$query = mysqli_query(

    $koneksi,

    "
    SELECT * 

    FROM monitoring

    ORDER BY id_monitoring DESC

    "

);


?>



<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>

Monitoring Proyek

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



<div class="page-title monitoring-title">





<span class="page-label">

PROJECT MONITORING

</span>






<h1>

Monitoring Proyek

</h1>






<p>

Pemantauan perkembangan pekerjaan proyek.

</p>





</div>









<!-- ==========================
     CONTENT
=========================== -->




<div class="panel">






<div class="table-action">





<a href="tambah_monitoring.php"

class="btn-primary">


+ Tambah Monitoring


</a>




</div>









<table>



<thead>


<tr>



<th>

Jenis Proyek

</th>




<th>

Tanggal

</th>




<th>

Progress

</th>




<th>

Kendala

</th>




<th>

Solusi

</th>




<th>

Catatan

</th>




<th>

Aksi

</th>



</tr>


</thead>









<tbody>





<?php while($m=mysqli_fetch_assoc($query)){ ?>





<tr>





<td>


<?= htmlspecialchars(
$m['jenis_proyek']
); ?>


</td>







<td>


<?= htmlspecialchars(
$m['tanggal_monitoring']
); ?>


</td>








<td>





<div class="progress-box">





<div class="progress-bar"

style="width:<?= $m['progress']; ?>%">



</div>





</div>






<?= $m['progress']; ?>%





</td>









<td>


<?= htmlspecialchars(
$m['kendala']
); ?>


</td>








<td>


<?= htmlspecialchars(
$m['solusi']
); ?>


</td>








<td>


<?= htmlspecialchars(
$m['catatan']
); ?>


</td>









<td>





<a href="edit_monitoring.php?id=<?=$m['id_monitoring']?>"

class="btn-edit">


Edit


</a>








<a href="proses/hapus_monitoring.php?id=<?=$m['id_monitoring']?>"

class="btn-delete"


onclick="return confirm('Yakin ingin menghapus monitoring ini?')">


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