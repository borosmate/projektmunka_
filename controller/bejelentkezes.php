<?php
   require_once "/xampp/htdocs/settings/db.php";
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
    $email = $_POST["email"];
    $password = $_POST['password'];
    //$password = hash('sha512',$password);
    $password_hash = hash('sha512',$password);
      
      $sql = "SELECT id FROM registration WHERE email = '$email' and password = '$password_hash'";
      $result = mysqli_query($DB,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      printf($count);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         //$_SESSION['email'] = $email;
         
         $_SESSION['uzenet'] = "Sikeres bejelentkezés!";
         header("Location: /?oldal=home");
      }else {
        $_SESSION['error'] = "Helytelen bejelentkezési adatok!";
         header("Location: /?oldal=bejelentkezes");
      }
   }
?>