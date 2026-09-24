<?php

include "config/session.php";

include "config/database.php";




// ==========================
// AMBIL DATA DOKUMENTASI PROYEK
// ==========================


$query = mysqli_query(

    $koneksi,

    "

    SELECT 


    proyek.id_proyek,

    proyek.nama_proyek,

    proyek.lokasi,

    proyek.latitude,

    proyek.longitude,

    proyek.client,

    proyek.status,

    proyek.progress,



    dokumentasi.id_dokumentasi,

    dokumentasi.nama_file,

    dokumentasi.keterangan,

    dokumentasi.tanggal



    FROM proyek



    LEFT JOIN dokumentasi



    ON proyek.id_proyek = dokumentasi.id_proyek



    ORDER BY proyek.id_proyek DESC



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

Dokumentasi Proyek

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









<div class="page-title dokumentasi-title">






<span class="page-label">

DOKUMENTASI

</span>







<h1>

Dokumentasi Proyek

</h1>







<p>

Dokumentasi pekerjaan konstruksi berdasarkan data proyek.

</p>







</div>









<div class="document-grid">







<?php while($p=mysqli_fetch_assoc($query)){ ?>







<div class="document-card">







<!-- FOTO -->

<div class="document-image">







<?php



if(!empty($p['nama_file'])){



    $gambar = 
    "uploads/gambar_proyek/".$p['nama_file'];





    if(file_exists($gambar)){



?>



<img

src="<?= $gambar; ?>"

class="document-photo"

>



<?php



    }

    else{



?>



<img

src="assets/img/no-image.png"

class="document-photo"

>



<?php



    }



}

else{



?>



<img

src="assets/img/no-image.png"

class="document-photo"

>



<?php



}



?>







</div>









<!-- ==========================
     MINI MAP LOKASI PROYEK
========================== -->


<div class="project-map">



<iframe


src="https://maps.google.com/maps?q=<?= urlencode($p['lokasi']); ?>&output=embed"


loading="lazy">


</iframe>



</div>









<!-- DETAIL -->



<div class="document-body">







<h3>


<?= htmlspecialchars(

$p['nama_proyek']

); ?>


</h3>









<p>


📍 

<?= htmlspecialchars(

$p['lokasi']

); ?>


</p>









<p>


Client :

<?= htmlspecialchars(

$p['client']

); ?>


</p>









<span class="badge">


<?= htmlspecialchars(

$p['status']

); ?>


</span>









<!-- PROGRESS -->



<div class="progress-area">






<div class="progress-bg">



<div class="progress-fill"


style="width:<?= $p['progress']; ?>%">



</div>


</div>







<strong>


<?= $p['progress']; ?>%


</strong>







</div>









<?php if(!empty($p['keterangan'])){ ?>



<p class="description">


<?= htmlspecialchars(

$p['keterangan']

); ?>


</p>



<?php } ?>









<!-- AKSI -->



<div class="document-action">






<?php 


if(

isset($_SESSION['login'])

&&

$_SESSION['login']==true

){ 



?>







<?php if(!empty($p['id_dokumentasi'])){ ?>






<a

href="edit_dokumentasi.php?id=<?= $p['id_dokumentasi']; ?>"

class="btn-warning">


✏ Edit


</a>








<a

href="hapus_dokumentasi.php?id=<?= $p['id_dokumentasi']; ?>"

class="btn-danger"


onclick="return confirm('Yakin ingin menghapus dokumentasi ini?')">


🗑 Hapus


</a>






<?php } ?>







<a

href="upload_dokumentasi.php?id=<?= $p['id_proyek']; ?>"

class="btn-primary">


+ Upload Dokumentasi


</a>






<?php } ?>








</div>









</div>







</div>









<?php } ?>









</div>







</div>









<script src="assets/js/theme.js"></script>


<script src="assets/js/app.js"></script>





</body>


</html>