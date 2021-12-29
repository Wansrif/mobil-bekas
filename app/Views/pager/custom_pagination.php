<?php $pager->setSurroundCount(1) ?>

<div class="flex justify-center mb-7">
  <?php if ($pager->hasPreviousPage()) : ?>
  <a href="<?= $pager->getFirst() ?>"
    class="flex items-center px-4 py-2 mx-1 text-gray-700 bg-white hover:bg-indigo-600 rounded-md dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-indigo-500 hover:text-white dark:hover:text-gray-200 border-2 border-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
      <path d="m16.293 17.707 1.414-1.414L13.414 12l4.293-4.293-1.414-1.414L10.586 12zM7 6h2v12H7z"></path>
    </svg>
  </a>
  <a href="<?= $pager->getPreviousPage() ?>"
    class="flex items-center px-4 py-2 mx-1 text-gray-700 bg-white hover:bg-indigo-600 rounded-md dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-indigo-500 hover:text-white dark:hover:text-gray-200 border-2 border-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
      <path d="m12.707 7.707-1.414-1.414L5.586 12l5.707 5.707 1.414-1.414L8.414 12z"></path>
      <path d="M16.293 6.293 10.586 12l5.707 5.707 1.414-1.414L13.414 12l4.293-4.293z"></path>
    </svg>
  </a>
  <?php endif ?>

  <?php foreach ($pager->links() as $link) : ?>
  <a href="<?= $link['uri'] ?>"
    class="flex items-center px-4 py-2 mx-1 transition-colors duration-200 transform <?= $link['active'] ? 'bg-indigo-500 text-white dark:text-gray-200' : 'text-gray-700 dark:text-white bg-white dark:bg-gray-800' ?> rounded-md hover:bg-indigo-600 dark:hover:bg-indigo-500 hover:text-white dark:hover:text-gray-200 border-2 border-indigo-500">
    <?= $link['title'] ?>
  </a>
  <?php endforeach ?>

  <?php if ($pager->hasNextPage()) : ?>
  <a href="<?= $pager->getNextPage() ?>"
    class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-200 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-indigo-600 dark:hover:bg-indigo-500 hover:text-white dark:hover:text-gray-200 border-2 border-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
      <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
      <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
    </svg>
  </a>
  <a href="<?= $pager->getLast() ?>"
    class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-200 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-indigo-600 dark:hover:bg-indigo-500 hover:text-white dark:hover:text-gray-200 border-2 border-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
      <path d="M7.707 17.707 13.414 12 7.707 6.293 6.293 7.707 10.586 12l-4.293 4.293zM15 6h2v12h-2z"></path>
    </svg>
  </a>
  <?php endif ?>
</div>