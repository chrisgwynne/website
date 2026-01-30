<?php
return function ($page, $kirby) {
    // Get the category from the page slug
    $category = $page->slug();
    
    // Find all blog posts with this tag
    $posts = $kirby->collection('blog')->filterBy('tags', $category, ',');
    
    return [
        'category' => $category,
        'posts' => $posts
    ];
};
