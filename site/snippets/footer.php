    </div><!-- /content -->
  </div><!-- /page -->

  <div id="footer" class="node-footer">
    <div class="node-container">
      <p>&copy; <?= date('Y') ?> <?= $site->title()->html() ?> / Built with <a href="https://getkirby.com">Kirby</a></p>
    </div>
  </div>

  <!-- Lazy loading script -->
  <script src="/assets/js/lazyload.js" async></script>
  
  <!-- Theme toggle script -->
  <script>
    (function() {
      const themeToggle = document.getElementById('theme-toggle');
      const html = document.documentElement;
      
      function updateThemeIcon(theme) {
        themeToggle.classList.toggle('is-light', theme === 'light');
      }
      
      // Initialize icon based on current theme
      updateThemeIcon(html.getAttribute('data-theme') || 'dark');
      
      themeToggle.addEventListener('click', function() {
        const currentTheme = html.getAttribute('data-theme') || 'dark';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateThemeIcon(newTheme);
      });
    })();
  </script>
  
  <!-- Reading Progress Bar script -->
  <script>
    (function() {
      const progressBar = document.querySelector('.reading-progress-bar');
      if (!progressBar) return;
      
      function updateProgress() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        progressBar.style.width = progress + '%';
      }
      
      window.addEventListener('scroll', updateProgress, { passive: true });
      window.addEventListener('resize', updateProgress);
      updateProgress();
    })();
  </script>
  
  <!-- Prism.js for Syntax Highlighting -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-javascript.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-css.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-bash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-yaml.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
</body>
</html>
