<!-- DESKTOP -->

<div x-show="sideOpen" @click.outside="sideOpen = false"
  class="fixed z-50 hidden md:inline-flex bg-indigo-500 dark:bg-gray-700 overflow-y-auto overscroll-y-auto"
  x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-full"
  x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"
  x-transition:leave-start="opacity-100 transform translate-x-0"
  x-transition:leave-end="opacity-0 transform -translate-x-full">
  <div class="flex flex-col sm:flex-row sm:justify-around">
    <div class="w-72 h-screen">
      <div class="flex items-center justify-start mx-6 mt-10">
        <img class="h-10" src="https://cdn-icons-png.flaticon.com/512/6270/6270078.png" />
        <span class="text-amber-400 dark:text-gray-300 ml-4 text-2xl font-bold font-viga">
          Administrator
        </span>
        <button class="text-amber-400 ml-3 border border-amber-400 rounded-lg" @click="sideOpen = false">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
          </svg>
        </button>
      </div>
      <nav class="mt-10 px-6">
        <a class="hover:text-amber-500 text-amber-400 hover:bg-indigo-600 dark:text-gray-400 flex items-center p-2 my-6 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start border-2 border-amber-400 rounded-md"
          href="<?= base_url('admin/dashboard'); ?>">
          <div class="dark:text-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z">
              </path>
            </svg>
          </div>
          <span class="mx-4 text-md font-normal">
            Dashboard
          </span>
        </a>

        <!-- MOBIL -->
        <div>
          <p class="text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal">
            MOBIL
          </p>
          <div x-data="{ open: false }" class="flex flex-col my-4">
            <button @click="open = ! open"
              class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md">
              <div class=" flex justify-between w-full">
                <div class="flex items-center">
                  <span class="text-left dark:text-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                      fill="currentColor">
                      <path
                        d="m20.772 10.156-1.368-4.105A2.995 2.995 0 0 0 16.559 4H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.105A2.003 2.003 0 0 0 2 12v5c0 .753.423 1.402 1.039 1.743-.013.066-.039.126-.039.195V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2h12v2a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2.062c0-.069-.026-.13-.039-.195A1.993 1.993 0 0 0 22 17v-5c0-.829-.508-1.541-1.228-1.844zM4 17v-5h16l.002 5H4zM7.441 6h9.117c.431 0 .813.274.949.684L18.613 10H5.387l1.105-3.316A1 1 0 0 1 7.441 6z">
                      </path>
                      <circle cx="6.5" cy="14.5" r="1.5"></circle>
                      <circle cx="17.5" cy="14.5" r="1.5"></circle>
                    </svg>
                  </span>
                  <span class="mx-4 text-md font-normal">
                    Mobil
                  </span>
                </div>
                <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </div>
            </button>

            <!-- Dropdown menu -->
            <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform scale-90"
              x-transition:enter-end="opacity-100 transform scale-100"
              x-transition:leave="transition ease-in duration-200"
              x-transition:leave-start="opacity-100 transform scale-100"
              x-transition:leave-end="opacity-0 transform scale-90"
              class="w-full py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800">
              <a href="<?= base_url('admin/hondaadmin'); ?>"
                class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                Honda </a>
              <a href="<?= base_url('admin/mitsubishiadmin'); ?>"
                class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                Mitsubishi </a>
              <a href="<?= base_url('admin/toyotaadmin'); ?>"
                class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                Toyota </a>
              <!-- <a href="#"
                class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                -- Not Available yet -- </a> -->
            </div>
          </div>
          <a class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 my-4 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md"
            href="<?= base_url('admin/penjualan'); ?>">
            <span class="text-left dark:text-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </span>
            <span class="mx-4 text-md font-normal">
              Penjualan
            </span>
          </a>

          <a class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 my-4 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md"
            href="<?= base_url('admin/kategori'); ?>">
            <span class="text-left dark:text-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
              </svg>
            </span>
            <span class="mx-4 text-md font-normal">
              Kategori
            </span>
          </a>
        </div>

        <!-- KOMUNIKASI -->
        <div>
          <p class="text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal">
            KOMUNIKASI
          </p>
          <a class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 my-4 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md"
            href="<?= base_url('admin/pesan'); ?>">
            <span class="text-left dark:text-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>
            </span>
            <span class="mx-4 text-md font-normal">
              Pesan
            </span>
          </a>
        </div>

        <!-- ADMIN -->
        <div>
          <p class="text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal">
            ADMIN
          </p>
          <a class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 my-4 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md"
            href="<?= base_url('logout'); ?>">
            <span class="text-left dark:text-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
            </span>
            <span class="mx-4 text-md font-normal">
              Logout
            </span>
          </a>
        </div>
      </nav>
    </div>
  </div>
