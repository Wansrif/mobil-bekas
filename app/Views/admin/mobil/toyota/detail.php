<?= $this->extend('layouts/template_admin') ;?>

<?= $this->section('content') ;?>
<main class="mt-20 dark:bg-gray-800 h-screen">
  <div class="p-5 space-y-5">

    <div class="px-4 py-2 flex items-center text-base rounded-full text-indigo-600 space-x-2 bg-indigo-200 ">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="m20.772 10.156-1.368-4.105A2.995 2.995 0 0 0 16.559 4H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.105A2.003 2.003 0 0 0 2 12v5c0 .753.423 1.402 1.039 1.743-.013.066-.039.126-.039.195V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2h12v2a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2.062c0-.069-.026-.13-.039-.195A1.993 1.993 0 0 0 22 17v-5c0-.829-.508-1.541-1.228-1.844zM4 17v-5h16l.002 5H4zM7.441 6h9.117c.431 0 .813.274.949.684L18.613 10H5.387l1.105-3.316A1 1 0 0 1 7.441 6z">
        </path>
        <circle cx="6.5" cy="14.5" r="1.5"></circle>
        <circle cx="17.5" cy="14.5" r="1.5"></circle>
      </svg>
      <span><?= $title; ?></span>
    </div>

    <section class="flex space-x-4">
      <!-- EDIT -->
      <a href="<?= site_url('admin/toyotaadmin/edit'); ?>/<?= $toyota['slug']; ?>">
        <button
          class="flex items-center gap-1 bg-amber-400 p-2 rounded-md shadow-lg text-indigo-500 focus:ring-amber-500 focus:ring-offset-amber-200 transition ease-in duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
          Edit Data
        </button>
      </a>

      <!-- DELETE -->
      <div x-data="modal">
        <button @click="toggle"
          class="flex items-center gap-1 bg-rose-500 p-2 rounded-md shadow-lg text-white focus:ring-rose-500 focus:ring-offset-rose-200 transition ease-in duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
          Hapus Data
        </button>

        <!-- MODAL -->
        <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50"
          x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
          x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
          x-transition:leave-start="opacity-100 transform scale-100"
          x-transition:leave-end="opacity-0 transform scale-90">
          <div class="border-2 border-indigo-500 rounded-2xl p-4 bg-white dark:bg-gray-800 w-72 m-auto">
            <div class="w-full h-full text-center">
              <div class="flex h-full flex-col justify-between">
                <svg width="40" height="40" class="mt-4 w-12 h-12 m-auto text-indigo-500" fill="currentColor"
                  viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                  </path>
                </svg>
                <p class="text-gray-800 dark:text-gray-200 text-xl font-bold mt-4">
                  Hapus data
                </p>
                <p class="text-gray-600 dark:text-gray-400 text-xs py-2 px-6">
                  Apakah anda sudah yakin ?
                </p>
                <div class="grid grid-cols-2 items-center justify-between gap-4 w-full mt-8">
                  <button type="button" @click="toggle"
                    class="py-2 px-4 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-indigo-500 w-full transition ease-in duration-200 text-center text-base font-semibold border-2 border-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                    Batal
                  </button>
                  <form action="<?= base_url('admin/toyotaadmin'); ?>/<?= $toyota['id_toyota']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"
                      class="py-2 px-4  bg-rose-600 hover:bg-rose-700 focus:ring-rose-500 focus:ring-offset-rose-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                      Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
      <div class="bg-white dark:bg-gray-800 lg:mx-10 lg:flex lg:w-full lg:shadow-lg lg:rounded-lg">
        <div class="swiper h-96 md:h-128 w-80 md:w-130">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <img class="h-64 bg-cover w-full lg:rounded-lg lg:h-full"
                src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['gambar']; ?>" alt="slide gambar">
            </div>
            <div class="swiper-slide">
              <img class="h-64 bg-cover w-full lg:rounded-lg lg:h-full"
                src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide']; ?>" alt="slide gambar">
            </div>
            <div class="swiper-slide">
              <img class="h-64 bg-cover w-full lg:rounded-lg lg:h-full"
                src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide2']; ?>" alt="slide gambar">
            </div>
            <div class="swiper-slide">
              <img class="h-64 bg-cover w-full lg:rounded-lg lg:h-full"
                src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide3']; ?>" alt="slide gambar">
            </div>
            <div class="swiper-slide">
              <img class="h-64 bg-cover w-full lg:rounded-lg lg:h-full"
                src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide4']; ?>" alt="slide gambar">
            </div>
          </div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>

        <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
          <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl"><?= $toyota['mobil']; ?></h2>
          <div class="mt-4 text-gray-600 dark:text-gray-400"><?= $toyota['deskripsi']; ?></div>

          <div class="mt-8">
            <a href="#"
              class="px-5 py-2 font-medium text-gray-100 transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600">Hubungi
              sekarang</a>
          </div>
        </div>
      </div>
    </section>

  </div>
</main>
<?= $this->endSection() ;?>