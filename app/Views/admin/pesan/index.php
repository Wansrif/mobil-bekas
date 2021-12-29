<?= $this->extend('layouts/template_admin') ;?>

<?= $this->section('content') ;?>

<main class="mt-20 dark:bg-gray-800 h-screen">
  <div class="p-5 space-y-5">
    <div class="px-4 py-2 flex items-center text-base rounded-full text-indigo-600 space-x-2 bg-indigo-200 ">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
      </svg>
      <span><?= $title; ?></span>
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
          <th>Nama</th>
          <th>Dikirim</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php $i= 1; ?>
        <?php foreach ($pesan as $item) : ?>
        <tr>
          <td class="text-center"><?= $i++; ?></td>
          <td><?= $item['nama']; ?></td>
          <td><?= $item['created_at']; ?></td>
          <td>
            <div class="flex justify-center items-center space-x-3">
              <a href="<?= base_url('admin/pesan'); ?>/<?= $item['slug']; ?>"
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