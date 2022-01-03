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
    <div class="w-full flex gap-2 flex-col md:flex-row items-center justify-start md:justify-between">
      <a href="<?= base_url('admin/penjualan/create'); ?>"
        class="py-2 px-20 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">Tambah
        Data
      </a>
      <div class="flex gap-2">
        <a href="<?= site_url('/penjualan/excel'); ?>"
          class="flex items-center py-2 px-6 hover:bg-green-600 border-2 border-green-600 focus:ring-green-600 focus:ring-offset-green-200 text-green-600 hover:text-white transition ease-in duration-300 text-center text-base font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"><svg
            xmlns="http://www.w3.org/2000/svg" class="fill-current h-6 w-6" viewBox="0 0 24 24">
            <path
              d="M18 22a2 2 0 0 0 2-2v-5l-5 4v-3H8v-2h7v-3l5 4V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12zM13 4l5 5h-5V4z">
            </path>
          </svg>Excel
        </a>
        <a href="<?= site_url('/penjualan/pdf'); ?>"
          class="flex items-center py-2 px-6 hover:bg-rose-600 border-2 border-rose-600 focus:ring-rose-500 focus:ring-offset-rose-200 text-rose-500 hover:text-white transition ease-in duration-300 text-center text-base font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"><svg
            xmlns="http://www.w3.org/2000/svg" class="fill-current h-6 w-6" viewBox="0 0 24 24">
            <path
              d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z">
            </path>
            <path
              d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74zM14 9h-1V4l5 5h-4z">
            </path>
          </svg>PDF</a>
      </div>
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
    <table id="table_id" class="hover row-border mt-10">
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