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

    <form action="<?= base_url('admin/hondaadmin/update'); ?>/<?= $honda['id_honda']; ?>" method="post"
      enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <input type="hidden" name="slug" value="<?= $honda['slug']; ?>">
      <input type="hidden" name="gambarLama" value="<?= $honda['gambar']; ?>">
      <input type="hidden" name="slideLama" value="<?= $honda['slide']; ?>">
      <input type="hidden" name="slideLama2" value="<?= $honda['slide2']; ?>">
      <input type="hidden" name="slideLama3" value="<?= $honda['slide3']; ?>">
      <input type="hidden" name="slideLama4" value="<?= $honda['slide4']; ?>">
      <div class="relative space-y-2">
        <div>
          <label for="nama" class="text-gray-700">
            Nama Mobil
            <span class="text-red-500">
              <?= ($validation->hasError('mobil')) ? '*' : '' ; ?>
            </span>
          </label>
          <input type="text" id="nama"
            class=" rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent <?= ($validation->hasError('mobil')) ? 'border-rose-500' : '' ; ?>"
            name="mobil" value="<?= (old('mobil')) ? old('mobil') : $honda['mobil'] ?>" />
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('mobil'); ?>
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
              <img src="<?= base_url('asset/img/mobil/honda'); ?>/<?= $honda['gambar']; ?>" id="preview"
                class="h-40 rounded-lg">
            </div>
            <input type="file" name="gambar" id="gambar"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
              onchange="previewImg()" />
          </div>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('gambar'); ?>
          </div>
        </div>

        <!-- SLIDE 1 -->
        <div>
          <label for="slide" class="text-gray-700">
            Slide 1
            <span class="text-red-500">
              <?= ($validation->hasError('slide')) ? '*' : '' ; ?>
            </span>
          </label>
          <div class="flex-col">
            <div class="bg-gray-200 max-w-md h-40 rounded-lg flex items-center justify-center mb-2">
              <img src="<?= base_url('asset/img/mobil/honda'); ?>/<?= $honda['slide']; ?>" id="preview1"
                class="h-40 rounded-lg">
            </div>
            <input type="file" id="slide"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
              name="slide" onchange="previewImg1()" />
          </div>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('slide'); ?>
          </div>
        </div>

        <!-- SLIDE 2 -->
        <div>
          <label for="slide2" class="text-gray-700">
            Slide 2
            <span class="text-red-500">
              <?= ($validation->hasError('slide2')) ? '*' : '' ; ?>
            </span>
          </label>
          <div class="flex-col">
            <div class="bg-gray-200 max-w-md h-40 rounded-lg flex items-center justify-center mb-2">
              <img src="<?= base_url('asset/img/mobil/honda'); ?>/<?= $honda['slide2']; ?>" id="preview2"
                class="h-40 rounded-lg">
            </div>
            <input type="file" id="slide2"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
              name="slide2" onchange="previewImg2()" />
          </div>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('slide2'); ?>
          </div>
        </div>

        <!-- Slide 3 -->
        <div>
          <label for="slide3" class="text-gray-700">
            Slide 3
            <span class="text-red-500">
              <?= ($validation->hasError('slide3')) ? '*' : '' ; ?>
            </span>
          </label>
          <div class="flex-col">
            <div class="bg-gray-200 max-w-md h-40 rounded-lg flex items-center justify-center mb-2">
              <img src="<?= base_url('asset/img/mobil/honda'); ?>/<?= $honda['slide3']; ?>" id="preview3"
                class="h-40 rounded-lg">
            </div>
            <input type="file" id="slide3"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
              name="slide3" onchange="previewImg3()" />
          </div>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('slide3'); ?>
          </div>
        </div>

        <!-- Slide 4 -->
        <div>
          <label for="slide4" class="text-gray-700">
            Slide 4
            <span class="text-red-500">
              <?= ($validation->hasError('slide4')) ? '*' : '' ; ?>
            </span>
          </label>
          <div class="flex-col">
            <div class="bg-gray-200 max-w-md h-40 rounded-lg flex items-center justify-center mb-2">
              <img src="<?= base_url('asset/img/mobil/honda'); ?>/<?= $honda['slide4']; ?>" id="preview4"
                class="h-40 rounded-lg">
            </div>
            <input type="file" id="slide4"
              class="rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
              name="slide4" onchange="previewImg4()" />
          </div>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('slide4'); ?>
          </div>
        </div>

        <!-- DESKRIPSI -->
        <div>
          <label class="text-gray-700">
            Deskripsi
            <span class="text-red-500">
              <?= ($validation->hasError('deskripsi')) ? '*' : '' ; ?>
            </span>
            <textarea name="deskripsi" id="editor"
              class="border border-neutral-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"><?= (old('deskripsi')) ? old('deskripsi') : $honda['deskripsi'] ?></textarea>
          </label>
          <div class="text-rose-500 text-xs pl-2">
            <?= $validation->getError('deskripsi'); ?>
          </div>
        </div>
      </div>

      <button type="submit"
        class="py-2 px-20 w-full bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg mt-4">Simpan</button>
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

function previewImg1() {
  const gambar = document.querySelector('#slide');
  const preview = document.querySelector('#preview1');
  const img = document.querySelector('.img1');
  const filesampul = new FileReader();

  filesampul.readAsDataURL(gambar.files[0])
  filesampul.onload = function(e) {
    preview.src = e.target.result;
  }
}

function previewImg2() {
  const gambar = document.querySelector('#slide2');
  const preview = document.querySelector('#preview2');
  const img = document.querySelector('.img2');
  const filesampul = new FileReader();

  filesampul.readAsDataURL(gambar.files[0])
  filesampul.onload = function(e) {
    preview.src = e.target.result;
  }
}

function previewImg3() {
  const gambar = document.querySelector('#slide3');
  const preview = document.querySelector('#preview3');
  const filesampul = new FileReader();

  filesampul.readAsDataURL(gambar.files[0])
  filesampul.onload = function(e) {
    preview.src = e.target.result;
  }
}

function previewImg4() {
  const gambar = document.querySelector('#slide4');
  const preview = document.querySelector('#preview4');
  const filesampul = new FileReader();

  filesampul.readAsDataURL(gambar.files[0])
  filesampul.onload = function(e) {
    preview.src = e.target.result;
  }
}
</script>
<?= $this->endSection() ;?>