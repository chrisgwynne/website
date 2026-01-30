// Lazy loading implementation using Intersection Observer
// Falls back to native lazy loading for browsers that support it

(function() {
    'use strict';
    
    // Check if Intersection Observer is supported
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    
                    // Load the actual image
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                    }
                    
                    // Load srcset if available
                    if (img.dataset.srcset) {
                        img.srcset = img.dataset.srcset;
                    }
                    
                    // Remove lazyload class and add lazyloaded
                    img.classList.remove('lazyload');
                    img.classList.add('lazyloaded');
                    
                    // Stop observing this image
                    observer.unobserve(img);
                }
            });
        }, {
            // Start loading images slightly before they enter viewport
            rootMargin: '50px 0px',
            threshold: 0.01
        });
        
        // Observe all images with lazyload class
        document.querySelectorAll('img.lazyload').forEach(function(img) {
            imageObserver.observe(img);
        });
    } else {
        // Fallback: Just load all images immediately for older browsers
        document.querySelectorAll('img.lazyload').forEach(function(img) {
            if (img.dataset.src) {
                img.src = img.dataset.src;
            }
            if (img.dataset.srcset) {
                img.srcset = img.dataset.srcset;
            }
            img.classList.remove('lazyload');
            img.classList.add('lazyloaded');
        });
    }
})();
