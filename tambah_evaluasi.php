<?php

include "config/session.php";

include "config/database.php";




// ambil data proyek

$proyek = mysqli_query(

    $koneksi,

    "

    SELECT *

    FROM proyek

    ORDER BY nama_proyek ASC

    "

);



if(!$proyek){

    die("Query proyek gagal : ".mysqli_error($koneksi));

}






// proses simpan evaluasi


if(isset($_POST['simpan'])){


    $id_proyek = mysqli_real_escape_string(

        $koneksi,

        $_POST['id_proyek']

    );



    $kendala = mysqli_real_escape_string(

        $koneksi,

        $_POST['kendala']

    );



    $solusi = mysqli_real_escape_string(

        $koneksi,

        $_POST['solusi']

    );



    $hasil = mysqli_real_escape_string(

        $koneksi,

        $_POST['hasil']

    );





    $query = mysqli_query(

        $koneksi,

        "

        INSERT INTO evaluasi

        (

        id_proyek,

        kendala,

        solusi,

        hasil

        )


        VALUES

        (

        '$id_proyek',

        '$kendala',

        '$solusi',

        '$hasil'

        )


        "

    );






    if($query){


        echo "

        <script>

        alert('Evaluasi berhasil disimpan');

        window.location='evaluasi.php';

        </script>

        ";


        exit;



    }else{


        echo "

        <script>

        alert('Gagal menyimpan evaluasi');

        </script>

        ";


        echo mysqli_error($koneksi);


    }



}



?>





<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<title>

Tambah Evaluasi Proyek

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







<div class="page-title">


<span class="page-label">

EVALUASI

</span>




<h1>

Tambah Evaluasi Proyek

</h1>




<p>

Masukkan hasil evaluasi pekerjaan proyek.

</p>


</div>








<div class="form-card">





<form method="POST">






<div class="form-group">


<label>

Pilih Proyek

</label>




<select name="id_proyek" required>


<option value="">

-- Pilih Proyek --

</option>





<?php while($p=mysqli_fetch_assoc($proyek)){ ?>



<option value="<?= $p['id_proyek']; ?>">


<?= htmlspecialchars($p['nama_proyek']); ?>


</option>



<?php } ?>





</select>



</div>









<div class="form-group">


<label>

Kendala

</label>




<textarea

name="kendala"

placeholder="Masukkan kendala proyek"

required></textarea>



</div>








<div class="form-group">


<label>

Solusi

</label>




<textarea

name="solusi"

placeholder="Masukkan solusi penyelesaian"

required></textarea>



</div>








<div class="form-group">


<label>

Hasil Evaluasi

</label>




<textarea

name="hasil"

placeholder="Masukkan hasil evaluasi"

required></textarea>



</div>








<button

type="submit"

name="simpan"

class="btn-submit">


Simpan Evaluasi


</button>








<a href="evaluasi.php"

class="btn-danger">


Batal


</a>






</form>






</div>







</div>







<script src="assets/js/theme.js"></script>

<script src="assets/js/app.js"></script>




</body>


</html>