<?= $this->extend('layouts/template') ;?>

<?= $this->section('content') ;?>

<main>
  <div class="container mx-auto">

    <div class="w-full bg-center bg-cover h-128"
      style="background-image: url(https://images.unsplash.com/photo-1585503418537-88331351ad99?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80);">
      <div class="flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
        <div class="text-center">
          <h1 class="headline font-viga text-2xl font-semibold text-white uppercase lg:text-3xl">Beli mobil bekas
            terpercaya
            <span class="text-amber-500 text-shadow-lg underline uppercase">Pafona Auto</span>
          </h1>
          <button id="hub"
            class="w-44 px-4 py-2 mt-4 text-sm font-medium text-white uppercase transition-colors duration-200 transform bg-indigo-500 rounded-md lg:w-auto hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500">HUBUNGI
            SEGERA</button>
        </div>
      </div>
    </div>

    <!-- ABOUT -->
    <section id="about" class="bg-white dark:bg-gray-900 my-5">
      <div class="container px-5 py-8 mx-auto">
        <h1
          class="text-center sm:text-3xl text-2xl font-medium font-viga uppercase mb-12 text-gray-900 dark:text-white py-3 border-b-4 border-indigo-400 dark:border-white">
          About
        </h1>
        <p class="text-gray-900 dark:text-white text-center prose prose-sm sm:prose lg:prose-lg xl:prose-xl mx-auto">
          Pafona Auto merupakan sebuah dealer mobil bekas yang memberikan informasi dan penjualan mobil bekas yang
          berlokasi di Cimanggis, Depok. Pafona Auto hanya menjual tipe mobil <i>Fast Moving</i> (mobil yang cepat laku
          dan banyak
          peminatnya) seperti fortuner, honda jazz, yaris, brio, pajero, innova dan lainnya.
        </p>
      </div>
    </section>


    <!-- KONTAK -->
    <section id="kontak" class="text-gray-600 body-font relative mb-12 overflow-x-hidden">
      <div class="container px-5 py-8 mx-auto" data-aos="fade-left">
        <div class="flex flex-col text-center w-full mb-12">
          <h1
            class="sm:text-3xl text-2xl font-medium font-viga uppercase mb-12 text-gray-900 dark:text-white py-3 border-b-4 border-indigo-400 dark:border-white">
            Kontak</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base dark:text-gray-400">Jika ada informasi yang ingin
            diketahui lebih lanjut
            silahkan isi form di bawah ini atau hubungi nomor yang tertera.</p>
        </div>

        <div class="lg:w-1/2 md:w-2/3 mx-auto" data-aos="fade-right">
          <form action="<?= route_to('send.msg'); ?>" method="post" id="send-msg" class="flex flex-wrap -m-2">
            <?= csrf_field(); ?>
            <div class="p-2 w-full">
              <div class="relative">
                <label for="nama" class="leading-7 text-sm text-gray-600 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <div class="text-rose-500 text-sm mt-1 error-text nama_error"></div>
              </div>
            </div>
            <div class="p-2 w-full md:w-1/2">
              <div class="relative">
                <label for="whatsapp" class="leading-7 text-sm text-gray-600 dark:text-white">Whatsapp</label>
                <input type="text" id="whatsapp" name="whatsapp"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <div class="text-rose-500 text-sm mt-1 error-text whatsapp_error"></div>
              </div>
            </div>
            <div class="p-2 w-full md:w-1/2">
              <div class="relative">
                <label for="email" class="leading-7 text-sm text-gray-600 dark:text-white">Email</label>
                <input type="email" id="email" name="email"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <div class="text-rose-500 text-sm mt-1 error-text email_error"></div>
              </div>
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                <label for="pesan" class="leading-7 text-sm text-gray-600 dark:text-white">Pesan</label>
                <textarea id="pesan" name="pesan"
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                <div class="text-rose-500 text-sm mt-1 error-text pesan_error"></div>
              </div>
            </div>
            <div class="p-2 w-full">
              <button type="submit"
                class="flex items-center mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Kirim
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                  <path
                    d="M20 4H6c-1.103 0-2 .897-2 2v5h2V8l6.4 4.8a1.001 1.001 0 0 0 1.2 0L20 8v9h-8v2h8c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-7 6.75L6.666 6h12.668L13 10.75z">
                  </path>
                  <path d="M2 12h7v2H2zm2 3h6v2H4zm3 3h4v2H7z"></path>
                </svg>
              </button>
            </div>
          </form>
        </div>

      </div>
    </section>

  </div>
</main>

<?= script_tag('asset/js/script.js'); ?>
<?= script_tag('asset/js/jquery.easing.1.3.js'); ?>

<?= $this->endSection() ;?>