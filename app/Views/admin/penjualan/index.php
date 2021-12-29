<?= $this->extend('layouts/template_admin') ;?>

<?= $this->section('content') ;?>

<main class="mt-20 dark:bg-gray-800 h-screen">
  <div class="p-5 space-y-5">
    <div class="px-4 py-2 flex items-center text-base rounded-full text-indigo-600 space-x-2 bg-indigo-200 ">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
      </svg>
      <span><?= $title; ?></span>
    </div>

    <!-- TAMBAH DATA -->
    <div class="w-full">
      <a href="<?= base_url('admin/penjualan/create'); ?>"
        class="py-2 px-20 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">Tambah
        Data
      </a>
    </div>

    <!-- NOTIFICATION -->
    <?php if (session()->getFlashdata('pesan')) : ?>
    <div id="alert" class="w-full text-white bg-green-500">
      <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <div class="flex">
          <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
            <path
              d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
            </path>
          </svg>
          <p class="mx-3"><?= session()->getFlashdata('pesan'); ?></p>
        </div>

        <button id="btn-alert"
          class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </div>
    </div>
    <script>
    $('#btn-alert').click(function() {
      $('#alert').toggleClass('hidden');
    })
    </script>
    <?php endif ?>

    <!-- TABEL -->
    <table id="table_id" class="hover row-border">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Nama Mobil</th>
          <th>Kategori</th>
          <th>Terjual</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($penjualan as $item) : ?>
        <tr>
          <td class="flex justify-center">
            <img src="<?= base_url('asset/img/penjualan'); ?>/<?= $item['gambar']; ?>" alt="Mobil"
              class="h-36 w-36 rounded-lg">
          </td>
          <td><?= $item['mobil']; ?></td>
          <td><?= $item['nama_kategori']; ?></td>
          <td><?= Date("d-M-Y", strtotime($item['waktu'])); ?></td>
          <td>
            <div class="flex justify-center items-center space-x-3">
              <a href="<?= base_url('admin/penjualan'); ?>/<?= $item['slug']; ?>"
                class="focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 bg-indigo-500 transition ease-in duration-200 p-2 rounded-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>

<script>
$(document).ready(function() {
  $('#table_id').DataTable({
    columnDefs: [{
      orderable: false,
      targets: [0, 3, 4]
    }]
  });
});
</script>

<?= $this->endSection() ;?>