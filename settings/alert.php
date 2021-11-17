<?php
    



    if(isset($_GET['kilepes']))
    {   
        
        session_unset();
        $_SESSION['uzenet'] = "Sikeres kilépés!";
    }

    if(isset($_GET['alert']))
    {
        if($_GET['alert'] == 1){
        $_SESSION['error'] = "Kötelező mezők!";
        }

        if($_GET['alert'] == 2){
            $_SESSION['error'] = "Jelszavak nem egyeznek!";
            }

            if($_GET['alert'] == 3){
                $_SESSION['error'] = "Fogadd el az ÁSZF-t!";
                }  

                if($_GET['alert'] == 4){
                    $_SESSION['error'] = "Email használatban!";
                    }

                    if($_GET['alert'] == 5){
                        $_SESSION['uzenet'] = "Sikeres regisztracio";
                        }

                        if($_GET['alert'] == 'dberror'){
                            $_SESSION['error'] = $DB->error;
                            }

                            if($_GET['alert'] == 7){
                            $_SESSION['uzenet'] = "Sikeres belépés!";
                            }
                            if($_GET['alert'] == 8){
                                $_SESSION['error'] = "Sikertelen belépés!";
                                }
                                if($_GET['alert'] == 9){
                                    $_SESSION['uzenet'] = "Sikeres belépés!";
                                    }
                                    if($_GET['alert'] == 10){
                                        $_SESSION['uzenet'] = "Sikeres belépés!";
                                        }
                                        if($_GET['alert'] == 11){
                                            $_SESSION['uzenet'] = "Sikeres belépés!";
                                            }
                                            if($_GET['alert'] == 12){
                                                $_SESSION['uzenet'] = "Sikeres belépés!";
                                                }
                                                if($_GET['alert'] == 69){
                                                    $_SESSION['uzenet'] = "&#128527&#128527&#128527";
                                                    }
                                
                            

                            
    }
?>