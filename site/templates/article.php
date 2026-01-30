<?php snippet('header') ?>

<!-- ARTICLE PAGE -->
<a href="/blog" class="back-link">&larr; BACK TO BLOG</a>

<h1 class="title"><?= $page->title()->html() ?></h1>

<div class="meta">
  <span class="date"><?= $page->date()->toDate('Y-m-d') ?></span>
  <?php if ($page->tags()->isNotEmpty()): ?>
    <?php foreach ($page->tags()->split() as $tag): ?>
      <span class="tag">#<?= strtolower($tag) ?></span>
    <?php endforeach ?>
  <?php endif ?>
  <span class="reading-time" title="Estimated reading time">
    <?= $page->readingTime() ?>
  </span>
</div>

<div id="post" class="post-content">
  <?= $page->text()->kirbytext() ?>
</div>

<?php snippet('giscus') ?>

<?php snippet('related-posts') ?>

<?php snippet('footer') ?>
