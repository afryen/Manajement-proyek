<?php

include "config/session.php";

include "config/database.php";


?>



<!DOCTYPE html>

<html lang="id">



<head>


<meta charset="UTF-8">


<title>

Tambah Monitoring Proyek

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


PROJECT MONITORING


</span>





<h1>


Tambah Monitoring Proyek


</h1>





<p>


Masukkan perkembangan pekerjaan proyek.


</p>





</div>









<div class="form-card">





<form method="POST"

action="proses/simpan_monitoring.php">







<div class="form-group">





<label>


Jenis Proyek


</label>






<div class="input-box">





<select name="jenis_proyek" required>





<option value="">


Pilih Jenis Proyek


</option>






<option value="Drainase">


Drainase


</option>





<option value="Jalan">


Jalan


</option>





<option value="Jembatan">


Jembatan


</option>





<option value="Bangunan Gedung">


Bangunan Gedung


</option>





<option value="Irigasi">


Irigasi


</option>






</select>





</div>





</div>









<div class="form-row">





<div class="form-group">





<label>


Tanggal Monitoring


</label>





<input


type="date"


name="tanggal_monitoring"


required>



</div>









<div class="form-group">





<label>


Progress (%)


</label>





<input


type="number"


name="progress"


min="0"


max="100"


placeholder="Contoh 80"


required>





</div>






</div>









<div class="form-group">





<label>


Kendala


</label>






<textarea


name="kendala"


placeholder="Masukkan kendala pekerjaan"

required>

</textarea>





</div>









<div class="form-group">





<label>


Solusi


</label>






<textarea


name="solusi"


placeholder="Masukkan solusi penyelesaian"

required>

</textarea>





</div>









<div class="form-group">





<label>


Catatan


</label>






<textarea


name="catatan"


placeholder="Catatan monitoring"

required>

</textarea>





</div>









<button


type="submit"


class="btn-submit">





Simpan Monitoring





</button>







<a href="monitoring.php"

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