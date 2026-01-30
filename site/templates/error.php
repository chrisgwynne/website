<?php snippet('header') ?>

<!-- 404 ERROR PAGE -->
<div class="error-page">
  <div class="error-code">
    <span class="error-digit">4</span>
    <span class="error-digit">0</span>
    <span class="error-digit">4</span>
  </div>
  
  <h1 class="error-title">Page Not Found</h1>
  
  <p class="error-message">
    The page you're looking for doesn't exist or has been moved.
  </p>
  
  <div class="error-suggestions">
    <p>You might want to:</p>
    <ul>
      <li><a href="/">Go to the homepage</a></li>
      <li><a href="/blog">Browse the blog</a></li>
      <li><a href="/archive">Check the archive</a></li>
    </ul>
  </div>
  
  <div class="error-search">
    <p>Or try searching:</p>
    <form action="/search" method="get" class="search-form">
      <input type="text" name="q" placeholder="Search..." class="search-input" required>
      <button type="submit" class="search-button">Search</button>
    </form>
  </div>
</div>

<?php snippet('footer') ?>
