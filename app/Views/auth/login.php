<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="mt-24 mx-4">
  <div
    class="flex flex-col w-full max-w-sm md:max-w-md px-4 py-8 bg-white rounded-lg shadow-xl shadow-indigo-500/30 dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10 mx-auto">
    <div class="self-center mb-6 text-3xl font-bold font-viga uppercase text-indigo-600 dark:text-amber-400">
      <?=lang('Auth.loginTitle')?>
    </div>

    <?php if (session()->has('error')) : ?>
    <div class="text-rose-500 bg-rose-100 p-2 rounded-lg">
      <?= session('error') ?>
    </div>
    <?php endif ?>

    <div class="mt-8">
      <form action="<?= route_to('login') ?>" method="post" autoComplete="off">
        <?= csrf_field() ?>

        <?php if ($config->validFields === ['email']): ?>
        <div class="flex flex-col mb-2">
          <label class="relative block">
            <span class="sr-only"><?=lang('Auth.email')?></span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="h-5 w-5 fill-neutral-600" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                </path>
              </svg>
            </span>
            <input
              class="placeholder:italic placeholder:text-gray-400 block bg-white w-full border border-gray-300 rounded-md py-2 pl-10 pr-4 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-1 sm:text-sm"
              placeholder="<?=lang('Auth.email')?>" type="email" name="login" />
          </label>
          <div class="text-rose-500 text-xs pl-2">
            <?= session('errors.login') ?>
          </div>
        </div>
        <?php else: ?>
        <div class="flex flex-col mb-2">
          <label class="relative block">
            <span class="sr-only"><?=lang('Auth.emailOrUsername')?></span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="h-5 w-5 fill-neutral-600" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                </path>
              </svg>
            </span>
            <input
              class="placeholder:italic placeholder:text-gray-400 block bg-white w-full border border-gray-300 rounded-md py-2 pl-10 pr-4 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-1 sm:text-sm"
              placeholder="<?=lang('Auth.emailOrUsername')?>" type="text" name="login" />
          </label>
          <div class="text-rose-500 text-sm pt-1 pl-2">
            <?= session('errors.login') ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- PASSWORD -->
        <div class="flex flex-col mb-6">
          <label class="relative block">
            <span class="sr-only"><?=lang('Auth.password')?></span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="h-5 w-5 fill-neutral-600" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                </path>
              </svg>
            </span>
            <input
              class="placeholder:italic placeholder:text-gray-400 block bg-white w-full border border-gray-300 rounded-md py-2 pl-10 pr-4 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-1 sm:text-sm"
              placeholder="<?=lang('Auth.password')?>" id="password" type="password" name="password" />
          </label>
          <div class="text-rose-500 text-sm pt-1 pl-2">
            <?= session('errors.password') ?>
          </div>
          <label class="flex items-center gap-1 p-1 max-w-max">
            <input class="default:ring-2 indeterminate:bg-gray-300" type="checkbox" onclick="myFunction()">
            <div class="text-sm dark:text-amber-400">Show Password</div>
          </label>
        </div>

        <!-- FORGOT PASSWORD -->
        <div class="flex items-center mb-6 -mt-4">
          <div class="flex ml-auto">
            <a href="#"
              class="inline-flex text-xs font-thin text-gray-500 sm:text-sm dark:text-gray-100 hover:text-gray-700 dark:hover:text-white">
              <?php if ($config->activeResetter): ?>
              <p><a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
              <?php endif; ?>
            </a>
          </div>
        </div>

        <!-- SUBMIT -->
        <div class="flex w-full">
          <button type="submit"
            class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
            <?=lang('Auth.loginAction')?>
          </button>
        </div>
      </form>
    </div>

    <!-- REGISTRATION -->
    <div class="flex items-center justify-center mt-6">
      <a href="#" target="_blank"
        class="inline-flex items-center text-xs font-thin text-center text-gray-500 hover:text-gray-700 dark:text-gray-100 dark:hover:text-white">
        <span class="ml-2">
          <?php if ($config->allowRegistration) : ?>
          <p><a href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
          <?php endif; ?>
        </span>
      </a>
    </div>
  </div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?= $this->endSection() ?>