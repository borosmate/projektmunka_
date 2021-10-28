<?php
require_once "/xampp/htdocs/settings/db.php";

$id = $_GET['uid'];

$del = mysqli_query($DB,"DELETE FROM registration WHERE id = '$id'");

if($del)
{
    mysqli_close($DB);
    header("Location: /index.php?oldal=felhasznalok");
    exit;
}
else
{
    echo "Error deleting record";
}

?>