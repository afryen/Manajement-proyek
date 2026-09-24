<?php


include "config/session.php";

include "config/database.php";




// cek id

if(!isset($_GET['id'])){


    header("location:evaluasi.php");

    exit;


}



$id = intval($_GET['id']);






// cek apakah data ada


$cek = mysqli_query(

    $koneksi,

    "

    SELECT *

    FROM evaluasi

    WHERE id_evaluasi='$id'

    "

);





$data = mysqli_fetch_assoc($cek);





if(!$data){


    echo "

    <script>

    alert('Data evaluasi tidak ditemukan');

    window.location='evaluasi.php';

    </script>

    ";


    exit;


}









// hapus data


$query = mysqli_query(

    $koneksi,

    "

    DELETE FROM evaluasi

    WHERE id_evaluasi='$id'

    "

);







if($query){



    echo "

    <script>

    alert('Evaluasi berhasil dihapus');

    window.location='evaluasi.php';

    </script>

    ";



}

else{



    echo "

    <script>

    alert('Evaluasi gagal dihapus');

    window.location='evaluasi.php';

    </script>

    ";



}



?>