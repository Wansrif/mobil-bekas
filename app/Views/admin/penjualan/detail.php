<?= $this->extend('layouts/template_admin') ;?>

<?= $this->section('content') ;?>
<main class="mt-20 dark:bg-gray-800 h-full">
  <div class="p-5 space-y-5">

    <div
      class="px-4 py-2 flex items-center text-base rounded-full text-indigo-600 space-x-2 bg-indigo-200 print:hidden">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="m20.772 10.156-1.368-4.105A2.995 2.995 0 0 0 16.559 4H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.105A2.003 2.003 0 0 0 2 12v5c0 .753.423 1.402 1.039 1.743-.013.066-.039.126-.039.195V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2h12v2a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2.062c0-.069-.026-.13-.039-.195A1.993 1.993 0 0 0 22 17v-5c0-.829-.508-1.541-1.228-1.844zM4 17v-5h16l.002 5H4zM7.441 6h9.117c.431 0 .813.274.949.684L18.613 10H5.387l1.105-3.316A1 1 0 0 1 7.441 6z">
        </path>
        <circle cx="6.5" cy="14.5" r="1.5"></circle>
        <circle cx="17.5" cy="14.5" r="1.5"></circle>
      </svg>
      <span><?= $title; ?></span>
    </div>

    <section class="flex space-x-4 print:hidden">
      <!-- EDIT -->
      <a href="<?= site_url('admin/penjualan/edit'); ?>/<?= $penjualan['slug']; ?>">
        <button
          class="flex gap-1 item-center bg-amber-400 p-2 rounded-md shadow-md text-indigo-500 capitalize focus:ring-amber-500 focus:ring-offset-amber-200 transition ease-in duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
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
          class="flex gap-1 item-center bg-rose-500 p-2 rounded-md shadow-md text-white capitalize focus:ring-rose-500 focus:ring-offset-rose-200 transition ease-in duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
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
                  <form action="<?= base_url('admin/penjualan'); ?>/<?= $penjualan['id_penjualan']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit"
                      class="py-2 px-4  bg-rose-600 hover:bg-rose-700 focus:ring-rose-500 focus:ring-offset-rose-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                      Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- PRINT -->
      <button id="print"
        class="flex gap-1 item-center bg-indigo-400 p-2 rounded-md shadow-md text-neutral-50 capitalize focus:ring-indigo-500 focus:ring-offset-indigo-200 transition ease-in duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current h-5 w-5" viewBox="0 0 24 24">
          <path
            d="M19 7h-1V2H6v5H5c-1.654 0-3 1.346-3 3v7c0 1.103.897 2 2 2h2v3h12v-3h2c1.103 0 2-.897 2-2v-7c0-1.654-1.346-3-3-3zM8 4h8v3H8V4zm8 16H8v-4h8v4zm4-3h-2v-3H6v3H4v-7c0-.551.449-1 1-1h14c.552 0 1 .449 1 1v7z">
          </path>
          <path d="M14 10h4v2h-4z"></path>
        </svg>
        Print
      </button>
      <script>
      $("#print").click(function() {
        window.print();
      });
      </script>
    </section>

    <section class="mx-auto w-full">
      <article class="text-center">
        <h1 class="text-center font-viga text-xl md:text-5xl print:text-3xl uppercase pb-2">Pafona
          Auto
        </h1>
        <div class="border-8 print:border-4 border-indigo-500 rounded-lg mb-5"></div>
        <div
          class="grid md:grid-cols-2 gap-3 divide-x-4 divide-none md:divide-solid divide-indigo-500 print:space-x-3 print:grid-cols-2">
          <img src="<?= base_url('asset/img/penjualan'); ?>/<?= $penjualan['gambar']; ?>"
            alt="<?= $penjualan['mobil']; ?>" class="w-full md:h-128 print:h-72 print:w-full rounded-lg">
          <div class="flex flex-col w-full">
            <div class="px-3 pb-3">
              <div class="text-lg lg:text-xl capitalize border-solid border-b-4 border-neutral-300">Laporan penjualan
                dealer mobil bekas
              </div>
            </div>
            <div class="pl-5">
              <table class="mt-2 text-medium text-left print:text-base">
                <tbody>
                  <tr>
                    <td>Mobil</td>
                    <td>: <?= $penjualan['mobil']; ?></td>
                  </tr>
                  <tr>
                    <td>Pembeli</td>
                    <td>: <?= $penjualan['pembeli']; ?></td>
                  </tr>
                  <tr>
                    <td>Kategori</td>
                    <td>: <?= $penjualan['nama_kategori']; ?></td>
                  </tr>
                  <tr>
                    <td>Whatsapp</td>
                    <td>: <?= $penjualan['whatsapp']; ?></td>
                  </tr>
                  <tr>
                    <td>Tgl Terjual</td>
                    <td>: <?= Date("d-M-Y", strtotime($penjualan['waktu'])) ?></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>: <?= $penjualan['harga']; ?></td>
                  </tr>
                </tbody>
              </table>
              <div class="text-left">
                Spesifikasi :
                <div><?= $penjualan['spesifikasi']; ?></div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5 border-8 print:border-4 border-indigo-500 rounded-lg mb-2"></div>
      </article>
      <footer class="text-gray-600 body-font print:w-full">
        <div class="container px-5 py-5 mx-auto flex items-center flex-col md:flex-row">
          <div class="flex font-medium items-center md:justify-start justify-center text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full print:hidden" viewBox="0 0 24 24">
              <path
                d="m20.772 10.156-1.368-4.105A2.995 2.995 0 0 0 16.559 4H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.105A2.003 2.003 0 0 0 2 12v5c0 .753.423 1.402 1.039 1.743-.013.066-.039.126-.039.195V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2h12v2a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2.062c0-.069-.026-.13-.039-.195A1.993 1.993 0 0 0 22 17v-5c0-.829-.508-1.541-1.228-1.844zM4 17v-5h16l.002 5H4zM7.441 6h9.117c.431 0 .813.274.949.684L18.613 10H5.387l1.105-3.316A1 1 0 0 1 7.441 6z">
              </path>
              <circle cx="6.5" cy="14.5" r="1.5"></circle>
              <circle cx="17.5" cy="14.5" r="1.5"></circle>
            </svg>
            <span class="ml-3 print:ml-0 text-xl uppercase print:hidden">Pafona Auto</span>
          </div>
          <p
            class="uppercase text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
            ©
            <?= date('Y'); ?> Pafona Auto —
            <a href="https://www.instagram.com/pafona_auto/" class="text-gray-600 ml-1 normal-case"
              rel="noopener noreferrer" target="_blank">@pafona_auto</a>
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <div class="flex items-center gap-1 ml-3 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
              @pafona_auto
            </div>
            <div class="flex items-center gap-1 ml-3 text-gray-500">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                </path>
              </svg>
              081210814800
            </div>
            <div class="flex items-center gap-1 ml-3 text-gray-500">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                </path>
              </svg>
              081211290066
            </div>
          </span>
        </div>
      </footer>
    </section>


  </div>
</main>

<?= $this->endSection() ;?>