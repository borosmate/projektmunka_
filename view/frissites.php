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

<style>
[x-cloak] {
    display: none;
}
</style>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 md:z-auto">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Frissités
            </h2>
        </div>
        <form class="mt-8 space-y-6" action="../controller/frissites.php" method="POST" id="frissites-form">
            <input type="hidden" value="<?=$felhasznal['id']?>" name="user_id">
            <?php
                //2. módszer a user_id átadaására
                $_SESSION['user_id'] = $felhasznal['id']
            ?>
            <input type="hidden" name="remember" value="true" class="form-input">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="" class="sr-only">Vezetéknév</label>
                    <input id="vezeteknev" name="vezeteknev" type="text" autocomplete="vezeteknev" 
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Vezetéknév" value="<?=$felhasznal['vezeteknev']?>">
                </div>

                <div>
                    <label for="" class="sr-only">Keresztnév</label>
                    <input id="keresztnev" name="keresztnev" type="text" autocomplete="keresztnev" 
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Keresztnév" value="<?=$felhasznal['keresztnev']?>">
                </div>

                <div>
                    <label for="email-address" class="sr-only">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" 
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Email" value="<?=$felhasznal['email']?>">
                </div>

                <div>
                    <label for="" class="sr-only">Születési idő</label>
                    <input id="szuletesi_ido" name="szuletesi_ido" type="date" autocomplete="szuletesi_ido" 
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Születési idő" value="<?=$felhasznal['szuletesi_ido']?>">
                </div>


                <div>
                    <label for="password" class="sr-only">Jelszó</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" 
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Jelszó">
                </div>

                <div>
                    <label for="password" class="sr-only">Jelszó megerősítés</label>
                    <input id="password_again" name="password_again" type="password" 
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Jelszó újra">
                </div>

                <div class="main flex border rounded-none overflow-hidden select-none border-gray-300 bg-white">

                    <label class="flex radio p-2 cursor-pointer">
                        <input class="my-auto transform scale-125" type="radio" name="neme" checked />
                        <div class="text-sm px-2 text-gray-500">Férfi</div>
                    </label>

                    <label class="flex radio p-2 cursor-pointer">
                        <input class="my-auto transform scale-125" type="radio" name="neme" />
                        <div class="text-sm px-2 text-gray-500">Nő</div>
                    </label>
                </div>

                <div>
                    <label for="" class="sr-only">Cél</label>
                    <textarea id="cel" name="cel" type="text"
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Cél" value="<?=$felhasznal['cel']?>"></textarea>
                </div>

                <div>
                    <label for="" class="sr-only">Profilkép</label>
                    <input type = "file" name= "profilkep" id="profilkep" class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"></input>
                </div>

            </div>
            <div>
                <button type="submit"
                    class="group relative border border-transparent text-sm font-medium rounded-md text-white py-2 px-4 w-full flex justify-center transition duration-500 ease-in-out bg-indigo-600 hover:bg-green-600 transform hover:-translate-y-1 hover:scale-110 ...">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: solid/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Frissités
                </button>
            </div>
        </form>
    </div>
</div>