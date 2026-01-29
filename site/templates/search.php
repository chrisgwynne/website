<?php snippet('header') ?>

<main>
  <h1>Search</h1>
  <form action="/search" method="post">
    <input type="text" name="q" placeholder="Search...">
  </form>

  <?php if (isset($results)): ?>
    <ul class="results">
      <?php if ($results->count() === 0): ?>
        <li>No results found.</li>
      <?php else: ?>
        <?php foreach ($results as $result): ?>
          <li>
            <a href="<?= $result->url() ?>">
              <?= $result->title()->html() ?>
            </a>
          </li>
        <?php endforeach ?>
      <?php endif ?>
    </ul>
  <?php endif ?>
</main>

<?php snippet('footer') ?>
