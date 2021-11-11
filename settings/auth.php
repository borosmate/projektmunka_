<?php
    if(isset($_GET['kilepes']))
    {
        unset($_SESSION['email']);
        $_SESSION['uzenet'] = "Sikeres kilépés!";
    }
?>