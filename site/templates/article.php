<?php snippet('header') ?>

<!-- Reading Progress Bar -->
<div id="reading-progress" class="reading-progress"><div class="reading-progress-bar"></div></div>

<!-- ARTICLE PAGE -->
<a href="/blog" class="back-link">&larr; BACK TO BLOG</a>

<h1 class="title"><?= $page->title()->html() ?></h1>

<div class="meta">
  <span class="date"><?= $page->date()->toDate('Y-m-d') ?></span>
  <?php if ($page->tags()->isNotEmpty()): ?>
    <?php foreach ($page->tags()->split() as $tag): ?>
      <a href="/categories/<?= strtolower($tag) ?>" class="tag">#<?= strtolower($tag) ?></a>
    <?php endforeach ?>
  <?php endif ?>
  <span class="reading-time" title="Estimated reading time">
    <?= $page->readingTime() ?>
  </span>
</div>

<?php if ($page->cover()->toFile()): ?>
<div class="article-cover">
  <?= $page->cover()->toFile()->lazyImage([400, 800, 1200], 'cover-image') ?>
</div>
<?php endif ?>

<div id="post" class="post-content">
  <?= $page->text()->kirbytext() ?>
</div>

<?php snippet('giscus') ?>

<?php snippet('related-posts') ?>

<?php snippet('footer') ?>
