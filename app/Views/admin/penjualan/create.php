<?= $this->extend('layouts/template_admin') ;?>

<?= $this->section('content') ;?>
<main class="mt-20 dark:bg-gray-800 h-full">
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

    <form action="<?= base_url('admin/penjualan/save'); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <div class="relative space-y-2">

        <div class="grid gap-2 grid-cols-1 md:grid-cols-2 w-full">
          <!-- PEMBELI -->
          <div>
            <label for="pembeli" class="text-gray-700">
              Nama Pembeli
              <span class="text-red-500">
                <?= ($validation->hasError('pembeli')) ? '*' : '' ; ?>
              </span>
            </label>
            <input type="text" id="pembeli"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent <?= ($validation->hasError('pembeli')) ? 'border-rose-500' : '' ; ?> "
              name="pembeli" value="<?= old('pembeli'); ?>" />
            <div class="text-rose-500 text-xs pl-2">
              <?= $validation->getError('pembeli'); ?>
            </div>
          </div>

          <!-- NAMA MOBIL -->
          <div>
            <label for="mobil" class="text-gray-700">
              Nama Mobil
              <span class="text-red-500">
                <?= ($validation->hasError('mobil')) ? '*' : '' ; ?>
              </span>
            </label>
            <input type="text" id="mobil"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent <?= ($validation->hasError('mobil')) ? 'border-rose-500' : '' ; ?> "
              name="mobil" value="<?= old('mobil'); ?>" />
            <div class="text-rose-500 text-xs pl-2">
              <?= $validation->getError('mobil'); ?>
            </div>
          </div>
        </div>

        <!-- SPESIFIKASI -->
        <div>
          <label for="spesifikasi" class="text-gray-700">
            Spesifikasi
            <span class="text-red-500">
              <?= ($validation->hasError('spesifikasi')) ? '*' : '' ; ?>
            </span>
          </label>
          <textarea name="spesifikasi" id="editor"
            class="border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent <?= ($validation->hasError('spesifikasi')) ? 'border-rose-500' : '' ; ?>">
          <?= old('spesifikasi'); ?>
          </textarea>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('spesifikasi'); ?>
          </div>
        </div>

        <!-- GAMBAR -->
        <div>
          <label for="gambar" class="text-gray-700">
            Gambar
            <span class="text-red-500">
              <?= ($validation->hasError('gambar')) ? '*' : '' ; ?>
            </span>
          </label>
          <div class="flex-col">
            <div class="bg-gray-200 max-w-md h-40 rounded-lg flex items-center justify-center mb-2">
              <img src="<?= base_url('asset/img/penjualan/default.jpg'); ?>" id="preview" class="h-40 rounded-lg">
            </div>
            <input type="file" name="gambar" id="gambar"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
              onchange="previewImg()" />
          </div>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('gambar'); ?>
          </div>
        </div>

        <div class="grid space-y-2 md:space-y-0 md:space-x-2 grid-cols-1 md:grid-cols-2 w-full">
          <!-- KATEGORI -->
          <div class="flex flex-col">
            <label for="kategori" class="text-gray-700">
              Kategori
              <span class="text-red-500">
                <?= ($validation->hasError('kategori')) ? '*' : '' ; ?>
              </span>
            </label>
            <select name="kategori"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
              <option value="">-- Pilih Kategori Mobil --</option>
              <?php foreach($kategori as $val) : ?>
              <option value="<?= $val['nama_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
              <?php endforeach ?>
            </select>
            <div class="text-rose-500 text-xs pl-2">
              <?= $validation->getError('kategori'); ?>
            </div>
          </div>

          <!-- WATSAPP -->
          <div>
            <label for="whatsapp" class="text-gray-700">
              No. HP/Whatsapp
              <span class="text-red-500">
                <?= ($validation->hasError('whatsapp')) ? '*' : '' ; ?>
              </span>
            </label>
            <input type="text" id="whatsapp"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent <?= ($validation->hasError('watsapp')) ? 'border-rose-500' : '' ; ?>"
              name="whatsapp" value="<?= old('whatsapp'); ?>" placeholder="08xxxxxxxxxx" />
            <div class="text-rose-500 text-xs pl-2">
              <?= $validation->getError('whatsapp'); ?>
            </div>
          </div>
        </div>

        <div class="grid space-y-2 md:space-y-0 md:space-x-2 grid-cols-1 md:grid-cols-2 w-full">
          <!-- WAKTU -->
          <div>
            <label for="waktu" class="text-gray-700">
              Waktu
              <span class="text-red-500">
                <?= ($validation->hasError('waktu')) ? '*' : '' ; ?>
              </span>
            </label>
            <input type="date" id="waktu"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent <?= ($validation->hasError('waktu')) ? 'border-rose-500' : '' ; ?> "
              name="waktu" value="<?= old('waktu'); ?>" />
            <div class="text-rose-500 text-xs pl-2">
              <?= $validation->getError('waktu'); ?>
            </div>
          </div>

          <!-- HARGA -->
          <div>
            <label for="harga" class="text-gray-700">
              Harga
              <span class="text-red-500">
                <?= ($validation->hasError('harga')) ? '*' : '' ; ?>
              </span>
            </label>
            <input type="text" id="harga"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent <?= ($validation->hasError('harga')) ? 'border-rose-500' : '' ; ?> "
              name="harga" value="<?= old('harga'); ?>" placeholder="Rp.xxx.xxx.xxx" />
            <div class="text-rose-500 text-xs pl-2">
              <?= $validation->getError('harga'); ?>
            </div>
          </div>
        </div>

      </div>

      <button type="submit"
        class="py-2 px-20 w-full bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-medium shadow-md shadow-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg mt-4">Simpan</button>
    </form>

  </div>
</main>

<script>
function previewImg() {
  const gambar = document.querySelector('#gambar');
  const preview = document.querySelector('#preview');
  const filesampul = new FileReader();
  filesampul.readAsDataURL(gambar.files[0])
  filesampul.onload = function(e) {
    preview.src = e.target.result;
  }
}
</script>
<?= $this->endSection() ;?>