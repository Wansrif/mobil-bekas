<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-7">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Mobil Bekas Margonda">
  <meta name="keywords" content="Mobil Bekas Margonda">
  <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>" class="csrf">

  <link rel="apple-touch-icon" sizes="180x180" href="https://cdn-icons-png.flaticon.com/512/6270/6270078.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://cdn-icons-png.flaticon.com/512/6270/6270078.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://cdn-icons-png.flaticon.com/512/6270/6270078.png">
  <link rel="manifest" href="/site.webmanifest">

  <?= link_tag('asset/css/app.css'); ?>
  <?= link_tag('asset/css/hamburgers.css'); ?>

  <!-- JS LIBARY & FRAMEWORK -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- SWIPER -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  <title><?= $title; ?></title>
</head>

<body id="home" class="antialiased" x-data="{darkMode : false}" x-init="
darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">

  <div :class="{'dark': darkMode === true}">
    <div class="dark:bg-gray-900 flex flex-col h-screen">

      <?= $this->include('layouts/navbar') ;?>

      <div class="flex-grow dark:bg-gray-900">
        <?= $this->renderSection('content') ;?>
      </div>

      <?= $this->include('layouts/footer') ;?>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
  <script>
  gsap.from('.headline', {
    duration: 1.5,
    opacity: 0,
    y: -80,
    ease: 'bounce',
  });
  gsap.from('#hub', {
    duration: 1,
    opacity: 0,
    x: -80,
    delay: 0.5,
    ease: "back.out(1.7)",
  });
  gsap.from('#about', {
    duration: 1,
    opacity: 0,
    x: -80,
    delay: 1,
    ease: "back.out(1.7)",
  });
  </script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();
  </script>

  <?= script_tag('asset/js/swiper.js'); ?>
</body>

</html>