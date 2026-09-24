<?php

include_once "config/session.php";

?>


<!-- ==========================
     MOBILE OVERLAY
     TAMBAHAN RESPONSIVE HP
=========================== -->

<div class="sidebar-overlay" id="sidebarOverlay"></div>





<aside class="sidebar" id="sidebar">







<!-- ==========================
     LOGO PERUSAHAAN
=========================== -->


<div class="sidebar-brand">


    <div class="brand-logo">


        <img 

        src="assets/img/DRK LOGO.png"

        alt="Logo Duta Riau Konsultan">


    </div>





    <div class="brand-text">


        <h2>

            DUTA RIAU

        </h2>



        <span>

            KONSULTAN

        </span>


    </div>



</div>









<!-- ==========================
     USER LOGIN
=========================== -->


<div class="sidebar-user">



    <div class="user-avatar">


        <?= strtoupper(

            substr(
                $_SESSION['nama'],
                0,
                1
            )

        ); ?>


    </div>





    <div class="user-detail">


        <h4>


        <?= $_SESSION['nama']; ?>


        </h4>





        <p>


        <?= $_SESSION['role']; ?>


        </p>



    </div>




</div>









<!-- MENU TITLE -->


<div class="menu-title">

MENU UTAMA

</div>









<!-- MENU NAVIGASI -->


<nav class="sidebar-menu">








<a href="index.php">


<span class="menu-icon">

⌂

</span>


Dashboard


</a>









<a href="proyek.php">


<span class="menu-icon">

▣

</span>


Data Proyek


</a>









<a href="monitoring.php">


<span class="menu-icon">

◉

</span>


Monitoring


</a>









<a href="dokumentasi.php">


<span class="menu-icon">

▤

</span>


Dokumentasi


</a>









<a href="evaluasi.php">


<span class="menu-icon">

✓

</span>


Evaluasi


</a>









<a href="laporan.php">


<span class="menu-icon">

≡

</span>


Laporan


</a>













<div class="sidebar-line"></div>









<a href="logout.php"

class="logout-menu">


<span class="menu-icon">

↪

</span>


Logout


</a>







</nav>









</aside>







<!-- ==========================
     SCRIPT MOBILE SIDEBAR
     TAMBAHAN SAJA
=========================== -->


<script>


document.addEventListener(
"DOMContentLoaded",
function(){



    const menuButton = 
    document.getElementById(
        "menuToggle"
    );



    const sidebar =
    document.getElementById(
        "sidebar"
    );



    const overlay =
    document.getElementById(
        "sidebarOverlay"
    );




    if(menuButton && sidebar){



        menuButton.addEventListener(
        "click",
        function(){



            sidebar.classList.toggle(
                "active"
            );


            overlay.classList.toggle(
                "active"
            );


        });



    }






    if(overlay){



        overlay.addEventListener(
        "click",
        function(){



            sidebar.classList.remove(
                "active"
            );


            overlay.classList.remove(
                "active"
            );


        });



    }



});



</script>