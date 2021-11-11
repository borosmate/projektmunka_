<?php
session_start();
$host = "localhost";
$user = "test2";
$pass = "anyad0101";
$db   = "test2";

$salt = "fjlwelodga.ewrsdlfa.codsafs.ggregvcerrw34!!%";
$DB   = new mysqli($host,$user,$pass,$db) or die("SQL szerver kapcsolódási hiba!");

require_once 'auth.php';
?>