<?php

Kirby::plugin('my/cachebust', [
    'fileMethods' => [
        'cacheBust' => function () {
            // Get the file path
            $root = $this->root();
            
            // Return URL with hash if file exists
            if (file_exists($root)) {
                $hash = hash_file('md5', $root);
                $shortHash = substr($hash, 0, 8);
                return $this->url() . '?v=' . $shortHash;
            }
            
            return $this->url();
        }
    ],
    
    'siteMethods' => [
        'cacheBust' => function ($path) {
            // Look for file in assets
            $fullPath = kirby()->roots()->assets() . '/' . ltrim($path, '/');
            $url = kirby()->url('assets') . '/' . ltrim($path, '/');
            
            if (file_exists($fullPath)) {
                $hash = hash_file('md5', $fullPath);
                $shortHash = substr($hash, 0, 8);
                return $url . '?v=' . $shortHash;
            }
            
            return $url;
        }
    ]
]);
