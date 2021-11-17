<?php
require_once "/xampp/htdocs/settings/db.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">    


    <!--link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css"-->
    <script>
        $(function(){
            $('#felhasznalok').DataTable(
                {
                    responsive: true
                }
            )
            .columns.adjust()
            .responsive.recalc();
        });
    </script>

   

</head>

<body>


    <div class="container-fluid">
    


        <?php 
        
        #asdsadasd#
        /* llsdskdsjdsd

        include Beemeli  |az adott állomány forrását. Hiba esetén warning hibát ad.
        include_once |Többszöri meghívásra is csak egyszer emeli be az állomány forrását.
        require Ugyan |az mint az include , hiba esetén fatal error.
        require_once | Ugyan az mint az include_once , csak fatal error-ral. 

        Hiba üzenetek : notice megjegyzés , leggyengébb hibaüzenet , ettől még fut az oldal.pl: Nem létező változó hivatkozás
                        warning: Oldal tovább működik , ezzel már foglalkozni kell!
                        fatal error végzetes hiba require hiba pl 
                        parse error végzetes hiba szintaxisban pl*/




        
        include_once "view/elements/menu.php";
        // "view/elements/toast.php";


        
        ?>
        <script>
            function removealert(){
                var url2 = window.location.href;
                let url = new URL(url2);
                console.log("URL: "+ url.toString());
 
                let params = new URLSearchParams(url.search);
                console.log("querys: " + params.toString());

                // Delete the printer  .
                params.delete('alert'); 

                //Query string is now gone
                console.log("Printer Removed: " + url.protocol + '//' + url.hostname + '/?' + params.toString()); 

                location.replace(url.protocol + '//' + url.hostname + '/?' + params.toString())


console.log("URL: "+ url.toString());
        }
        </script>
        <main>

        

            <?php
                if(isset($_SESSION['error'])):  ?>
                <div class="text-white px-6 py-1 border-0 rounded relative mb-4 bg-red-500">
  <span class="text-xl inline-block mr-5 align-middle">
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/tdrtiskw.json"
    trigger="loop"
    colors="primary:#ffffff,secondary:#ffffff"
    style="width:50px;height:50px">
</lord-icon>
  </span>
  <span class="inline-block align-middle mr-8">
    <b class="capitalize">Alert!</b> <?=$_SESSION['error']?>
  </span>
  <button onclick = "removealert()" class="align-middle absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-3 outline-none focus:outline-none">
    <span>×</span>
  </button>
               
                
                
            <?php unset($_SESSION['error']);
            endif?>
            </div>
            <?php if(isset($_SESSION['uzenet'])):  ?>
                <div class="text-white px-6 py-1 border-0 rounded relative mb-4 bg-green-500">
  <span class="text-xl inline-block mr-5 align-middle">
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/lupuorrc.json"
    trigger="loop"
    colors="primary:#ffffff,secondary:#ffffff"
    style="width:50px;height:50px">
</lord-icon>
  </span>
  <span class="inline-block align-middle mr-8">
    <b class="capitalize">Alert!</b> <?=$_SESSION['uzenet']?>
  </span>
  <button onclick= "removealert()" class=" absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-3 outline-none focus:outline-none">
    <span>×</span>
  </button>

                <?php unset($_SESSION['uzenet']);
                endif?>
            </div>

            <?php

            /* Változók:  $ jellel kezdődnek , a kis és nagy betű különbözik , számmal nem kezdődhet
            csak alulvonást tartalmazhat (_)
            Tömbök:  2 tipusa van a php-ben , sorszámozott , asszociatív(társításos tömb)  , az indexelésben különböznek
            sorszámozott: legelső index 0
            asszociatív: sorszám helyett szöveges indexek 
            szuper globális tömbök: $_GET , $_POST , $_COOKIE ,$_SESSION , $_SERVER
            GET: http protokoll metódusokon keresztül kommunikál lekérés
            POST() form adatok küldése esetén használjuk
            print_r fejlesztői segéd függvény , tömb tartalmnának a listázása
            <?php #print $_SESSION['error']; ?> phpba html
            */
            ?>
            <pre>
                <?php
                    print_r($_SESSION);
                   
                ?>
            </pre>

            <?php 
                ##print_r($_GET);

            ?>
            <!--<pre>
            <?php
                print_r($_GET)
                ?>
            </pre>
            -->
            <?php
                ##isset() változó , vagy tömb elem létezésének a vizsgálatát végzi boolean , true létezik , false nem létezik
               //empty() ha üres vagy null a változó tartalma akkor true , különben false
               //file_exists paraméternek megadott mappa vagy állomány létezését vizsgálja
               if(
                isset($_GET['event']) 
                &&
                !empty($_GET['event'])
                && 
                file_exists("settings/alert.php"))
            {
                include "settings/alert.php";
            }else
            {
                //include_once "view/home.php"; 
                
            } 
               
               
               if(
                    isset($_GET['oldal']) 
                    &&
                    !empty($_GET['oldal'])
                    && 
                    file_exists("view/". $_GET['oldal'] .".php"))
                {
                    include "view/". $_GET['oldal'] .".php";
                }else
                {
                    include_once "view/home.php"; 
                }


            ?>
        </main>

    </div>

</body>

</html>