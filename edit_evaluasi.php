<?php

include "config/session.php";
include "config/database.php";


$id=$_GET['id'];



$query=mysqli_query(
$koneksi,

"
SELECT *

FROM evaluasi

WHERE id_evaluasi='$id'

"

);



$data=mysqli_fetch_assoc($query);



if(isset($_POST['update'])){


$kendala=$_POST['kendala'];

$solusi=$_POST['solusi'];

$hasil=$_POST['hasil'];



mysqli_query(

$koneksi,

"

UPDATE evaluasi SET


kendala='$kendala',

solusi='$solusi',

hasil='$hasil'


WHERE id_evaluasi='$id'


"

);



header("location:detail_evaluasi.php?id=$id");

exit;


}


?>


<!DOCTYPE html>

<html>


<head>


<title>

Edit Evaluasi

</title>


<link rel="stylesheet" href="assets/css/style.css">


</head>



<body>



<div class="edit-container">


<div class="edit-card">



<h1>

Edit Evaluasi Proyek

</h1>




<form method="POST">



<label>

Kendala

</label>


<textarea name="kendala">

<?= $data['kendala']; ?>

</textarea>




<label>

Solusi

</label>


<textarea name="solusi">

<?= $data['solusi']; ?>

</textarea>





<label>

Hasil

</label>


<textarea name="hasil">

<?= $data['hasil']; ?>

</textarea>






<button

name="update"

class="btn-save">


Simpan Perubahan


</button>




<a href="detail_evaluasi.php?id=<?= $id ?>"

class="btn-back">

Batal

</a>




</form>


</div>


</div>



</body>

</html>