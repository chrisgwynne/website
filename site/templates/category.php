<?php snippet('header') ?>

<!-- CATEGORY PAGE -->
<h1 class="title">#<?= strtolower($category) ?></h1>

<div class="meta mb-8">
  <span><?= $posts->count() ?> article<?= $posts->count() !== 1 ? 's' : '' ?> in this category</span>
</div>

<div id="list">
  <ul class="article-list">
    <?php foreach ($posts->sortBy('date', 'desc') as $post): ?>
      <li>
        <a href="<?= $post->url() ?>">
          <span class="date"><?= $post->date()->toDate('Y-m-d') ?></span>
          <?= $post->title()->html() ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</div>

<div class="mt-8">
  <a href="/blog" class="back-link">&larr; BACK TO ALL POSTS</a>
</div>

<?php snippet('footer') ?>
