
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
<table class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;" id="felhasznalok">
    <thead>
        <tr>
            <th data-priority="1">Név</th>
            <th data-priority="2">E-mail</th>
            <th data-priority="3">Születési idő</th>
            <th data-priority="4">Reg. dátuma</th>
            <th data-priority="5">Frissités</th>
            <th data-priority="6">Törlés</th>
        </tr>
    </thead>
    <tbody>


        <?php
$sql = "SELECT * FROM registration";
$result = $DB->query($sql);

while($adatok = $result->fetch_assoc()):


?>
        <tr class= "bg-gray-50 whitespace-nowrap">
            <td class="px-6 py-4 text-center"> <div class= "text-sm text-gray-900"><?=$adatok['vezeteknev']?> <?=$adatok['keresztnev']?></td></div>
            <td class="px-6 py-4 text-center"> <div class= "text-sm text-gray-900"><?=$adatok['email']?></td></div>
            <td class="px-6 py-4 text-center"> <div class= "text-sm text-gray-900"><?=$adatok['szuletesi_ido']?></td></div>
            <td class="px-6 py-4 text-center"> <div class= "text-sm text-gray-900"><?=$adatok['reg_ido']?></td></div>
            <td class="px-6 py-4 text-center"><a href="/?oldal=frissites&uid=<?=$adatok['id']?>" style="text-decoration:none" class=" py-2 px-4 shadow-md no-underline rounded-full bg-blue text-white font-sans font-semibold text-sm border-blue btn-primary hover:text-white hover:bg-blue-light focus:outline-none active:shadow-none mr-2">Frissités</a></td>
            <td class="px-6 py-4 text-center"><a href="../controller/torles.php?uid=<?=$adatok['id']?>" style="text-decoration:none" class="py-2 px-4 shadow-md no-underline rounded-full bg-red text-white font-sans font-semibold text-sm border-red btn-primary hover:text-white hover:bg-red-light focus:outline-none active:shadow-none">Törlés</a></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>
</div>
</div>
</body>
