<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- OpenGraph / Social Media Meta Tags -->
  <?php snippet('seo/og-tags') ?>
  
  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="alternate" type="application/rss+xml" href="/feed">
  <link rel="sitemap" type="application/xml" href="/sitemap.xml">
  <link rel="shortcut icon" href="/assets/images/logo.svg">
  
  <!-- Prism.js for Syntax Highlighting -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
  
  <!-- Theme initialization - prevents flash of wrong theme -->
  <script>
    (function() {
      const savedTheme = localStorage.getItem('theme') || 'dark';
      document.documentElement.setAttribute('data-theme', savedTheme);
    })();
  </script>
</head>
<body>

<!-- 
=============================
    _   ______  ____  ______
   / | / / __ \/ __ \/ ____/
  /  |/ / / / / / / / __/   
 / /|  / /_/ / /_/ / /___   
/_/ |_\/____/_____/_____/   

=============================
-->

  <!-- HEADER SECTION -->
  <div id="header" class="node-header">
    <div class="node-container">
      <a href="/">
        <img class="node-logo" src="/assets/images/logo.svg" alt="Logo">
      </a>
      
      <div class="node-nav">
        <a href="/">HOME</a>
        <span class="node-nav-separator">/</span>
        <a href="/blog">BLOG</a>
        <span class="node-nav-separator">/</span>
        <a href="/archive">ARCHIVE</a>
        <span class="node-nav-separator">/</span>
        <a href="/contact">CONTACT</a>
        <span class="node-nav-separator">/</span>
        <a href="/feed">RSS</a>
        <span class="node-nav-separator">/</span>
        <button id="theme-toggle" class="theme-toggle" aria-label="Toggle dark/light theme">
          <span class="theme-toggle-light">☀</span>
          <span class="theme-toggle-dark">☾</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Search Modal -->
  <div id="search-modal" class="search-modal" role="dialog" aria-modal="true" aria-label="Search">
    <div class="search-modal-overlay"></div>
    <div class="search-modal-content">
      <form action="/search" method="get" class="search-modal-form">
        <input type="text" name="q" placeholder="Search articles..." class="search-modal-input" autocomplete="off" id="search-modal-input">
        <button type="button" class="search-modal-close" aria-label="Close search">×</button>
      </form>
      <div class="search-modal-hints">
        <span><kbd>↑↓</kbd> Navigate</span>
        <span><kbd>↵</kbd> Select</span>
        <span><kbd>ESC</kbd> Close</span>
      </div>
    </div>
  </div>

  <div id="page">
    <div id="content" class="node-container">
