<?php

include_once "config/session.php";

?>


<div class="topbar">



    <!-- ==========================
         BUTTON MENU MOBILE
         TAMBAHAN RESPONSIVE HP
    =========================== -->


    <button 
        class="menu-toggle" 
        id="menuToggle"
        type="button"
    >

        ☰

    </button>







    <!-- ==========================
         BRAND SISTEM + LOGO
    =========================== -->


    <div class="topbar-brand">


        <div class="brand-logo">


            <img 

            src="assets/img/DRK LOGO.png"

            alt="Logo Perusahaan">


        </div>





        <div class="topbar-title">


            <span>

                DUTA RIAU KONSULTAN

            </span>



            <h2>

                Manajemen Proyek Konstruksi

            </h2>



        </div>



    </div>









    <!-- ==========================
         USER LOGIN
    =========================== -->


    <div class="topbar-right">





        <div class="profile-box">





            <div class="profile-text">



                <b>

                    <?php

                    if(isset($_SESSION['nama'])){

                        echo $_SESSION['nama'];

                    }

                    else{

                        echo "Direktur";

                    }


                    ?>

                </b>





                <small>


                    <?php


                    if(isset($_SESSION['role'])){


                        echo $_SESSION['role'];


                    }

                    else{


                        echo "Pimpinan";


                    }


                    ?>


                </small>



            </div>





        </div>





    </div>







</div>








<!-- ==========================
     SCRIPT MENU MOBILE
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
    document.querySelector(
        ".sidebar"
    );



    if(menuButton && sidebar){



        menuButton.addEventListener(
        "click",
        function(){



            sidebar.classList.toggle(
                "active"
            );



        });



    }



});



</script>