<?php snippet('header') ?>

<main>
  <h1><?= $page->title()->html() ?></h1>
  
  <?php $articles = $page->children()->sortBy('date', 'desc')->paginate(10); ?>
  
  <ul class="article-list">
    <?php foreach ($articles as $article): ?>
      <li>
        <a href="<?= $article->url() ?>">
          <span class="date">[<?= $article->date()->toDate('Y-m-d') ?>]</span>
          <?= $article->title()->html() ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>

  <?php if ($articles->pagination()->hasPages()): ?>
    <nav class="pagination">
      <?php if ($articles->pagination()->hasPrevPage()): ?>
        <a href="<?= $articles->pagination()->prevPageURL() ?>">← Prev</a>
      <?php endif ?>
      
      <?php if ($articles->pagination()->hasNextPage()): ?>
        <a href="<?= $articles->pagination()->nextPageURL() ?>">Next →</a>
      <?php endif ?>
    </nav>
  <?php endif ?>
</main>

<?php snippet('footer') ?>
