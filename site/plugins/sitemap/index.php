<?php

Kirby::plugin('my/sitemap', [
    'routes' => [
        [
            'pattern' => 'sitemap.xml',
            'action' => function () {
                $pages = site()->pages()->index();
                
                // Filter out error pages and invisible pages
                $pages = $pages->filter(function ($page) {
                    return $page->isListed() || $page->isHomePage();
                });
                
                $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
                $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
                
                foreach ($pages as $page) {
                    $content .= '  <url>' . "\n";
                    $content .= '    <loc>' . xml($page->url()) . '</loc>' . "\n";
                    
                    // Use modified date if available, otherwise use created date
                    if ($page->modified()->isNotEmpty()) {
                        $content .= '    <lastmod>' . $page->modified()->toDate('Y-m-d') . '</lastmod>' . "\n";
                    } elseif ($page->date()->isNotEmpty()) {
                        $content .= '    <lastmod>' . $page->date()->toDate('Y-m-d') . '</lastmod>' . "\n";
                    }
                    
                    // Priority based on page type
                    if ($page->isHomePage()) {
                        $content .= '    <priority>1.0</priority>' . "\n";
                    } elseif ($page->template() == 'blog') {
                        $content .= '    <priority>0.8</priority>' . "\n";
                    } elseif ($page->template() == 'article') {
                        $content .= '    <priority>0.6</priority>' . "\n";
                    } else {
                        $content .= '    <priority>0.5</priority>' . "\n";
                    }
                    
                    $content .= '    <changefreq>' . ($page->isHomePage() ? 'daily' : 'weekly') . '</changefreq>' . "\n";
                    $content .= '  </url>' . "\n";
                }
                
                $content .= '</urlset>';
                
                return new Response($content, 'application/xml');
            }
        ]
    ]
]);
