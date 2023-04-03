<header class="fixed w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 z-40 print:hidden">
  <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
    <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
      <div class="container relative left-0 z-50 flex w-3/4 h-auto gap-4 items-center">

        <!-- DESKTOP Toggle -->
        <button @click="sideOpen = !sideOpen" class="hidden md:block text-indigo-500 dark:text-amber-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </button>

        <!-- MOBILE Toggle -->
        <button @click="sideMobile = !sideMobile" class="md:hidden text-indigo-500 dark:text-amber-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </button>

        <!-- Dark Mode Toggle -->
        <!-- <div class="dark-mode items-center md:block">
          <span>☀️</span>
          <div class="relative inline-block w-10 mr-2 align-middle select-none">
            <input type="checkbox" name="toggle" id="Indigo"
              class="checked:bg-gray-800 outline-none focus:outline-none right-4 checked:right-0 duration-200 ease-in absolute block w-6 h-6 rounded-full bg-indigo-500 border-4 appearance-none cursor-pointer"
              :value="darkMode" @change="darkMode = !darkMode" />
            <label for="Indigo" class="block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
            </label>
          </div>
          <span class="absolute -ml-1">🌙</span>
        </div> -->

      </div>

      <!-- PROFILE -->
      <div x-data="{open: false}"
        class="relative p-1 flex items-center justify-end w-1/4 ml-5 mr-4 sm:mr-0 sm:right-auto">
        <button @click="open = !open" @click.outside="open = false"
          class="block relative border-2 border-indigo-400 rounded-full">
          <img alt="profil" src="<?= base_url('asset/img/admin/default.svg'); ?>"
            class="mx-auto object-cover rounded-full h-10 w-10" />
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 transform scale-90"
          x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
          x-transition:leave-start="opacity-100 transform scale-100"
          x-transition:leave-end="opacity-0 transform scale-90"
          class="absolute flex items-center mt-24 z-30 w-32 px-2 py-2 bg-indigo-500 text-amber-400 hover:text-amber-500 dark:bg-gray-600 dark:text-white shadow-lg rounded-md duration-200 space-x-1">
          <a href="<?= base_url('logout'); ?>"
            class="flex text-sm justify-center mx-auto w-full px-3 py-1 hover:bg-indigo-600 dark:hover:bg-gray-500 duration-150 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"
              style="transform: scaleX(-1);">
              <path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path>
              <path
                d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z">
              </path>
            </svg>
            <span>Logout</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</header>