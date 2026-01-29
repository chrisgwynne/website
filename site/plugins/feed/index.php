<?php
 Kirby::plugin('my/feed', [
  'routes' => [
    [
      'pattern' => 'feed',
      'action'  => function () {
        $blog = page('blog');
        $articles = $blog->children()->sortBy('date', 'desc')->limit(20);
        
        $feed = '<?xml version="1.0" encoding="utf-8"?>';
        $feed .= '<feed xmlns="http://www.w3.org/2005/Atom">';
        $feed .= '<title>' . $blog->title() . '</title>';
        $feed .= '<link href="' . url('feed') . '" rel="self"/>';
        $feed .= '<link href="' . $blog->url() . '"/>';
        
        foreach ($articles as $article) {
          $feed .= '<entry>';
          $feed .= '<title>' . $article->title() . '</title>';
          $feed .= '<link href="' . $article->url() . '"/>';
          $feed .= '<id>' . $article->url() . '</id>';
          $feed .= '<updated>' . $article->date()->toDate('c') . '</updated>';
          $feed .= '<summary>' . $article->description() . '</summary>';
          $feed .= '</entry>';
        }
        $feed .= '</feed>';
        
        return new Response($feed, 'application/atom+xml');
      }
    ]
  ]
]);
