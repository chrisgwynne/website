# Personal Blog

Minimalist, text-focused blog built with [Kirby CMS](https://getkirby.com).

## Design

Inspired by N-O-D-E — monochrome aesthetic, Share Tech Mono typography, maximum readability.

## Tech Stack

- **CMS:** Kirby 5
- **Styling:** Tailwind CSS
- **Comments:** Giscus (GitHub Discussions)
- **Search:** Built-in Kirby search
- **RSS:** /feed

## Development

```bash
# Install dependencies
composer install
npm install

# Build CSS
npm run build

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

----

Post content here...
```

## License

Personal blog — custom code under MIT License. Kirby CMS requires a [license](https://getkirby.com/buy) for production use.
