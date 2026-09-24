<?php

error_reporting(E_ALL);
ini_set('display_errors',1);


include "config/session.php";
include "config/database.php";


// ==========================
// STATISTIK PROYEK
// ==========================


$total = mysqli_fetch_assoc(

mysqli_query(
$koneksi,
"SELECT COUNT(*) jumlah FROM proyek"
)

)['jumlah'];



$perencanaan = mysqli_fetch_assoc(

mysqli_query(
$koneksi,
"SELECT COUNT(*) jumlah FROM proyek WHERE status='Perencanaan'"
)

)['jumlah'];



$berjalan = mysqli_fetch_assoc(

mysqli_query(
$koneksi,
"SELECT COUNT(*) jumlah FROM proyek WHERE status='Berjalan'"
)

)['jumlah'];



$selesai = mysqli_fetch_assoc(

mysqli_query(
$koneksi,
"SELECT COUNT(*) jumlah FROM proyek WHERE status='Selesai'"
)

)['jumlah'];





// ==========================
// PROGRESS RATA-RATA
// ==========================


$qprogress=mysqli_query(

$koneksi,

"SELECT AVG(progress) rata FROM proyek"

);


$dprogress=mysqli_fetch_assoc($qprogress);


$progress=round(
$dprogress['rata'] ?? 0
);






// ==========================
// DATA PROYEK
// ==========================


$data=mysqli_query(

$koneksi,

"SELECT * FROM proyek ORDER BY id_proyek DESC"

);



?>



<!DOCTYPE html>

<html>


<head>


<title>
Dashboard Manajemen Proyek
</title>



<link rel="stylesheet"
href="assets/css/style.css">


<link rel="stylesheet"
href="assets/css/dashboard.css">



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>



<body>



<?php include "layout/sidebar.php"; ?>



<div class="main-content">



<?php include "layout/topbar.php"; ?>




<div class="dashboard-wrapper">





<div class="dashboard-header">


<h1>

Dashboard Manajemen Proyek

</h1>


<p>

CV Duta Riau Konsultan

</p>


</div>








<!-- ======================
CARD STATISTIK
====================== -->


<div class="dashboard-cards">



<div class="dashboard-card-item">


<span>
Total Proyek
</span>


<h2>
<?=$total?>
</h2>


</div>




<div class="dashboard-card-item">


<span>
Perencanaan
</span>


<h2>
<?=$perencanaan?>
</h2>


</div>





<div class="dashboard-card-item">


<span>
Berjalan
</span>


<h2>
<?=$berjalan?>
</h2>


</div>





<div class="dashboard-card-item">


<span>
Selesai
</span>


<h2>
<?=$selesai?>
</h2>


</div>




</div>









<!-- ======================
GRAFIK BERSAMPINGAN
====================== -->


<div class="dashboard-chart-wrapper">





<!-- STATUS PROYEK -->


<div class="dashboard-chart-box">


<h2>
Status Proyek
</h2>


<canvas id="statusChart"></canvas>


</div>








<!-- PROGRESS PROYEK -->


<div class="dashboard-chart-box">


<h2>
Progress Proyek
</h2>


<canvas id="progressChart"></canvas>


</div>





</div>









<!-- ======================
DATA PROYEK
====================== -->


<div class="dashboard-panel">


<h2>
Proyek Terbaru
</h2>




<table>


<tr>


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
Status
</th>


<th>
Progress
</th>


</tr>





<?php while($p=mysqli_fetch_assoc($data)){ ?>


<tr>


<td>

<?=$p['nama_proyek']?>

</td>




<td>

<?=$p['lokasi']?>

</td>




<td>

<?=$p['client']?>

</td>




<td>

<?=$p['status']?>

</td>




<td>


<div class="progress-container">


<div class="progress-value"

style="width:<?=$p['progress']?>%">

</div>


</div>



<?=$p['progress']?>%


</td>



</tr>



<?php } ?>



</table>



</div>






</div>


</div>









<script>





// =======================
// BAR CHART STATUS
// =======================



new Chart(

document.getElementById('statusChart'),

{


type:'bar',


data:{


labels:[

'Perencanaan',

'Berjalan',

'Selesai'

],


datasets:[{


label:'Jumlah Proyek',


data:[


<?=$perencanaan?>,


<?=$berjalan?>,


<?=$selesai?>



],



backgroundColor:[


'#f59e0b',


'#2563eb',


'#16a34a'


],



borderRadius:12



}]



},



options:{


responsive:true,


animation:{


duration:1500


},


scales:{


y:{


beginAtZero:true


}


}



}



}



);











// =======================
// DONUT PROGRESS
// =======================



new Chart(

document.getElementById('progressChart'),

{


type:'doughnut',


data:{


labels:[


'Progress',


'Sisa'


],



datasets:[{


data:[


<?=$progress?>,


<?=100-$progress?>


],



backgroundColor:[


'#2563eb',


'#e5e7eb'


]



}]



},



options:{


responsive:true,


cutout:'70%',



plugins:{


legend:{


position:'bottom'


}



}



}



}



);




</script>





</body>

</html>