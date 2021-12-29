<div id="table-data">
  <table
    class="table-auto w-full border-collapse border-2 border-indigo-500 dark:bg-gray-600 dark:text-white rounded-lg">
    <thead>
      <tr class="h-10 bg-indigo-500 text-white">
        <th class="w-1/12 border border-indigo-500 font-medium">No.</th>
        <th class="w-1/2 border border-indigo-500 font-medium">Kategori</th>
        <th class="w-1/6 border border-indigo-500 font-medium">Created</th>
        <th class="w-1/4 border border-indigo-500 font-medium">Option</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; ?>
      <?php foreach($kategori as $row) : ?>
      <tr>
        <td class="text-center border border-indigo-500"><?= $no++; ?></td>
        <td class="border border-indigo-500 p-3"><?= $row['nama_kategori']; ?></td>
        <td class="border border-indigo-500 p-3"><?= Date("d-M-Y H:i", strtotime($row['created_at'])); ?></td>
        <td class="border border-indigo-500 p-3">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-2 items-center">

            <!-- EDIT -->
            <div x-data="modal">
              <button @click="toggle" data-id="<?= $row['id_kategori']; ?>" id="edit-btn"
                class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">Edit</button>

              <!-- MODAL UPDATE -->
              <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-items-center justify-center z-50"
                id="modal-update<?= $row['id_kategori']; ?>">
                <form action="<?= route_to('update.kategori'); ?>" method="post" id="update-data"
                  class="flex w-full mx-5 md:mx-0 max-w-sm space-x-3" autocomplete="off">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="kid" value="<?= $row['id_kategori']; ?>">
                  <div
                    class="w-full max-w-2xl px-5 py-10 m-auto bg-white border-2 border-indigo-500 rounded-lg shadow dark:bg-gray-800">
                    <div class="mb-6 text-3xl font-light text-center text-gray-800 dark:text-white">
                      Update Kategori
                    </div>
                    <div class="grid max-w-xl grid-cols-2 gap-4 m-auto">
                      <div class="col-span-2">
                        <div class="relative">
                          <label for="kategori" class="dark:text-white kategori_label">Nama Kategori</label>
                          <input type="text"
                            class="w-full rounded-lg border-transparent flex-1 appearance-none border border-neutral-300 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Nama Kategori" name="nama_kategori" />
                          <div class="text-rose-500 text-sm mt-1 error-text nama_kategori_error"></div>
                        </div>
                      </div>
                      <div class="col-span-2">
                        <button type="submit"
                          class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                          Simpan
                        </button>
                      </div>
                      <div class="col-span-2">
                        <button id="cancel-update" @click="toggle" type="button"
                          class="py-2 px-4 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-indigo-500 w-full transition ease-in duration-200 text-center text-base font-semibold border-2 border-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- DELETE -->
            <div x-data="modal">
              <button @click="toggle" data-id="<?= $row['id_kategori']; ?>" id="del-btn"
                class="px-1 md:px-3 py-1 border-2 border-rose-500 focus:ring-rose-500 focus:ring-offset-indigo-200 text-rose-500 w-full transition ease-in duration-200 text-center text-sm md:text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">Delete</button>

              <!-- MODAL DELETE -->
              <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-items-center justify-center z-50"
                id="modal-delete<?= $row['id_kategori']; ?>">
                <div class="border-2 border-indigo-500 rounded-2xl p-4 bg-white dark:bg-gray-800 w-72 m-auto">
                  <div class="w-full h-full text-center">
                    <div class="flex h-full flex-col justify-between">
                      <svg width="40" height="40" class="mt-4 w-12 h-12 m-auto text-indigo-500 fill-indigo-500"
                        viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                        </path>
                      </svg>
                      <p class="text-gray-800 dark:text-gray-200 text-xl font-bold mt-4">
                        Hapus Kategori
                      </p>
                      <p class="text-gray-600 dark:text-gray-400 text-xs py-2 px-6">
                        Apakah anda yakin ingin menghapus kategori ini ?
                      </p>
                      <div class="grid grid-cols-2 items-center justify-between gap-4 w-full mt-8">
                        <button id="cancel-delete" @click="toggle" type="button"
                          class="py-2 px-4 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-indigo-500 w-full transition ease-in duration-200 text-center text-base font-semibold border-2 border-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                          Cancel
                        </button>
                        <form action="<?= route_to('delete.kategori'); ?>" method="post" id="delete-kategori">
                          <?= csrf_field(); ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="id_kategori" value="<?= $row['id_kategori']; ?>">
                          <button type="submit"
                            class="py-2 px-4  bg-rose-600 hover:bg-rose-700 focus:ring-rose-500 focus:ring-offset-rose-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                            Hapus
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>