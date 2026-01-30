<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="alternate" type="application/rss+xml" href="/feed">
  <link rel="shortcut icon" href="/assets/images/logo.svg">
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
        <a href="/contact">CONTACT</a>
        <span class="node-nav-separator">/</span>
        <a href="/feed">RSS</a>
      </div>
    </div>
  </div>

  <div id="page">
    <div id="content" class="node-container">
