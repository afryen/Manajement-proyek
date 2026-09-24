<?php


include "config/database.php";


require_once('TCPDF/tcpdf.php');




// ==========================
// AMBIL DATA PROYEK
// ==========================


$query = mysqli_query(

    $koneksi,

    "SELECT * FROM proyek 
     ORDER BY id_proyek DESC"

);





// ==========================
// SETUP PDF
// ==========================


$pdf = new TCPDF(

    'L',
    'mm',
    'A4',
    true,
    'UTF-8',
    false

);





$pdf->SetCreator(
    'CV Duta Riau Konsultan'
);


$pdf->SetAuthor(
    'CV Duta Riau Konsultan'
);


$pdf->SetTitle(
    'Laporan Proyek'
);





// hapus header/footer bawaan

$pdf->setPrintHeader(false);

$pdf->setPrintFooter(false);





// margin

$pdf->SetMargins(
    10,
    10,
    10
);




// tambah halaman

$pdf->AddPage();








// ==========================
// HEADER LAPORAN
// ==========================



$html = '



<table width="100%" cellpadding="5">


<tr>


<td width="20%" align="center">



</td>





<td width="80%" align="center">


<h2>

CV DUTA RIAU KONSULTAN

</h2>




<h3>

LAPORAN REKAPITULASI PROYEK KONSTRUKSI

</h3>



<p>

Tanggal Cetak :
'.date('d-m-Y').'

</p>




</td>



</tr>



</table>





<hr>



<br>






<p>

Berikut merupakan laporan rekapitulasi pekerjaan konstruksi CV Duta Riau Konsultan.

</p>




<br>







<table border="1" cellpadding="6">



<tr bgcolor="#12395b">



<th width="7%" align="center">

<font color="white">

<b>No</b>

</font>

</th>





<th width="18%" align="center">

<font color="white">

<b>Nama Proyek</b>

</font>

</th>






<th width="18%" align="center">

<font color="white">

<b>Lokasi</b>

</font>

</th>






<th width="18%" align="center">

<font color="white">

<b>Client</b>

</font>

</th>






<th width="18%" align="center">

<font color="white">

<b>Anggaran</b>

</font>

</th>






<th width="11%" align="center">

<font color="white">

<b>Status</b>

</font>

</th>






<th width="10%" align="center">

<font color="white">

<b>Progress</b>

</font>

</th>





</tr>









';







$no = 1;






while($p = mysqli_fetch_assoc($query)){



$html .= '




<tr>





<td align="center">

'.$no++.'

</td>








<td>

'.$p['nama_proyek'].'

</td>








<td>

'.$p['lokasi'].'

</td>








<td>

'.$p['client'].'

</td>








<td>

Rp '.

number_format(

$p['anggaran'],

0,

',',

'.'

)

.'

</td>









<td align="center">

'.$p['status'].'

</td>








<td align="center">

'.$p['progress'].'%

</td>







</tr>





';




}









$html .= '





</table>






<br><br><br>









<table width="100%">



<tr>





<td width="65%">





</td>







<td width="35%" align="center">





Pekanbaru, '.date('d-m-Y').'



<br><br><br><br>






<b>

Direktur

</b>





<br>





CV Duta Riau Konsultan





</td>





</tr>



</table>





';











// ==========================
// CETAK HTML KE PDF
// ==========================


$pdf->writeHTML(

    $html,

    true,

    false,

    true,

    false,

    ''

);








// ==========================
// OUTPUT PDF
// ==========================


$pdf->Output(

    'Laporan-Proyek.pdf',

    'I'

);



?>