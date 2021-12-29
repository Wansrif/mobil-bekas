<?= $this->extend('layouts/template_admin') ;?>

<?= $this->section('content') ;?>
<main class="mt-20 dark:bg-gray-800 h-screen">
  <div class="p-5">
    <div class="px-4 py-2 flex items-center text-base rounded-full text-indigo-600 space-x-2 bg-indigo-200 ">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #6946E5;">
        <path
          d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z">
        </path>
      </svg>
      <span><?= $title; ?></span>
    </div>
    <div class="my-5 grid grid-cols-1 md:grid-cols-4 gap-5">
      <div
        class="p-3 h-24 text-amber-400 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg shadow-md shadow-blue-400 cursor-default">
        <div class="text-xl">Honda</div>
        <div class="text-base"><?= ($honda > 0) ? $honda : '0' ?></div>
      </div>
      <div
        class="p-3 h-24 text-amber-400 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg shadow-md shadow-blue-400 cursor-default">
        <div class="text-xl">Mitsubishi</div>
        <div class="text-base"><?= ($mitsubishi > 0) ? $mitsubishi : '0' ?></div>
      </div>
      <div
        class="p-3 h-24 text-amber-400 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg shadow-md shadow-blue-400 cursor-default">
        <div class="text-xl">Toyota</div>
        <div class="text-base"><?= ($toyota > 0) ? $toyota : '0' ?></div>
      </div>
      <div
        class="p-3 h-24 text-amber-400 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg shadow-md shadow-blue-400 cursor-default">
        <div class="text-xl">Penjualan</div>
        <div class="text-base"><?= ($penjualan > 0) ? $penjualan : '0' ?></div>
      </div>
      <div
        class="p-3 h-24 text-amber-400 bg-gradient-to-br from-indigo-500 to-blue-400 rounded-lg shadow-md shadow-blue-400 cursor-default">
        <div class="text-xl">Pesan</div>
        <div class="text-base"><?= ($pesan > 0) ? $pesan : '0' ?></div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection() ;?>