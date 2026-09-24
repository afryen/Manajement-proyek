<?php


include "config/session.php";

include "config/database.php";




// cek id

if(!isset($_GET['id'])){


    header("location:dokumentasi.php");

    exit;


}



$id = intval($_GET['id']);






// ambil data file gambar


$query = mysqli_query(

    $koneksi,

    "

    SELECT nama_file

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







// hapus file gambar


$file = "uploads/gambar_proyek/".$data['nama_file'];



if(!empty($data['nama_file']) && file_exists($file)){


    unlink($file);


}








// hapus data database


$hapus = mysqli_query(

    $koneksi,

    "

    DELETE FROM dokumentasi

    WHERE id_dokumentasi='$id'

    "

);








if($hapus){



    echo "

    <script>

    alert('Dokumentasi berhasil dihapus');

    window.location='dokumentasi.php';

    </script>

    ";



}

else{



    echo "

    <script>

    alert('Dokumentasi gagal dihapus');

    window.location='dokumentasi.php';

    </script>

    ";



}



?>