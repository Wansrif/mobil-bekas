<?= $this->extend('layouts/template') ;?>

<?= $this->section('content') ;?>
<main class="pt-20">
  <div class="container mx-auto">
    <h1 class="font-viga uppercase text-2xl md:text-3xl text-center dark:text-white">Mitsubishi</h1>

    <!-- SEARCH -->
    <section class="relative w-72 md:w-full max-w-md mx-auto mt-6 rounded-md">
      <form action="" method="post" autocomplete="off">
        <?= csrf_field(); ?>
        <label class="relative block">
          <span class="sr-only">Search</span>
          <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
              <path
                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
          <input type="text" name="keyword"
            class="placeholder:italic placeholder:text-gray-400 block w-full border border-gray-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-indigo-500 dark:focus:border-amber-500 focus:ring-indigo-500 dark:focus:ring-amber-500 focus:ring-1 sm:text-sm"
            placeholder="Cari mobil..." />
        </label>
        <button class="hidden" type="submit" name="submit">Cari</button>
      </form>
    </section>

    <!-- CONTENT -->
    <?php if (empty($mitsubishi)) : ?>
    <div
      class="grid gap-x-3 gap-y-6 lg:gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 justify-center py-14 px-0 lg:px-16">
      <div class="overflow-hidden shadow-lg rounded-lg h-90 w-72 md:w-80 cursor-pointer m-auto">
        <a href="#" class="w-full block h-full">
          <img alt="Logo Mitsubishi" src="<?= base_url('asset/img/mobil/mitsubishi/defaultmitsubishi.jpg'); ?>"
            class="max-h-40 w-full object-cover" />
          <div class="bg-white dark:bg-gray-800 w-full p-4">
            <p class="text-indigo-500 text-md font-medium">
              Mitsubishi
            </p>
            <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
              Segera
            </p>
            <p class="text-gray-400 dark:text-gray-300 font-light text-sm">
              Segera
            </p>
          </div>
        </a>
      </div>
    </div>
    <?php endif ?>

    <div
      class="grid gap-x-3 gap-y-6 lg:gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 justify-center py-14 px-0 lg:px-16">
      <?php
      use CodeIgniter\I18n\Time;
      foreach ($mitsubishi as $item) : ?>
      <div class="overflow-hidden shadow-lg rounded-lg h-90 w-72 md:w-80 cursor-pointer m-auto">
        <a href="<?= base_url('mitsubishi'); ?>/<?= $item['slug']; ?>" class="w-full block h-full">
          <img alt="<?= $item['mobil']; ?>" src="<?= base_url('asset/img/mobil/mitsubishi'); ?>/<?= $item['gambar']; ?>"
            class="max-h-40 w-full object-cover" />
          <div class="bg-white dark:bg-gray-800 w-full p-4">
            <p class="text-indigo-500 text-md font-medium">
              Mitsubishi
            </p>
            <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
              <?= $item['mobil']; ?>
            </p>
            <p class="text-gray-400 dark:text-gray-300 font-light text-sm">
              Dipost
              <?php 
                $time = Time::parse($item['created_at']);
                echo $time->humanize();
            ?>
            </p>
          </div>
        </a>
      </div>
      <?php endforeach ?>
    </div>

    <!-- PAGINATION -->
    <?= $pager->links('mitsubishi', 'custom_pagination') ?>
  </div>
</main>

<?= $this->endSection() ;?>