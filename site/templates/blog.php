<?php snippet('header') ?>

<!-- BLOG LISTING -->
<h1 class="title"><?= $page->title()->html() ?></h1>

<div id="list">
  <ul>
    <?php 
    $articles = $page->children()->sortBy('date', 'desc')->paginate(20);
    foreach ($articles as $article): 
      // Get category from tags or default to "BL"
      $tags = $article->tags()->split();
      $category = !empty($tags) ? strtoupper(substr($tags[0], 0, 2)) : 'BL';
    ?>
      <li>
        <a href="<?= $article->url() ?>">
          <span class="tag">[<?= $category ?>]</span><span><?= $article->title()->html() ?></span>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</div>

<?php if ($articles->pagination()->hasPages()): ?>
  <div class="pagination">
    <?php if ($articles->pagination()->hasPrevPage()): ?>
      <a href="<?= $articles->pagination()->prevPageURL() ?>">&larr; PREV</a>
    <?php endif ?>
    
    <?php if ($articles->pagination()->hasNextPage()): ?>
      <a href="<?= $articles->pagination()->nextPageURL() ?>">NEXT &rarr;</a>
    <?php endif ?>
  </div>
<?php endif ?>

<?php snippet('footer') ?>
