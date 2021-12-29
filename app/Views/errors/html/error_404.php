<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?= base_url('asset/css/app.css'); ?>">
  <title>404 Page Not Found</title>

  <!-- <style>
  div.logo {
    height: 200px;
    width: 155px;
    display: inline-block;
    opacity: 0.08;
    position: absolute;
    top: 2rem;
    left: 50%;
    margin-left: -73px;
  }

  body {
    height: 100%;
    background: #fafafa;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #777;
    font-weight: 300;
  }

  h1 {
    font-weight: lighter;
    letter-spacing: 0.8;
    font-size: 3rem;
    margin-top: 0;
    margin-bottom: 0;
    color: #222;
  }

  .wrap {
    max-width: 1024px;
    margin: 5rem auto;
    padding: 2rem;
    background: #fff;
    text-align: center;
    border: 1px solid #efefef;
    border-radius: 0.5rem;
    position: relative;
  }

  pre {
    white-space: normal;
    margin-top: 1.5rem;
  }

  code {
    background: #fafafa;
    border: 1px solid #efefef;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    display: block;
  }

  p {
    margin-top: 1.5rem;
  }

  .footer {
    margin-top: 2rem;
    border-top: 1px solid #efefef;
    padding: 1em 2em 0 2em;
    font-size: 85%;
    color: #999;
  }

  a:active,
  a:link,
  a:visited {
    color: #dd4814;
  }
  </style> -->
</head>

<body>


  <main class="bg-white relative overflow-hidden h-screen">
    <div class="container mx-auto h-screen pt-32 md:pt-0 px-6 z-10 flex items-center justify-between">
      <div class="container mx-auto px-6 flex flex-col-reverse lg:flex-row justify-between items-center relative">
        <div class="w-full mb-16 md:mb-8 text-center lg:text-left">
          <h1 class="font-light font-sans text-center lg:text-left text-5xl lg:text-8xl mt-12 md:mt-0 text-gray-700">
            <?php if (! empty($message) && $message !== '(null)') : ?>
            <?= nl2br(esc($message)) ?>
            <?php else : ?>
            Sorry, this page isn&#x27;t available
            <?php endif ?>
          </h1>
          <a href="/">
            <button
              class="px-2 py-2 w-36 mt-16 font-light transition ease-in duration-200 hover:bg-yellow-400 border-2 text-lg border-gray-700 bg-yellow-300 focus:outline-none">
              Go back home
            </button>
          </a>
        </div>
        <div class="block w-full mx-auto md:mt-0 relative max-w-md lg:max-w-2xl">
          <img src="https://www.tailwind-kit.com/images/illustrations/1.svg" />
        </div>
      </div>
    </div>
  </main>


  <!-- <div class="wrap">
		<h1>404 - File Not Found</h1>

		<p>
			<?php if (! empty($message) && $message !== '(null)') : ?>
				<?= nl2br(esc($message)) ?>
			<?php else : ?>
				Sorry! Cannot seem to find the page you were looking for.
			<?php endif ?>
		</p>
	</div> -->
</body>

</html>