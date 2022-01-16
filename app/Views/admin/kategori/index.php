<?= $this->extend('layouts/template_admin') ;?>

<?= $this->section('content') ;?>

<main class="mt-20 dark:bg-gray-800 h-screen">
  <div class="p-5 space-y-5">
    <div class="px-4 py-2 flex items-center text-base rounded-full text-indigo-600 space-x-2 bg-indigo-200 ">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
      </svg>
      <span><?= $title; ?></span>
    </div>

    <!-- TAMBAH KATEGORI -->
    <div x-data="modal" id="modal">
      <button @click="toggle" type="button"
        class="py-2 px-4 max-w-xs bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
        Tambah Kategori
      </button>

      <!-- MODAL TAMBAH -->
      <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50" id="modal-tambah">
        <form action="<?= route_to('add.kategori'); ?>" method="POST" id="save-data"
          class="flex w-full mx-5 md:mx-0 max-w-sm space-x-3" autocomplete="off">
          <?= csrf_field(); ?>
          <div
            class="w-full max-w-2xl px-5 py-10 m-auto bg-white border-2 border-indigo-500 rounded-lg shadow dark:bg-gray-800">
            <div class="mb-6 text-3xl font-light text-center text-gray-800 dark:text-white">
              Tambah Kategori
            </div>
            <div class="grid max-w-xl grid-cols-2 gap-4 m-auto">
              <div class="col-span-2">
                <div class="relative">
                  <label for="kategori" class="dark:text-white kategori_label">Nama Kategori</label>
                  <input type="text"
                    class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    placeholder="Nama Kategori" name="kategori" />
                  <div class="text-rose-500 text-sm mt-1 error-text kategori_error"></div>
                </div>
              </div>
              <div class="col-span-2">
                <button type="submit"
                  class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                  Simpan
                </button>
              </div>
              <div class="col-span-2">
                <button id="cancel-tambah" @click="toggle" type="button"
                  class="py-2 px-4 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-indigo-500 w-full transition ease-in duration-200 text-center text-base font-semibold border-2 border-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- SEARCH -->
    <!-- <section class="relative w-full max-w-md mx-auto rounded-md">
      <form action="" method="post" autocomplete="off" id="search">
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
          <input
            class="placeholder:italic placeholder:text-gray-400 block w-full border border-gray-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-1 sm:text-sm"
            placeholder="Search kategori..." type="text" id="keyword" name="keyword" autocomplete="off" />
        </label>
        <button type="submit" name="submit" class="hidden" id="search"></button>
      </form>
    </section> -->

    <!-- TABEL KATEGORI -->
    <div class="source-data space-y-5">
      <div id="skeleton"
        class="hidden border border-indigo-300 dark:border-gray-600 shadow rounded-md p-4 w-full mx-auto dark:bg-gray-800">
        <div class="animate-pulse flex flex-col space-y-3">
          <div class="rounded-md bg-indigo-400 dark:bg-gray-600 h-12 w-full"></div>
          <div class="h-28 grid grid-cols-3 gap-4">
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
            <div class="rounded-md bg-indigo-400 dark:bg-gray-600"></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<script>
$(document).ready(function() {
  view()

  function view() {
    $.ajax({
      url: "<?= route_to('get.data'); ?>",
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      dataType: "json",
      beforeSend: function(res) {
        $("#skeleton").toggleClass("hidden")
      },
      success: function(res) {
        setTimeout(function() {
          $(".source-data").html(res)
        }, 1200)
      }
    })
  }

  var csrfName = '<?= csrf_token() ?>';
  var csrfHash = '<?= csrf_hash() ?>';

  // SAVE DATA
  $(document).on("submit", "#save-data", function(e) {
    e.preventDefault();
    var form = this;
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function() {
        $(form).find('div.error-text').text('');
      },
      success: function(data) {
        if ($.isEmptyObject(data.error)) {
          if (data.code == 1) {
            $(form)[0].reset();
            $("#cancel-tambah").click();
            Toast.fire({
              icon: 'success',
              title: '<div class="text-base font-semibold">' + data.msg + '</div>',
            })
            view()
          } else {
            alert(data.msg);
          }
        } else {
          $.each(data.error, function(prefix, val) {
            $(form).find('div.' + prefix + '_error').text(val);
          });
        }
      }
    });
  });


  // EDIT FORM
  $(document).on('click', '#edit-btn', function() {
    var id_kategori = $(this).data('id');
    $.post("<?= route_to('edit.kategori'); ?>", {
        id_kategori: id_kategori,
        [csrfName]: csrfHash
      },
      function(data) {
        // alert(data.results.nama_kategori);
        $('#modal-update' + data.results.kategori['id_kategori'] + '').find('form').find(
            'input[name="nama_kategori"]')
          .val(data.results.kategori['nama_kategori']);
        $('#modal-update' + data.results.kategori['id_kategori'] + '').find('form').find(
          'div.error-text"]').text('');
      }, 'json');
  });


  // UPDATE DATA
  $(document).on("submit", "#update-data", function(e) {
    e.preventDefault();
    var form = this;
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function() {
        $(form).find('div.error-text').text('');
      },
      success: function(data) {

        if ($.isEmptyObject(data.error)) {
          if (data.code == 1) {
            $("#cancel-update").click();
            Toast.fire({
              icon: 'success',
              title: '<div class="text-base font-semibold">' + data.msg + '</div>',
            })
            view()
          } else {
            alert(data.msg);
          }
        } else {
          $.each(data.error, function(prefix, val) {
            $(form).find('div.' + prefix + '_error').text(val);
          });
        }

      }
    });
  });


  // GET DELETE DATA
  $(document).on('click', '#del-btn', function() {
    var id_kategori = $(this).data('id');
    $.post("<?= route_to('get.delete'); ?>", {
        id_kategori: id_kategori,
        [csrfName]: csrfHash
      },
      function(data) {
        // alert(data.results.nama_kategori);
        $('#modal-delete' + data.results.kategori['id_kategori'] + '');
      }, 'json');
  });

  // DELETE DATA
  $(document).on("submit", "#delete-kategori", function(e) {
    e.preventDefault();
    var form = this;
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      success: function(data) {

        if (data.code == 1) {
          $("#cancel-delete").click();
          Toast.fire({
            icon: 'success',
            title: '<div class="text-base font-semibold">' + data.msg + '</div>',
          })
          view()
        } else {
          alert(data.msg);
        }

      }
    });
  });
});
</script>

<?= $this->endSection() ;?>