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
        
        'lazySrcsetWebp' => function ($sizes = null) {
            // Default sizes for responsive images
            if ($sizes === null) {
                $sizes = [400, 800, 1200];
            }
            
            $srcset = [];
            foreach ($sizes as $size) {
                if ($this->width() >= $size) {
                    $srcset[] = $this->resize($size)->webp()->url() . ' ' . $size . 'w';
                }
            }
            
            // Always include original if smaller than smallest size
            if (empty($srcset)) {
                $srcset[] = $this->webp()->url() . ' ' . $this->width() . 'w';
            }
            
            return implode(', ', $srcset);
        },
        
        'lazyImage' => function ($sizes = null, $class = '', $alt = null) {
            $alt = $alt ?? $this->alt()->or($this->name())->html();
            
            // Generate WebP srcset if supported
            $webpSrcset = null;
            $srcset = $this->lazySrcset($sizes);
            
            // Try to generate WebP version for supported formats
            if (in_array($this->extension(), ['jpg', 'jpeg', 'png'])) {
                try {
                    $webpSrcset = $this->lazySrcsetWebp($sizes);
                } catch (Exception $e) {
                    // WebP not supported, use original format
                }
            }
            
            // Generate a small placeholder for blur-up effect
            $placeholder = $this->resize(20)->url();
            
            // Build picture element for WebP with fallback
            $html = '<picture>';
            
            if ($webpSrcset) {
                $html .= '<source ' .
                    'type="image/webp" ' .
                    'data-srcset="' . $webpSrcset . '" ' .
                    'sizes="(max-width: 768px) 100vw, 800px">';
            }
            
            $html .= '<img ' .
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
            
            $html .= '</picture>';
            
            return $html;
        },
        
        'toWebp' => function ($quality = 85) {
            // Convert image to WebP format
            if ($this->extension() === 'webp') {
                return $this;
            }
            
            return $this->webp(['quality' => $quality]);
        }
    ],
    
    'pageMethods' => [
        'optimizedImage' => function ($fieldname = 'image', $sizes = null) {
            $image = $this->$fieldname()->toFile();
            if (!$image) return null;
            
            return $image->lazyImage($sizes);
        }
    ],
    
    'hooks' => [
        'file.create:after' => function ($file) {
            // Auto-convert uploaded images to WebP
            if ($file->type() === 'image' && in_array($file->extension(), ['jpg', 'jpeg', 'png'])) {
                try {
                    // Generate WebP version alongside original
                    $webpFile = $file->webp(['quality' => 85]);
                } catch (Exception $e) {
                    // Silently fail if WebP conversion isn't available
                }
            }
        }
    ]
]);
