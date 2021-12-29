<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-7">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Mobil Bekas Margonda">
  <meta name="keywords" content="Mobil Bekas Margonda">

  <?= link_tag('asset/css/app.css'); ?>
  <?= link_tag('asset/css/hamburgers.css'); ?>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <title><?= $title; ?></title>
</head>

<body id="home" class="antialiased" x-data="{darkMode : false}" x-init="
darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">

  <div :class="{'dark': darkMode === true}">
    <div class="dark:bg-gray-900 flex flex-col h-screen">

      <?= $this->include('layouts/navbar') ;?>

      <div class="flex-grow dark:bg-gray-900">
        <?= $this->renderSection('main') ;?>
      </div>

    </div>
  </div>

</body>

</html>