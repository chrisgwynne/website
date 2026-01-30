# Personal Blog

Minimalist, text-focused blog built with [Kirby CMS](https://getkirby.com).

## Design

Inspired by N-O-D-E — monochrome aesthetic, Share Tech Mono typography, maximum readability.

## Features

### Content
- **Article pages** with reading time estimation
- **Related posts** shown at bottom of articles (based on shared tags)
- **Archive page** grouping posts by year and month
- **Search functionality** for finding content
- **RSS Feed** at `/feed`

### Performance & SEO
- **Lazy loading** for images with blur-up placeholder effect
- **Responsive images** with automatic srcset generation
- **Sitemap.xml** auto-generated for search engines
- **OpenGraph/Twitter Card** meta tags for social sharing
- **Cache headers** optimized for static assets
- **Gzip compression** enabled

### Developer Experience
- **Syntax highlighting** via Prism.js (supports PHP, JS, CSS, Bash, YAML, JSON)
- **GitHub Actions CI/CD** workflow for automated builds and deployment
- **Tailwind CSS** for styling with custom N-O-D-E theme

### Error Handling
- **Custom 404 page** with helpful navigation and search

## Tech Stack

- **CMS:** Kirby 5
- **Styling:** Tailwind CSS
- **Comments:** Giscus (GitHub Discussions)
- **Search:** Built-in Kirby search
- **RSS:** `/feed`
- **Sitemap:** `/sitemap.xml`
- **Archive:** `/archive`

## Development

```bash
# Install dependencies
composer install
npm install

# Build CSS
npm run build:css

# Watch CSS for changes
npm run watch:css

# Local dev server
php -S localhost:8000 kirby/router.php
```

## Content

Posts live in `content/blog/`. Each post is a text file with YAML frontmatter:

```markdown
Title: My Post
Date: 2026-01-30
Category: Technology
Tags: tag1, tag2
Cover: my-image.jpg

----

Post content here...
```

### Images

Upload images to the article folder. Use the `Cover` field for featured images:

```markdown
Cover: my-photo.jpg
```

Images automatically get:
- Lazy loading with blur-up effect
- Responsive srcset generation
- Alt text from filename or explicit `Alt` field

### Code Blocks

Use fenced code blocks with language specification for syntax highlighting:

```markdown
```php
<?php echo "Hello World";
```
```

Supported languages: PHP, JavaScript, CSS, Bash, YAML, JSON

## Deployment

The repository includes a GitHub Actions workflow (`.github/workflows/deploy.yml`) that:
- Builds CSS on every push
- Runs Kirby health checks
- Creates build artifacts
- Can deploy via rsync (configure secrets to enable)

### Required Secrets for Deployment

- `DEPLOY_USER` - SSH username for server
- `DEPLOY_HOST` - Server hostname
- `DEPLOY_PATH` - Path on server
- `SSH_PRIVATE_KEY` - Private key for authentication

## License

Personal blog — custom code under MIT License. Kirby CMS requires a [license](https://getkirby.com/buy) for production use.
