<?php



    if(
        isset($_GET['uid']) &&
        is_numeric($_GET['uid']) //számkarakterek vizsg; és sqli védelem
    )
    {
        $sql = "SELECT * FROM registration WHERE id='{$_GET['uid']}'";
        $result = $DB->query($sql);

        if(!$result->num_rows)
            die("Felhasználó nem található!");

        $felhasznal = $result->fetch_assoc();
    }
    else
    {
        die( "Hibás paraméter" );
    }


?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
<div class="space-y-6">
  <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Személyes adatok</h3>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
      
        <form action="../controller/frissites.php" method="POST" id="frissites-form">
        <input type="hidden" value="<?=$felhasznal['id']?>" name="user_id">
        <?php
                //2. módszer a user_id átadaására
                $_SESSION['user_id'] = $felhasznal['id']
            ?>
          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
              <label for="vezeteknev" class="block text-sm font-medium text-gray-700">Vezetéknév</label>
              <input type="text" value="<?=$felhasznal['vezeteknev']?>" name="vezeteknev" id="vezeteknev" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="keresztnev" class="block text-sm font-medium text-gray-700">Keresztnév</label>
              <input type="text" value="<?=$felhasznal['keresztnev']?>" name="keresztnev" id="keresztnev" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email cím</label>
              <input type="text" value="<?=$felhasznal['email']?>" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="password" class="block text-sm font-medium text-gray-700">Jelszó</label>
              <input type="password" name="password" id="password" autocomplete="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="password" class="block text-sm font-medium text-gray-700">Jelszó megerősítés</label>
              <input type="password" name="password_again" id="password_again" autocomplete="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-4">
                    <label for="" class="block text-sm font-medium text-gray-700">Születési idő</label>
                    <input id="szuletesi_ido" name="szuletesi_ido" type="date" autocomplete="szuletesi_ido" 
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-auto shadow-sm sm:text-sm border-gray-300 rounded-md"
                        placeholder="Születési idő" value="<?=$felhasznal['szuletesi_ido']?>">
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="country" class="block text-sm font-medium text-gray-700">Ország</label>
              <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              <option value="HU">Magyarország</option>
              </select>
            </div>

            <div class="col-span-6">
              <label for="street-address" class="block text-sm font-medium text-gray-700">Utca / házszám</label>
              <input type="text"  value="<?=$felhasznal['cím']?>" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
              <label for="city" class="block text-sm font-medium text-gray-700">Város</label>
              <input type="text" value="<?=$felhasznal['city']?>" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
              <label for="state" class="block text-sm font-medium text-gray-700">Megye</label>
              <input type="text" value="<?=$felhasznal['megye']?>" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
              <label for="postal-code" class="block text-sm font-medium text-gray-700">Irányítószám</label>
              <input type="text" value="<?=$felhasznal['postal']?>" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>
        
      </div>
    </div>
  </div>



  <div class="flex justify-end">
    <a href="/index.php"><button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
      Mégse
    </button></a>
    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
      Mentés
    </button>
  </div>

  </form>
</div>
</div>