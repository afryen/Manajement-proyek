<?php

include "../config/database.php";


/** @var mysqli $koneksi */


if(isset($_GET['id'])){


    $id = $_GET['id'];


    $hapus = mysqli_query(

        $koneksi,

        "DELETE FROM proyek WHERE id_proyek='$id'"

    );


    if($hapus){


        header("location:../proyek.php");

        exit;


    }else{


        echo "Gagal menghapus data proyek";

        echo "<br>";

        echo mysqli_error($koneksi);


    }


}else{


    header("location:../proyek.php");

    exit;


}


?>