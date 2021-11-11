<?php
   require_once "/xampp/htdocs/settings/db.php";


   if(
      isset($_POST['email']) &&
      !empty($_POST['email'])&&
      !empty($_POST['password'])
   )
   {
      foreach($_POST as $kulcs=>$adat)
      {
         $$kulcs = $DB->real_escape_string($adat);
      }
      $password = hash('sha512',$password . $salt);
      $sql = "SELECT * FROM registration WHERE password='{$password}' AND email='{$email}'";
      $query = $DB->query($sql);

      if($query->num_rows)
      {

      }
      else
      {
         $_SESSION['error'] = "Sikertelen belépés!";
         return header('Location: /index.php?oldal=bejelentkezes');
      }
   }
?>