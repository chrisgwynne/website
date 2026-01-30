<?php

Kirby::plugin('my/lazyimages', [
    'fileMethods' => [
        'lazySrcset' => function ($sizes = null) {
            // Default sizes for responsive images
            if ($sizes === null) {
                $sizes = [400, 800, 1200];
            }
            
            $srcset = [];
            foreach ($sizes as $size) {
                if ($this->width() >= $size) {
                    $srcset[] = $this->resize($size)->url() . ' ' . $size . 'w';
                }
            }
            
            // Always include original if smaller than smallest size
            if (empty($srcset)) {
                $srcset[] = $this->url() . ' ' . $this->width() . 'w';
            }
            
            return implode(', ', $srcset);
        },
        
        'lazyImage' => function ($sizes = null, $class = '', $alt = null) {
            $alt = $alt ?? $this->alt()->or($this->name())->html();
            $srcset = $this->lazySrcset($sizes);
            
            // Generate a small placeholder for blur-up effect
            $placeholder = $this->resize(20)->url();
            
            return '<img ' .
                'src="' . $placeholder . '" ' .
                'data-src="' . $this->url() . '" ' .
                'data-srcset="' . $srcset . '" ' .
                'sizes="(max-width: 768px) 100vw, 800px" ' .
                'alt="' . $alt . '" ' .
                'loading="lazy" ' .
                'decoding="async" ' .
                ($class ? 'class="lazyload ' . $class . '" ' : 'class="lazyload" ') .
                'width="' . $this->width() . '" ' .
                'height="' . $this->height() . '">';
        }
    ],
    
    'pageMethods' => [
        'optimizedImage' => function ($fieldname = 'image', $sizes = null) {
            $image = $this->$fieldname()->toFile();
            if (!$image) return null;
            
            return $image->lazyImage($sizes);
        }
    ]
]);
