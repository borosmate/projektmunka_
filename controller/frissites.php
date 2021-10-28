<?php
    //u.a. mint a reg csak nem insert hanem update sql


    //2 db SQL script 1. jelszoval (jelszo ellenorzese ismetlessel, hash előállítása), 2. jelszo nelkul

    //sqli és xss védése

    //UPDATE registration SET vezeteknev=$vezeteknev, ... WHERE id=$uid 




require_once "/xampp/htdocs/settings/db.php";

$vezeteknev = $_POST['vezeteknev'];
$keresztnev = $_POST['keresztnev'];
$email = $_POST['email'];
$szuletesi_ido = $_POST['szuletesi_ido'];
$cel = $_POST['cel'];

if(isset($_POST['vezeteknev']))
{
    //kotelezo mezők ellenörzése

    if(
        empty($_POST['email']) 
        
    )
    {
        $_SESSION['error'] = "Kötelező mezők!";
      return header("Location: " . $_SERVER['HTTP_REFERER']);  //vissza irányítás ha nem töltötte ki a regisztráló az adatokat
      // header('Location: ' .$SERVER['HTTP_REFERER']);
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
    #jelszavak ellenorzese
    if(!empty($_POST['password']) && $_POST['password_again'])
    {
        if($_POST['password'] != $_POST['password_again'])
        {
            $_SESSION['error'] = "Jelszavak nem egyeznek!";
           return header('Location: /index.php?oldal=regisztracio');
        }
        $password = hash('sha512',$password);
        $sql = "UPDATE registration SET vezeteknev ='{$vezeteknev}', keresztnev ='{$keresztnev}', email ='{$email}', password ='{$password}', szuletesi_ido ='{$szuletesi_ido}', cel ='{$cel}' 
        WHERE id ='{$_SESSION['user_id']}'";
    }
    else
    {
        $sql = "UPDATE registration SET vezeteknev ='{$vezeteknev}', keresztnev ='{$keresztnev}', email ='{$email}', szuletesi_ido ='{$szuletesi_ido}', cel ='{$cel}'
        WHERE id ='{$_SESSION['user_id']}'";
    }

    //$password = hash('sha512',$password . $salt);
    //$password = hash('sha512',$password);
    



    if($DB->query($sql))
    {
        $_SESSION['uzenet'] = "Sikeres módosítás!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $_SESSION['error'] = $DB->error;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

?>