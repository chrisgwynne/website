<?php snippet('header') ?>

<h1 class="title">Search</h1>

<div id="post" class="post-content">
  <form action="/search" method="post" class="mb-8">
    <input type="text" name="q" placeholder="Search..." 
           class="bg-node-code border border-node-border p-3 w-full max-w-md text-white font-mono"
           value="<?= isset($query) ? esc($query) : '' ?>">
    <button type="submit" class="bg-white text-node-bg px-4 py-3 font-mono hover:bg-gray-200 mt-2">Search</button>
  </form>

  <?php if (isset($results)): ?>
    <?php if ($results->count() === 0): ?>
      <p>No results found.</p>
    <?php else: ?>
      <ul class="article-list">
        <?php foreach ($results as $result): ?>
          <li>
            <a href="<?= $result->url() ?>">
              <span class="tag">[<?= $result->parent()->title()->short(2) ?>]</span>
              <?= $result->title()->html() ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>
  <?php endif ?>
</div>

<?php snippet('footer') ?>
