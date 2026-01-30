<?php snippet('header') ?>

<h1 class="title"><?= $page->title()->html() ?></h1>

<div id="post" class="post-content">
  <?= $page->text()->kirbytext() ?>
</div>

<?php snippet('footer') ?>
