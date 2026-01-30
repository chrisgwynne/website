<?php snippet('header') ?>

<!-- SEARCH PAGE -->
<h1 class="title">Search</h1>

<div id="post" class="post-content">
  <form action="/search" method="get" class="search-form mb-8">
    <input type="text" name="q" placeholder="Search..." 
           class="search-input search-input-large"
           value="<?= isset($query) ? esc($query) : '' ?>"
           id="search-input"
           autocomplete="off">
    <button type="submit" class="search-button">Search</button>
  </form>

  <div class="search-hints">
    <p>Press <kbd>Cmd/Ctrl + K</kbd> to search from anywhere</p>
  </div>

  <?php if (isset($results)): ?>
    <?php if ($results->count() === 0): ?>
      <div class="search-no-results">
        <p>No results found for "<?= esc($query) ?>"</p>
      </div>
    <?php else: ?>
      <div class="search-results">
        <p class="search-meta"><?= $results->count() ?> result<?= $results->count() !== 1 ? 's' : '' ?> for "<?= esc($query) ?>"</p>
        <ul class="article-list">
          <?php foreach ($results as $result): ?>
            <li class="search-result-item">
              <a href="<?= $result->url() ?>">
                <span class="tag">[<?= strtoupper($result->parent()->slug()) ?>]</span>
                <?= $result->title()->html() ?>
              </a>
              <p class="search-excerpt">
                <?= $result->text()->excerpt(150) ?>
              </p>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>
  <?php endif ?>
</div>

<?php snippet('footer') ?>
