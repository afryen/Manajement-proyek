<?php


include "config/session.php";

include "config/database.php";




// cek id proyek

if(!isset($_GET['id'])){


    header("location:dokumentasi.php");

    exit;


}



$id_proyek = $_GET['id'];




// ambil data proyek


$proyek = mysqli_query(

    $koneksi,

    "

    SELECT *

    FROM proyek

    WHERE id_proyek='$id_proyek'

    "

);





if(!$proyek){


    die("Query proyek gagal : ".mysqli_error($koneksi));


}




$data_proyek = mysqli_fetch_assoc($proyek);





// proses upload


if(isset($_POST['upload'])){





    $keterangan = mysqli_real_escape_string(

        $koneksi,

        $_POST['keterangan']

    );





    $tanggal = date("Y-m-d");





    // cek file gambar


    if(isset($_FILES['gambar']) && $_FILES['gambar']['error']==0){





        $nama_file = $_FILES['gambar']['name'];

        $tmp_file = $_FILES['gambar']['tmp_name'];






        // ekstensi file


        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);


        $ext = strtolower($ext);






        $format = ['jpg','jpeg','png','webp'];






        if(!in_array($ext,$format)){



            echo "

            <script>

            alert('Format file harus JPG, JPEG, PNG, atau WEBP');

            </script>

            ";

            exit;



        }






        // folder upload


        $folder = "uploads/gambar_proyek/";







        if(!is_dir($folder)){


            mkdir($folder,0777,true);


        }







        // nama file baru


        $nama_baru = time()."_".$nama_file;





        $lokasi_file = $folder.$nama_baru;







        // upload gambar


        if(move_uploaded_file($tmp_file,$lokasi_file)){






            $query = mysqli_query(

                $koneksi,

                "

                INSERT INTO dokumentasi

                (

                id_proyek,

                nama_file,

                keterangan,

                tanggal,

                tanggal_upload

                )


                VALUES

                (

                '$id_proyek',

                '$nama_baru',

                '$keterangan',

                '$tanggal',

                '$tanggal'

                )


                "

            );








            if($query){



                echo "

                <script>

                alert('Dokumentasi berhasil diupload');

                window.location='dokumentasi.php';

                </script>

                ";



            }else{



                echo "

                Gagal menyimpan data :

                ".mysqli_error($koneksi);



            }







        }else{



            echo "

            <script>

            alert('Gagal upload gambar');

            </script>

            ";



        }







    }else{



        echo "

        <script>

        alert('Silahkan pilih gambar terlebih dahulu');

        </script>

        ";



    }






}



?>





<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<title>

Upload Dokumentasi

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







<div class="upload-container">





<div class="upload-card">






<h1>

Upload Dokumentasi

</h1>






<p>

<?= htmlspecialchars($data_proyek['nama_proyek']); ?>

</p>









<form method="POST"

enctype="multipart/form-data">







<label>

Pilih Foto Proyek

</label>





<input 

type="file"

name="gambar"

accept="image/*"

required>









<label>

Keterangan Pekerjaan

</label>






<textarea

name="keterangan"

placeholder="Contoh: Pekerjaan pengecoran lantai 2 selesai"

required></textarea>









<button

type="submit"

name="upload"

class="btn-primary">



Upload Dokumentasi



</button>







<a href="dokumentasi.php"

class="btn-danger">


Batal


</a>







</form>







</div>







</div>







</div>






<script src="assets/js/theme.js"></script>

<script src="assets/js/app.js"></script>




</body>


</html>