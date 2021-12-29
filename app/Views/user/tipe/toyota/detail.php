<?= $this->extend('layouts/template') ;?>

<?= $this->section('content') ;?>
<main class="pt-20">
  <section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
    <div class="bg-white dark:bg-gray-800 lg:mx-10 lg:flex lg:w-full lg:shadow-lg lg:rounded-lg">

      <!-- SWIPER SLIDER -->
      <div class="swiper h-96 md:h-128 w-80 md:w-130">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <img class="h-80 bg-cover w-full lg:rounded-lg lg:h-full"
              src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['gambar']; ?>" alt="slide gambar">
          </div>
          <div class="swiper-slide">
            <img class="h-80 bg-cover w-full lg:rounded-lg lg:h-full"
              src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide']; ?>" alt="slide gambar">
          </div>
          <div class="swiper-slide">
            <img class="h-80 bg-cover w-full lg:rounded-lg lg:h-full"
              src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide2']; ?>" alt="slide gambar">
          </div>
          <div class="swiper-slide">
            <img class="h-80 bg-cover w-full lg:rounded-lg lg:h-full"
              src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide3']; ?>" alt="slide gambar">
          </div>
          <div class="swiper-slide">
            <img class="h-80 bg-cover w-full lg:rounded-lg lg:h-full"
              src="<?= base_url('asset/img/mobil/toyota'); ?>/<?= $toyota['slide4']; ?>" alt="slide gambar">
          </div>
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </div>

      <!-- CONTENT -->
      <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl"><?= $toyota['mobil']; ?></h2>
        <div class="mt-4 text-gray-600 dark:text-gray-200"><?= $toyota['deskripsi']; ?></div>

        <div class="mt-8">
          <a href="https://wa.me/6281211290066?text=Saya%20tertarik%20dengan%20mobil%20Anda%20yang%20dijual"
            class="flex gap-1 items-center max-w-max px-8 py-2 font-medium text-gray-100 transition-colors duration-200 transform bg-green-600 rounded-md hover:bg-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
              </path>
            </svg>
            Hubungi</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ;?>