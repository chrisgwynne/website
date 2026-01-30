<?php snippet('header') ?>

<!-- ARCHIVE PAGE -->
<h1 class="title">Archive</h1>

<div class="archive-intro">
  <p>All posts organized by date. <?= $site->find('blog') ? $site->find('blog')->children()->count() : 0 ?> articles total.</p>
</div>

<div id="archive" class="archive-content">
  <?php
  $blog = page('blog');
  if ($blog):
    $articles = $blog->children()->listed()->sortBy('date', 'desc');
    
    // Group articles by year and month
    $grouped = [];
    foreach ($articles as $article) {
      $year = $article->date()->toDate('Y');
      $month = $article->date()->toDate('F');
      $monthKey = $article->date()->toDate('m');
      
      if (!isset($grouped[$year])) {
        $grouped[$year] = [];
      }
      if (!isset($grouped[$year][$monthKey])) {
        $grouped[$year][$monthKey] = [
          'name' => $month,
          'articles' => []
        ];
      }
      $grouped[$year][$monthKey]['articles'][] = $article;
    }
  ?>
    
    <?php foreach ($grouped as $year => $months): ?>
      <div class="archive-year">
        <h2 class="year-heading"><?= $year ?></h2>
        
        <?php foreach ($months as $monthKey => $monthData): ?>
          <div class="archive-month">
            <h3 class="month-heading"><?= $monthData['name'] ?></h3>
            <ul class="archive-list">
              <?php foreach ($monthData['articles'] as $article): 
                $tags = $article->tags()->split();
                $category = !empty($tags) ? strtoupper(substr($tags[0], 0, 2)) : 'BL';
              ?>
                <li>
                  <a href="<?= $article->url() ?>">
                    <span class="tag">[<?= $category ?>]</span>
                    <span><?= $article->title()->html() ?></span>
                  </a>
                  <span class="date"><?= $article->date()->toDate('Y-m-d') ?></span>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endforeach ?>
      </div>
    <?php endforeach ?>
    
  <?php else: ?>
    <p>No blog posts found.</p>
  <?php endif ?>
</div>

<?php snippet('footer') ?>
