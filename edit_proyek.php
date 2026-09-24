<?php

include "config/session.php";
include "config/database.php";


// ambil id proyek

$id = $_GET['id'];


// ambil data proyek

$query = mysqli_query(

    $koneksi,

    "

    SELECT * FROM proyek

    WHERE id_proyek='$id'

    "

);


$data = mysqli_fetch_assoc($query);



?>


<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<title>Edit Proyek</title>


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

EDIT PROYEK

</span>



<h1>

Edit Data Proyek

</h1>


<p>

Perbarui informasi proyek.

</p>


</div>







<div class="panel">


<form action="proses/update_proyek.php" method="POST">



<input type="hidden" 
name="id_proyek"
value="<?= $data['id_proyek']; ?>">






<label>

Nama Proyek

</label>


<input type="text"

name="nama_proyek"

value="<?= $data['nama_proyek']; ?>"

required>






<label>

Lokasi

</label>


<input type="text"

name="lokasi"

value="<?= $data['lokasi']; ?>"

required>






<label>

Client

</label>


<input type="text"

name="client"

value="<?= $data['client']; ?>"

required>







<label>

Status

</label>


<select name="status">


<option value="Berjalan"

<?= $data['status']=="Berjalan"?'selected':''; ?>>

Berjalan

</option>



<option value="Selesai"

<?= $data['status']=="Selesai"?'selected':''; ?>>

Selesai

</option>



<option value="Pending"

<?= $data['status']=="Pending"?'selected':''; ?>>

Pending

</option>



</select>








<label>

Progress (%)

</label>


<input type="number"

name="progress"

value="<?= $data['progress']; ?>"

min="0"

max="100"

required>








<button type="submit"

class="btn-primary">


Simpan Perubahan


</button>





<a href="proyek.php"

class="btn-danger">


Batal


</a>





</form>



</div>





</div>






<script src="assets/js/theme.js"></script>


</body>


</html>