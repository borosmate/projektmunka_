<?php

require_once "/xampp/htdocs/settings/db.php";

$vezeteknev = $_POST['vezeteknev'];
$keresztnev = $_POST['keresztnev'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_again = $_POST['password_again'];
$szuletesi_ido = $_POST['szuletesi_ido'];
$cel = $_POST['cel'];

if(isset($_POST['vezeteknev']))
{
    //kotelezo mezők ellenörzése

    if(
        empty($_POST['email']) || 
        empty($_POST['password'])  || 
        empty($_POST['password_again'])
        
    )
    {
        $_SESSION['error'] = "Kötelező mezők!";
      return header('Location: /index.php?oldal=regisztracio');  //vissza irányítás ha nem töltötte ki a regisztráló az adatokat
      // header('Location: ' .$SERVER['HTTP_REFERER']);
    }
    if($_POST['password'] != $_POST['password_again'])
    {
        $_SESSION['error'] = "Jelszavak nem egyeznek!";
       return header('Location: /index.php?oldal=regisztracio');
    }

    if(!isset($_POST['aszf']))
    {
        $_SESSION['error'] = "Fogadd el az ÁSZF-t!";
        return header('Location: /index.php?oldal=regisztracio');
    }

    //sql injekció xss támadás védése
 //foreach tömbök bejárása fort ne használjuk
 // foreach($array as $index => $value)(
   // $index , $value
 //)
    foreach($_POST as $kulcs=>$ertek){
        //real_escape_string SQL inj ellen ('-> \',' "->\")
        //htmlspecialchars XSS ellen véd  (<-> &lt: > -> &gt)

        // dinamikus változó létrehozás: $$
        $$kulcs = htmlspecialchars($DB->real_escape_string($ertek));

    }
    //$password = hash('sha512',$password . $salt);
    //$password = hash('sha512',$password);
    $password_hash = hash('sha512',$password);

    $sql = "INSERT INTO registration (vezeteknev, keresztnev, email, password, szuletesi_ido, cel) VALUE 
    ('{$vezeteknev}','{$keresztnev}','{$email}','{$password_hash}','{$szuletesi_ido}','{$cel}')";


    if($DB->query($sql))
    {
        $_SESSION['uzenet'] = "Sikeres regisztracio";
        header("Location: /?oldal=home");
    }
    else
    {
        $_SESSION['error'] = $DB->error;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
