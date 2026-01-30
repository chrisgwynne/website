<?php
// OpenGraph / Social Media Meta Tags

$ogTitle = $page->metadata()->title()->or($page->title())->html();
$ogDescription = $page->metadata()->description()->or($page->description())->or($site->description())->html();

// Get image: use page cover, SEO image, or fallback to site logo
if ($page->metadata()->image()->toFile()) {
    $ogImage = $page->metadata()->image()->toFile()->url();
} elseif ($page->cover()->toFile()) {
    $ogImage = $page->cover()->toFile()->url();
} elseif ($site->logo()->toFile()) {
    $ogImage = $site->logo()->toFile()->url();
} else {
    $ogImage = $site->url() . '/assets/images/logo.svg';
}

// Determine page type
$ogType = $page->isHomePage() ? 'website' : 'article';

// Get published/updated dates for articles
$publishedDate = '';
$modifiedDate = '';
if ($page->date()->isNotEmpty()) {
    $publishedDate = $page->date()->toDate('c');
}
if ($page->modified()->isNotEmpty()) {
    $modifiedDate = $page->modified()->toDate('c');
}
?>

<!-- OpenGraph / Facebook -->
<meta property="og:site_name" content="<?= $site->title()->html() ?>">
<meta property="og:title" content="<?= $ogTitle ?>">
<meta property="og:description" content="<?= $ogDescription ?>">
<meta property="og:url" content="<?= $page->url() ?>">
<meta property="og:type" content="<?= $ogType ?>">
<meta property="og:image" content="<?= $ogImage ?>">
<meta property="og:locale" content="en_US">

<?php if ($publishedDate): ?>
<meta property="article:published_time" content="<?= $publishedDate ?>">
<?php endif ?>

<?php if ($modifiedDate): ?>
<meta property="article:modified_time" content="<?= $modifiedDate ?>">
<?php endif ?>

<?php if ($page->tags()->isNotEmpty()): ?>
<?php foreach ($page->tags()->split() as $tag): ?>
<meta property="article:tag" content="<?= $tag ?>">
<?php endforeach ?>
<?php endif ?>

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $ogTitle ?>">
<meta name="twitter:description" content="<?= $ogDescription ?>">
<meta name="twitter:image" content="<?= $ogImage ?>">

<!-- Standard Meta -->
<meta name="description" content="<?= $ogDescription ?>">
