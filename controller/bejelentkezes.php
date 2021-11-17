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
      $password = hash('sha512',$password);
      $sql = "SELECT * FROM registration WHERE password='{$password}' AND email='{$email}'";
      $query = $DB->query($sql);

      if($query->num_rows)
      {
         $_SESSION['email'] = $query->fetch_assoc();
         
         return header('Location: /index.php?alert=7');

      }
      else
      {
         
         return header('Location: /index.php?oldal=bejelentkezes&alert=8');
      }
   }
   else
   {
      $_SESSION['error'] = "Sikertelen belépés!";
      return header('Location: /index.php?oldal=bejelentkezes&alert=8');
   }
?>