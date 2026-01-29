<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="alternate" type="application/rss+xml" href="/feed">
</head>
<body class="bg-[#222] text-[#c8c8c8] font-mono">
  <nav class="max-w-2xl mx-auto px-6 py-12">
    <a href="/" class="text-[#fff] hover:underline">Home</a> / 
    <a href="/blog" class="text-[#fff] hover:underline">Blog</a> / 
    <a href="/contact" class="text-[#fff] hover:underline">Contact</a>
  </nav>
  <main class="max-w-2xl mx-auto px-6">
