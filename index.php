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

        <main>



            <?php
                if(isset($_SESSION['error'])):  ?>
            <div class="alert alert-danger">

                <?=$_SESSION['error']?> 
            </div>
            <?php unset($_SESSION['error']);
            endif?>
            <?php if(isset($_SESSION['uzenet'])):  ?>
            <div class="alert alert-success">

                <?=$_SESSION['uzenet']?>
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
                file_exists("view/". $_GET['event'] .".php"))
            {
                include "view/". $_GET['event'] .".php";
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