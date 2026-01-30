<?php

Kirby::plugin('my/readingtime', [
    'pageMethods' => [
        'readingTime' => function () {
            $wordsPerMinute = option('readingTime.wordsPerMinute', 200);
            $text = $this->text()->toString();
            // Strip HTML and KirbyText
            $text = strip_tags(kirbytext($text));
            $wordCount = str_word_count($text);
            $minutes = ceil($wordCount / $wordsPerMinute);
            
            if ($minutes < 1) {
                return '< 1 min read';
            } elseif ($minutes === 1) {
                return '1 min read';
            } else {
                return $minutes . ' min read';
            }
        }
    ]
]);
