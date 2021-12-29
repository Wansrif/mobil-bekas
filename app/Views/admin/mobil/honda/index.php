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

    <!-- TAMBAH DATA -->
    <div class="w-full">
      <a href="<?= base_url('admin/hondaadmin/create'); ?>"
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
          <th>No.</th>
          <th>Gambar</th>
          <th>Nama Mobil</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php $i= 1; ?>
        <?php foreach ($honda as $item) : ?>
        <tr>
          <td class="text-center"><?= $i++; ?></td>
          <td class="flex justify-center">
            <img src="<?= base_url('asset/img/mobil/honda'); ?>/<?= $item['gambar']; ?>" alt="Mobil"
              class="h-36 w-36 rounded-lg">
          </td>
          <td><?= $item['mobil']; ?></td>
          <td>
            <div class="flex justify-center items-center space-x-3">
              <a href="<?= base_url('admin/hondaadmin'); ?>/<?= $item['slug']; ?>"
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
  $('#table_id').DataTable();
});
</script>
<?= $this->endSection() ;?>