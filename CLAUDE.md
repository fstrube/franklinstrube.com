# CLAUDE.md

Personal blog and portfolio site for Franklin Strube at franklinstrube.com.

## Tech Stack

- **Backend:** Laravel 11, PHP 8.2+
- **Frontend (public):** Blade templates, jQuery, highlight.js, vanilla CSS (no Tailwind on public pages)
- **Frontend (admin):** Blade templates, jQuery, CodeMirror (markdown editor), custom CSS
- **Frontend (tools):** Vue 3 + Inertia.js (used for `/tools/markdown-to-pdf`)
- **CSS:** Custom CSS (`resources/css/theme.css`, `resources/css/code.css`), normalize.css, responsive.css. Tailwind is configured but only used in Blade/Vue content paths.
- **Build:** Vite with `laravel-vite-plugin` and `@vitejs/plugin-vue`
- **Database:** SQLite (default)
- **Auth:** Laravel Fortify (two-factor support)
- **Markdown:** League CommonMark (GitHub-flavored) with Attributes extension, registered as `app('markdown')` singleton
- **Deployment:** `npx @frakjs/frak` (rsync-based), config in `.frak`

## Commands

### Development

```bash
composer dev          # Start server, queue, logs (pail), and vite concurrently
php artisan serve     # Laravel dev server only
npm run dev           # Vite dev server only
npm run build         # Production build
```

### Testing & Linting

```bash
php artisan test              # Run PHPUnit tests
./vendor/bin/phpunit          # Run PHPUnit directly
./vendor/bin/pint             # PHP code style fixer (Laravel Pint / PSR-12)
npx eslint resources/js/      # ESLint for JS files
```

### Database

```bash
php artisan migrate           # Run migrations
php artisan migrate:fresh     # Drop all tables and re-migrate
php artisan tinker            # Interactive REPL
```

### Deployment

```bash
npx @frakjs/frak                          # Deploy to dev (franklinstrube.com dev server)
npx @frakjs/frak env=production           # Deploy to production
```

## Project Structure

```
app/
  Http/Controllers/           # Public controllers (Home, Posts, Projects, Tags, Sitemap, Robots)
  Http/Controllers/Admin/     # Admin CRUD controllers (Posts, Tags, Settings, UserProfile)
  Http/Controllers/Tools/     # Tool controllers (MarkdownToPdf - Inertia/Vue)
  Models/                     # BlogPost, Tag, User
  Providers/                  # AppServiceProvider (markdown singleton, route model binding)
  View/Components/            # Blade components (Grid, Pagination, Timestamp)
resources/
  css/                        # Public CSS (app.css, theme.css, code.css) and admin CSS
  js/                         # Public JS (app.js), admin JS (admin.js), Vue/Inertia (inertia/)
  views/
    layouts/                  # default.blade.php (public), admin.blade.php, admin-auth.blade.php
    pages/                    # Public pages: home, post, projects, tag
    admin/                    # Admin views (posts CRUD)
    components/               # Blade components (article, grid, aside, pagination, etc.)
    tools/                    # Tool views (markdown-to-pdf)
routes/web.php                # All routes (public, tools, admin group with auth middleware)
database/migrations/          # Users, cache, jobs, blog_posts, tags, two_factor
```

## Key Patterns

- **Route model binding:** `BlogPost` resolves by `slug` field (bound in AppServiceProvider)
- **Tag** resolves by `name` field (via `getRouteKeyName()`)
- **Polymorphic tagging:** Tags use `morphToMany`/`morphedByMany` through `taggables_tags` pivot table
- **Blog content:** Stored as markdown, converted to HTML via `$post->html` accessor using CommonMark
- **Excerpts:** Split on `<!--more-->` comment or truncated to 200 chars
- **Published scope:** `BlogPost::published()` filters by `published_at` being non-null and optionally before a date
- **Admin routes:** Prefixed with `/admin`, grouped under `auth` middleware, named `admin.*`
- **Vite entry points:** `app.css`, `admin.css`, `app.js`, `admin.js`, `markdown-to-pdf.js`, `markdown-to-pdf.css`

## Environment

- Copy `.env.example` to `.env` and run `php artisan key:generate`
- Default DB is SQLite (`database/database.sqlite`)
- See `.env.example` for available configuration options
