<?php

error_reporting(E_ALL);
ini_set('display_errors',1);


include "config/session.php";
include "config/database.php";


// AMBIL DATA PROYEK

$query = mysqli_query(

    $koneksi,

    "SELECT * FROM proyek ORDER BY id_proyek DESC"

);


?>


<!DOCTYPE html>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
Data Proyek
</title>


<link rel="stylesheet" href="assets/css/style.css">


<style>


.project-container{

    background:white;

    padding:30px;

    border-radius:25px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.08);

}



.project-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;

}



.project-header h1{

    color:#12395b;

}



.btn-primary{


    background:#2563eb;

    color:white;

    padding:12px 20px;

    border-radius:12px;

    text-decoration:none;


}



.btn-primary:hover{

    background:#12395b;

}





table{

    width:100%;

    border-collapse:collapse;

}



table th{


    background:#12395b;

    color:white;

    padding:15px;

    text-align:left;


}



table td{


    padding:15px;

    border-bottom:

    1px solid #ddd;


}



table tr:hover{


    background:#f8fafc;


}




.status{


    padding:7px 15px;

    border-radius:20px;

    background:#dbeafe;

    color:#1d4ed8;

    font-size:13px;


}





.progress-area{


    width:150px;

    height:10px;

    background:#e5e7eb;

    border-radius:20px;

    overflow:hidden;


}



.progress-bar{


    height:100%;

    background:

    linear-gradient(
        90deg,
        #2563eb,
        #06b6d4
    );


}





.btn-edit{


    background:#16a34a;

    color:white;

    padding:7px 12px;

    border-radius:8px;

    text-decoration:none;

    margin-right:5px;

}



.btn-delete{


    background:#dc2626;

    color:white;

    padding:7px 12px;

    border-radius:8px;

    text-decoration:none;


}



.btn-edit:hover,
.btn-delete:hover{


    opacity:.8;


}



</style>


</head>



<body>


<?php include "layout/sidebar.php"; ?>



<div class="main-content">



<?php include "layout/topbar.php"; ?>




<div class="project-container">



<div class="project-header">


<div>


<h1>

Manajemen Proyek

</h1>


<p>

Daftar Proyek Konstruksi CV Duta Riau Konsultan

</p>


</div>




<a href="tambah_proyek.php"

class="btn-primary">

+ Tambah Proyek

</a>



</div>






<table>


<tr>


<th>
No
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
Status
</th>


<th>
Progress
</th>


<th>
Aksi
</th>


</tr>





<?php


$no=1;


while($p=mysqli_fetch_assoc($query)){


?>



<tr>



<td>

<?= $no++; ?>

</td>




<td>


<b>

<?= $p['nama_proyek']; ?>

</b>


<br>


<small>

ID PRJ-<?= $p['id_proyek']; ?>

</small>


</td>





<td>

<?= $p['lokasi']; ?>

</td>




<td>

<?= $p['client']; ?>

</td>




<td>


<span class="status">

<?= $p['status']; ?>

</span>


</td>






<td>


<div class="progress-area">


<div class="progress-bar"

style="width:<?= $p['progress']; ?>%">


</div>


</div>


<?= $p['progress']; ?>%



</td>






<td>


<a href="edit_proyek.php?id=<?=$p['id_proyek']?>"

class="btn-edit">

Edit

</a>





<a href="proses/hapus_proyek.php?id=<?=$p['id_proyek']?>"

class="btn-delete"

onclick="return confirm('Yakin ingin menghapus proyek ini?')">

Hapus

</a>



</td>



</tr>



<?php } ?>



</table>




</div>




</div>




</body>


</html>