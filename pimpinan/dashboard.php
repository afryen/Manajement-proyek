<?php

include "../config/auth.php";

?>


<h1>
Dashboard Pimpinan
</h1>


<p>

Selamat datang

<?=

$_SESSION['user']['nama']

?>

</p>



Menu:

<ul>

<li>
Melihat Monitoring
</li>

<li>
Melihat Evaluasi
</li>

<li>
Melihat Laporan
</li>

</ul>


<a href="../logout.php">

Logout

</a>