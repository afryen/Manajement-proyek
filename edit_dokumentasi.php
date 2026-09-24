<?php


include "config/session.php";

include "config/database.php";



// cek id

if(!isset($_GET['id'])){


    header("location:dokumentasi.php");

    exit;


}



$id = intval($_GET['id']);





// ambil data dokumentasi


$query = mysqli_query(

    $koneksi,

    "

    SELECT *

    FROM dokumentasi

    WHERE id_dokumentasi='$id'

    "

);



$data = mysqli_fetch_assoc($query);





if(!$data){


    echo "

    <script>

    alert('Data dokumentasi tidak ditemukan');

    window.location='dokumentasi.php';

    </script>

    ";


    exit;


}








// UPDATE DATA


if(isset($_POST['update'])){



    $keterangan = mysqli_real_escape_string(

        $koneksi,

        $_POST['keterangan']

    );





    $nama_file_lama = $data['nama_file'];



    $update = false;







    // jika mengganti foto


    if(!empty($_FILES['gambar']['name'])){



        $nama_file = $_FILES['gambar']['name'];

        $tmp = $_FILES['gambar']['tmp_name'];



        $folder = "uploads/gambar_proyek/";



        $nama_baru = time()."_".$nama_file;



        $lokasi = $folder.$nama_baru;






        if(move_uploaded_file($tmp,$lokasi)){






            // hapus gambar lama


            $file_lama = $folder.$nama_file_lama;



            if(file_exists($file_lama)){


                unlink($file_lama);


            }







            $update = mysqli_query(

                $koneksi,

                "

                UPDATE dokumentasi SET


                nama_file='$nama_baru',

                keterangan='$keterangan'


                WHERE id_dokumentasi='$id'


                "

            );



        }




    }

    else{



        // hanya update keterangan



        $update = mysqli_query(

            $koneksi,

            "

            UPDATE dokumentasi SET


            keterangan='$keterangan'


            WHERE id_dokumentasi='$id'


            "

        );



    }







    if($update){


        echo "

        <script>

        alert('Dokumentasi berhasil diperbarui');

        window.location='dokumentasi.php';

        </script>

        ";


        exit;


    }



}






?>





<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<title>

Edit Dokumentasi Proyek

</title>



<link rel="stylesheet" href="assets/css/style.css">



</head>




<body>





<?php include "layout/sidebar.php"; ?>





<div class="main-content">





<?php include "layout/topbar.php"; ?>








<div class="upload-container">






<div class="upload-card">







<h2>

Edit Dokumentasi Proyek

</h2>








<!-- PREVIEW GAMBAR -->



<div class="preview-image">





<?php



$file="uploads/gambar_proyek/".$data['nama_file'];



if(file_exists($file)){



?>



<img src="<?= $file; ?>">



<?php



}else{



?>



<img src="assets/img/no-image.png">



<?php



}



?>





</div>









<form method="POST"

enctype="multipart/form-data">







<label>

Ganti Foto Dokumentasi

</label>






<input

type="file"

name="gambar"

accept="image/*">










<label>

Keterangan Dokumentasi

</label>





<textarea

name="keterangan"

required><?= htmlspecialchars($data['keterangan']); ?></textarea>









<div class="form-action">






<button

type="submit"

name="update"

class="btn-primary">


Simpan Perubahan


</button>







<a href="dokumentasi.php"

class="btn-cancel">


Kembali


</a>







</div>







</form>









</div>








</div>









</div>







<script src="assets/js/app.js"></script>



</body>


</html>