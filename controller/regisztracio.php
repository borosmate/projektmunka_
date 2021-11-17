<?php

require_once "/xampp/htdocs/settings/db.php";

$vezeteknev = $_POST['vezeteknev'];
$keresztnev = $_POST['keresztnev'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_again = $_POST['password_again'];
$szuletesi_ido = $_POST['szuletesi_ido'];
$cel = $_POST['cel'];
$duplicate=mysqli_query($DB,"select * from registration where email='$email'");

if(isset($_POST['vezeteknev']))
{
    //kotelezo mezők ellenörzése

    if(
        empty($_POST['email']) || 
        empty($_POST['password'])  || 
        empty($_POST['password_again'])
        
    )
    {
        
       // $_SESSION['error'] = "Kötelező mezők!";
      return header('Location: /index.php?oldal=regisztracio&alert=1');  //vissza irányítás ha nem töltötte ki a regisztráló az adatokat
      // header('Location: ' .$SERVER['HTTP_REFERER']);
    }
    if($_POST['password'] != $_POST['password_again'])
    {
        
       return header('Location: /index.php?oldal=regisztracio&alert=2');
    }

    if(!isset($_POST['aszf']))
    {
        $_SESSION['error'] = "Fogadd el az ÁSZF-t!";
        return header('Location: /index.php?oldal=regisztracio&alert=3');
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
    $password = hash('sha512',$password);



    if(mysqli_num_rows($duplicate)>0)
    {
        
        return header('Location: /index.php?oldal=regisztracio&alert=4');
    }
    else
    {
        $sql = "INSERT INTO registration (vezeteknev, keresztnev, email, password, szuletesi_ido, cel) VALUE 
        ('{$vezeteknev}','{$keresztnev}','{$email}','{$password}','{$szuletesi_ido}','{$cel}')";
    }
    if($DB->query($sql))
    {
        $_SESSION['uzenet'] = "Sikeres regisztracio";
        header("Location: /?oldal=home&alert=5");
    }
    else
    {
        
        header('Location: ' . $_SERVER['HTTP_REFERER'.'&dberror']);
    }
}
