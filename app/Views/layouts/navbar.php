<nav x-cloak x-data="{navOpen : false}" class="fixed bg-indigo-500 shadow dark:bg-gray-900 z-30 w-full">
  <div class="container px-6 py-0 md:py-4 mx-auto md:flex md:justify-between md:items-center">
    <div class="flex items-center justify-between">
      <div>
        <a class="font-viga text-2xl font-bold text-amber-400 dark:text-amber-400 dark:hover:text-amber-500 lg:text-3xl uppercase duration-300"
          href="/">Pafona Auto</a>
      </div>

      <!-- Mobile Dark Mode Toggle -->
      <div class="dark-mode md:hidden">
        <div class="relative inline-block w-10 mr-2 align-middle select-none">
          <input type="checkbox" name="toggle" id="Indigo"
            class="checked:bg-gray-800 outline-none focus:outline-none right-4 checked:right-0 duration-200 ease-in absolute block w-6 h-6 rounded-full bg-indigo-500 border-4 appearance-none cursor-pointer"
            :value="darkMode" @change="darkMode = !darkMode" />
          <label for="Indigo" class="block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
          </label>
        </div>
      </div>

      <!-- Mobile menu button -->
      <div class="flex md:hidden">
        <button :class="navOpen ? 'hamburger--vortex is-active' : ''" @click="navOpen=!navOpen" class="hamburger"
          type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="navOpen" @click.outside="navOpen = false" x-transition:enter="duration-250 ease-out"
      x-transition:enter-start="opacity-0 -translate-y-8" x-transition:enter-end="opacity-100"
      x-transition:leave="duration-250 ease-in" x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0 -translate-y-8"
      class="absolute z-20 items-center bg-indigo-500 dark:bg-gray-800 w-full -mt-1 -ml-6 p-4 transition transform">
      <div class="flex flex-col md:flex-row md:mx-6 space-y-4 text-center">
        <a class="page-scroll my-1 text-base text-center font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500"
          <?= (current_url() == site_url('/')) ? 'href="#home"' : 'href="'.  site_url('/') . '"' ?>>Beranda</a>

        <div x-cloak x-data="{ open: false }" class="text-center">
          <button @click="open = ! open"
            class="my-1 text-base mx-auto font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500 flex items-center">Tipe
            <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
          </button>

          <!-- Dropdown Tipe -->
          <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="w-56 mx-auto py-2 mt-2 bg-white rounded-md dark:bg-gray-700">
            <a href="<?= base_url('honda'); ?>"
              class="block px-4 py-3 text-base text-gray-600 hover:text-amber-400 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-indigo-500 dark:hover:bg-gray-700 dark:hover:text-white">
              Honda </a>
            <a href="<?= base_url('mitsubishi'); ?>"
              class="block px-4 py-3 text-base text-gray-600 hover:text-amber-400 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-indigo-500 dark:hover:bg-gray-700 dark:hover:text-white">
              Mitsubishi </a>
            <a href="<?= base_url('toyota'); ?>"
              class="block px-4 py-3 text-base text-gray-600 hover:text-amber-400 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-indigo-500 dark:hover:bg-gray-700 dark:hover:text-white">
              Toyota </a>
          </div>
        </div>

        <a class="page-scroll my-1 text-base text-center font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500"
          <?= (current_url() == site_url('/')) ? 'href="#about"' : 'href="'.  base_url('#about') . '"' ?>>Tentang
          Kami</a>
        <a class="page-scroll my-1 text-base text-center font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500"
          <?= (current_url() == site_url('/')) ? 'href="#kontak"' : 'href="'.  base_url('#kontak') . '"' ?>>Kontak</a>
        <?php if(logged_in()) : ?>
        <a class="text-center font-semibold text-amber-400 uppercase dark:text-amber-400 border-2 border-amber-400 rounded-full py-1 px-6 md:px-3 hover:bg-indigo-600 duration-300"
          href="<?= base_url('admin/dashboard'); ?>">
          Dashboard
        </a>
        <?php else : ?>
        <a class="text-center font-semibold text-amber-400 uppercase dark:text-amber-400 border-2 border-amber-400 rounded-full py-1 px-6 md:px-3 hover:bg-indigo-600 duration-300"
          href="<?= base_url('login'); ?>">
          Login
        </a>
        <?php endif; ?>
      </div>
    </div>


    <!-- DESKTOP -->
    <div class="items-center hidden md:flex">
      <div class="flex flex-col md:flex-row md:mx-6">

        <!-- Dark Mode Toggle -->
        <div class="dark-mode md:block">
          <div class="relative inline-block w-10 mr-2 align-middle select-none">
            <input type="checkbox" name="toggle" id="Indigo"
              class="checked:bg-gray-800 outline-none focus:outline-none right-4 checked:right-0 duration-200 ease-in absolute block w-6 h-6 rounded-full bg-indigo-500 border-4 appearance-none cursor-pointer"
              :value="darkMode" @change="darkMode = !darkMode" />
            <label for="Indigo" class="block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
            </label>
          </div>
        </div>

        <a class="page-scroll my-1 text-base font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500 md:mx-4 md:my-0 duration-300"
          <?= (current_url() == site_url('/')) ? 'href="#home"' : 'href="'.  site_url('/') . '"' ?>>Beranda</a>

        <div x-cloak x-data="{ open: false }">
          <button @click="open = !open"
            class="my-1 text-base font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500 md:mx-4 md:my-0 flex items-center duration-300">Tipe
            <svg :class="open ? 'transform rotate-180' : ''" class="w-5 h-5 transition-transform"
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
          </button>

          <!-- Dropdown menu -->
          <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="absolute z-20 w-28 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-700">
            <a href="<?= base_url('honda'); ?>"
              class="block px-4 py-3 text-sm text-gray-600 hover:text-amber-400 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-indigo-500 dark:hover:text-white">
              Honda </a>
            <a href="<?= base_url('mitsubishi'); ?>"
              class="block px-4 py-3 text-sm text-gray-600 hover:text-amber-400 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-indigo-500 dark:hover:text-white">
              Mitsubishi </a>
            <a href="<?= base_url('toyota'); ?>"
              class="block px-4 py-3 text-sm text-gray-600 hover:text-amber-400 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-indigo-500 dark:hover:text-white">
              Toyota </a>
          </div>
        </div>

        <a class="page-scroll my-1 text-base font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500 md:mx-4 md:my-0 duration-300"
          <?= (current_url() == site_url('/')) ? 'href="#about"' : 'href="'.  base_url('#about') . '"' ?>>Tentang
          Kami</a>
        <a class="page-scroll my-1 text-base font-medium text-amber-400 dark:text-amber-400 dark:hover:text-amber-500 md:mx-4 md:my-0 duration-300"
          <?= (current_url() == site_url('/')) ? 'href="#kontak"' : 'href="'.  base_url('#kontak') . '"' ?>>Kontak</a>
      </div>

      <div class="flex justify-center md:block">
        <?php if(logged_in()) : ?>
        <a class="relative text-amber-400 font-semibold uppercase dark:text-amber-400 border-2 border-amber-400 rounded-full py-1 px-6 md:px-3 hover:bg-indigo-600 duration-300"
          href="<?= base_url('admin/dashboard'); ?>">
          Dashboard
        </a>
        <?php else : ?>
        <a class="relative text-amber-400 font-semibold uppercase dark:text-amber-400 border-2 border-amber-400 rounded-full py-1 px-6 md:px-3 hover:bg-indigo-600 duration-300"
          href="<?= base_url('login'); ?>">
          Login
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('open', () => ({
    open: false,

    toggle() {
      this.open = !this.open
    }
  }))
})
</script>