</div>


<!-- MOBILE NAVIGATION-->

<div x-show="sideMobile" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50"
  x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-full"
  x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"
  x-transition:leave-start="opacity-100 transform translate-x-0"
  x-transition:leave-end="opacity-0 transform -translate-x-full">
  <div @click.outside="sideMobile = false" class="absolute z-50 md:hidden bg-indigo-500 dark:bg-gray-700">
    <div class="flex flex-col sm:flex-row sm:justify-around">
      <div class="w-72">
        <div class="flex items-center justify-start mx-6 mt-10">
          <img class="h-10" src="https://cdn-icons-png.flaticon.com/512/6270/6270078.png" />
          <span class="text-amber-400 dark:text-gray-300 ml-4 text-2xl font-bold font-viga">
            Administrator
          </span>
          <button class="text-amber-400 ml-3 border border-amber-400 rounded-lg" @click="sideMobile = false">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
          </button>
        </div>
        <nav class="mt-10 px-6 h-screen">
          <a class="hover:text-amber-500 text-amber-400 hover:bg-indigo-600 dark:text-gray-400 flex items-center p-2 my-6 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start border-2 border-amber-400 rounded-md"
            href="<?= base_url('admin/dashboard'); ?>">
            <div class="dark:text-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z">
                </path>
              </svg>
            </div>
            <span class="mx-4 text-md font-normal">
              Dashboard
            </span>
          </a>

          <!-- MOBIL -->
          <div>
            <p class="text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal">
              MOBIL
            </p>
            <div x-data="{ open: false }" class="flex flex-col my-4">
              <button @click="open = ! open"
                class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md">
                <div class=" flex justify-between w-full">
                  <div class="flex items-center">
                    <span class="text-left dark:text-indigo-500">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                          d="m20.772 10.156-1.368-4.105A2.995 2.995 0 0 0 16.559 4H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.105A2.003 2.003 0 0 0 2 12v5c0 .753.423 1.402 1.039 1.743-.013.066-.039.126-.039.195V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2h12v2a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2.062c0-.069-.026-.13-.039-.195A1.993 1.993 0 0 0 22 17v-5c0-.829-.508-1.541-1.228-1.844zM4 17v-5h16l.002 5H4zM7.441 6h9.117c.431 0 .813.274.949.684L18.613 10H5.387l1.105-3.316A1 1 0 0 1 7.441 6z">
                        </path>
                        <circle cx="6.5" cy="14.5" r="1.5"></circle>
                        <circle cx="17.5" cy="14.5" r="1.5"></circle>
                      </svg>
                    </span>
                    <span class="mx-4 text-md font-normal">
                      Mobil
                    </span>
                  </div>
                  <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </button>

              <!-- Dropdown menu -->
              <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="w-full py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800">
                <a href="<?= base_url('admin/hondaadmin'); ?>"
                  class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                  Honda </a>
                <a href="<?= base_url('admin/mitsubishiadmin'); ?>"
                  class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                  Mitsubishi </a>
                <a href="<?= base_url('admin/toyotaadmin'); ?>"
                  class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                  Toyota </a>
              </div>
            </div>
            <a class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 my-4 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md"
              href="<?= base_url('admin/penjualan'); ?>">
              <span class="text-left dark:text-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
              </span>
              <span class="mx-4 text-md font-normal">
                Penjualan
              </span>
            </a>
          </div>

          <!-- KOMUNIKASI -->
          <div>
            <p class="text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal">
              KOMUNIKASI
            </p>
            <a class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 my-4 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md"
              href="<?= base_url('admin/pesan'); ?>">
              <span class="text-left dark:text-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
              </span>
              <span class="mx-4 text-md font-normal">
                Pesan
              </span>
            </a>
          </div>

          <!-- ADMIN -->
          <div>
            <p class="text-gray-300 ml-2 w-full border-b-2 pb-2 border-gray-100 mb-4 text-md font-normal">
              ADMIN
            </p>
            <a class="hover:text-amber-500 font-thin text-amber-400 dark:text-gray-400 hover:bg-indigo-600 flex items-center p-2 my-4 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-500 justify-start rounded-md"
              href="<?= base_url('logout'); ?>">
              <span class="text-left dark:text-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
              </span>
              <span class="mx-4 text-md font-normal">
                Logout
              </span>
            </a>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>