<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->

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
                Regisztráció
            </h2>
        </div>
        <form class="mt-8 space-y-6" action="../controller/regisztracio.php" method="POST" id="regisztracios-form">
            <input type="hidden" name="remember" value="true" class="form-input">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="" class="sr-only">Vezetéknév</label>
                    <input id="vezeteknev" name="vezeteknev" type="text" autocomplete="vezeteknev" required
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Vezetéknév">
                </div>

                <div>
                    <label for="" class="sr-only">Keresztnév</label>
                    <input id="keresztnev" name="keresztnev" type="text" autocomplete="keresztnev" required
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Keresztnév">
                </div>

                <div>
                    <label for="email-address" class="sr-only">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Email">
                </div>

                <div>
                    <label for="" class="sr-only">Születési idő</label>
                    <input id="szuletesi_ido" name="szuletesi_ido" type="date" autocomplete="szuletesi_ido" required
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Születési idő">
                </div>


                <div>
                    <label for="password" class="sr-only">Jelszó</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="form-input appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Jelszó">
                </div>

                <div>
                    <label for="password" class="sr-only">Jelszó megerősítés</label>
                    <input id="password_again" name="password_again" type="password" required
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
                        placeholder="Cél"></textarea>
                </div>
            </div>



            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="aszf" name="aszf" type="checkbox"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="aszf" class="ml-2 block text-sm text-gray-900">
                        Elfogadod az ÁSZF-t?
                    </label>
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
                    Regisztráció
                </button>
            </div>
        </form>
    </div>
</div>