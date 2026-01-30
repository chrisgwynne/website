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
  <link rel="shortcut icon" href="/assets/images/logo.svg">
  
  <!-- Prism.js for Syntax Highlighting -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
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
      </div>
    </div>
  </div>

  <div id="page">
    <div id="content" class="node-container">
