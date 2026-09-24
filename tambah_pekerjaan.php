<?php


include "config/database.php";


$id_proyek=$_GET['id'];



if(isset($_POST['simpan'])){


$nama=$_POST['nama'];

$bobot=$_POST['bobot'];

$status=$_POST['status'];



mysqli_query(

$koneksi,

"

INSERT INTO pekerjaan

VALUES

(

NULL,

'$id_proyek',

'$nama',

'$bobot',

'$status',

NOW()

)

"

);



include "config/hitung_progress.php";


hitungProgress(
$id_proyek,
$koneksi
);



header(
"location:pekerjaan.php?id=$id_proyek"
);


}



?>


<!DOCTYPE html>

<html>

<head>

<title>
Tambah Pekerjaan
</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>


<body>


<div class="edit-container">


<div class="edit-card">


<h2>
Tambah Pekerjaan
</h2>


<form method="POST">


<label>
Nama Pekerjaan
</label>


<textarea name="nama"></textarea>



<label>
Bobot (%)
</label>


<input 
type="number"
name="bobot">



<label>
Status
</label>


<select name="status">

<option>
Belum
</option>

<option>
Proses
</option>

<option>
Selesai
</option>


</select>



<button name="simpan">

Simpan

</button>


</form>


</div>


</div>


</body>

</html>