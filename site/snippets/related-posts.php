<?php
// Related posts based on shared tags

if ($page->tags()->isEmpty()) return;

$currentTags = $page->tags()->split();
$blog = page('blog');

if (!$blog) return;

// Find articles with matching tags, excluding current
$related = $blog->children()->listed()
    ->filter(function ($article) use ($page, $currentTags) {
        if ($article->id() === $page->id()) return false;
        if ($article->tags()->isEmpty()) return false;
        
        $articleTags = $article->tags()->split();
        // Check if any tag matches
        foreach ($currentTags as $tag) {
            if (in_array($tag, $articleTags)) {
                return true;
            }
        }
        return false;
    })
    ->sortBy('date', 'desc')
    ->limit(5);

if ($related->count() === 0) return;
?>

<div class="related-posts">
  <h3>Related Posts</h3>
  <ul>
    <?php foreach ($related as $relatedArticle): 
      // Get shared tags
      $sharedTags = array_intersect($currentTags, $relatedArticle->tags()->split());
      $category = !empty($sharedTags) ? strtoupper(substr(reset($sharedTags), 0, 2)) : 'BL';
    ?>
      <li>
        <a href="<?= $relatedArticle->url() ?>">
          <span class="tag">[<?= $category ?>]</span>
          <span><?= $relatedArticle->title()->html() ?></span>
        </a>
        <span class="date"><?= $relatedArticle->date()->toDate('Y-m-d') ?></span>
      </li>
    <?php endforeach ?>
  </ul>
</div>
