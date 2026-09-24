<?php


include "config/database.php";


$id=$_GET['id'];



$query=mysqli_query(

$koneksi,

"

SELECT *

FROM pekerjaan

WHERE id_proyek='$id'

"

);


?>


<h2>
Daftar Pekerjaan
</h2>


<a href="tambah_pekerjaan.php?id=<?=$id?>">

Tambah Pekerjaan

</a>


<table border="1">


<tr>

<th>
Pekerjaan
</th>

<th>
Bobot
</th>

<th>
Status
</th>

<th>
Aksi
</th>

</tr>



<?php while($p=mysqli_fetch_assoc($query)){ ?>


<tr>


<td>

<?=$p['nama_pekerjaan'];?>

</td>


<td>

<?=$p['bobot'];?>%

</td>



<td>

<?=$p['status'];?>

</td>



<td>


<a href="edit_pekerjaan.php?id=<?=$p['id_pekerjaan']?>">

Edit

</a>



<a href="hapus_pekerjaan.php?id=<?=$p['id_pekerjaan']?>&proyek=<?=$id?>">

Hapus

</a>


</td>



</tr>


<?php } ?>


</table>