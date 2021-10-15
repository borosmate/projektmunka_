 <table>
     <thead>
<tr>
<th>Név</th>
<th>E-mail</th>
<th>Neme</th>
<th>Reg. dátuma</th>
</tr>
</thead>
<tfoot>
    <tr>
    <th>Név</th>
<th>E-mail</th>
<th>Neme</th>
<th>Reg. dátuma</th>  
    </tr>
</tfoot>
 <tbody>
<?php
require_once "/xampp/htdocs/settings/db.php";



$sql = "SELECT * FROM registration";
$result = $DB->query($sql);

while($adatok = $result->fetch_assoc()):


?>
    <tr>
        <td><?=$adatok['vezeteknev']?> <?=$adatok['keresztnev']?></td>
        <td><?=$adatok['email']?></td>
        <td><?=$adatok['szuletesi_ido']?></td>
        <td><?=$adatok['neme']?></td>
        <td><?=$adatok['cel']?></td>
        <td><?=$adatok['reg_ido']?></td>
    </tr>
<?php endwhile ?>
</tbody>
</table>  