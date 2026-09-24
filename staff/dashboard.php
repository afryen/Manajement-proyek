<?php

include "../config/auth.php";

?>


<h1>
Dashboard Staff Proyek
</h1>


<p>

Halo,

<?=

$_SESSION['user']['nama']

?>

</p>


<p>

Menu:

</p>


<ul>

<li>
Update Monitoring Proyek
</li>


<li>
Input Progress
</li>


<li>
Upload Dokumentasi
</li>


</ul>


<a href="../logout.php">

Logout

</a>