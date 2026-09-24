<?php

session_start();


// sementara matikan redirect login lama
// if(isset($_SESSION['login'])){
//     header("location:index.php");
//     exit;
// }

?>


<!DOCTYPE html>

<html lang="id">


<head>


<meta charset="UTF-8">


<title>
Login Sistem Manajemen Proyek
</title>



<link rel="stylesheet" href="assets/css/style.css">



</head>




<body class="login-body">






<div class="login-wrapper">





<div class="login-box">





<!-- LOGO -->

<div class="login-logo">


<img 

src="assets/img/DRK LOGO.png"

alt="Logo CV Duta Riau Konsultan">


</div>







<!-- JUDUL -->


<h1>

<span>

CV. DUTA RIAU

</span>

<br>

<span>

KONSULTAN

</span>


</h1>





<p>

Sistem Informasi

<br>

Manajemen Proyek Konstruksi

</p>








<form action="proses/proses_login.php" method="POST">





<label>

Email

</label>




<input 

type="email"

name="email"

placeholder="Masukkan Email"

required>








<label>

Password

</label>





<input 

type="password"

name="password"

placeholder="Masukkan Password"

required>









<button type="submit">

LOGIN

</button>






</form>







</div>





</div>





</body>


</html>