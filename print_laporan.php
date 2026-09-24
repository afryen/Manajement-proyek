<?php

include "data/laporan.php";

?>


<!DOCTYPE html>

<html>

<head>

<title>
Cetak Laporan
</title>


<style>

body{

font-family:Arial;

}


table{

width:100%;

border-collapse:collapse;

}


td,th{

border:1px solid black;

padding:10px;

}


</style>


</head>


<body onload="window.print()">



<h1 align="center">

LAPORAN PROYEK KONSTRUKSI

</h1>


<p>

CV Duta Riau Konsultan

</p>




<table>


<tr>

<th>
Nama Proyek
</th>


<th>
Lokasi
</th>


<th>
Status
</th>


<th>
Progress
</th>

</tr>



<?php foreach($laporan as $l){ ?>


<tr>

<td>
<?=$l['nama']?>
</td>


<td>
<?=$l['lokasi']?>
</td>


<td>
<?=$l['status']?>
</td>


<td>
<?=$l['progress']?>%

</td>


</tr>


<?php } ?>


</table>



</body>

</html>