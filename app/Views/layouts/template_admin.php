<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-7">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Mobil Bekas Margonda">
  <meta name="keywords" content="Mobil Bekas Margonda">
  <?= csrf_meta() ?>

  <link rel="apple-touch-icon" sizes="180x180" href="https://cdn-icons-png.flaticon.com/512/6270/6270078.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://cdn-icons-png.flaticon.com/512/6270/6270078.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://cdn-icons-png.flaticon.com/512/6270/6270078.png">
  <link rel="manifest" href="/site.webmanifest">

  <?= link_tag('asset/css/app.css'); ?>
  <?= link_tag('asset/css/admin.css'); ?>

  <!-- JS FRAMEWORK & LIBRARY -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
  </script>

  <!-- SWEETALERT -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- SWIPER -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  <title><?= $title; ?></title>
</head>

<body class="antialiased">

  <div :class="{'dark': darkMode === true}">
    <div class="dark:bg-gray-800">

      <div x-data="{sideOpen : false}">

        <div x-data="{sideMobile : false}" class="flex relative">

          <!-- SIDEBAR -->
          <?= $this->include('layouts/sidebar') ;?>

          <div class="relative flex-col flex-1">
            <!-- NAVBAR -->
            <?= $this->include('layouts/navbar_admin') ;?>

            <!-- CONTENT -->
            <?= $this->renderSection('content') ;?>

            <!-- Alpine Modal -->
            <script>
            document.addEventListener('alpine:init', () => {
              Alpine.data('modal', () => ({
                open: false,

                toggle() {
                  this.open = !this.open
                },
              }))
            })
            </script>
          </div>

        </div>

      </div>

    </div>
  </div>

  <?= script_tag('asset/ckeditor5/build/ckeditor.js'); ?>
  <?= script_tag('asset/js/ckeditor.js'); ?>
  <?= script_tag('asset/js/swiper.js'); ?>

</body>

<!-- darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches -->

</html>