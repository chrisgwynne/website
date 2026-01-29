<?php snippet('header') ?>

<main>
  <a href="/blog" class="back-link">← Back to Blog</a>
  
  <article>
    <header>
      <h1><?= $page->title()->html() ?></h1>
      <div class="meta">
        <time><?= $page->date()->toDate('Y-m-d') ?></time>
        <?php if ($page->tags()->isNotEmpty()): ?>
          <span class="tags">
            <?php foreach ($page->tags()->split() as $tag): ?>
              <span class="tag">#<?= $tag ?></span>
            <?php endforeach ?>
          </span>
        <?php endif ?>
      </div>
    </header>

    <div class="content">
      <?= $page->text()->kirbytext() ?>
    </div>

    <?php snippet('giscus') ?>
  </article>
</main>

<?php snippet('footer') ?>
