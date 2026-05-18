# Repository Guidelines

## Project Structure & Module Organization
This is a **Laravel 9** application designed for stock and archive management. It follows the standard Laravel directory structure:
- **`.\app\Http\Controllers`**: Contains resource controllers for various modules (Archive, Diesel, Computer, Censorship, etc.).
- **`.\app\Models`**: Eloquent models for data entities.
- **`.\resources\views`**: Blade templates, organized by module folders.
- **`.\routes\web.php`**: Main entry point for web routes, utilizing resource routing extensively.

The application uses **Vite** for asset bundling and **Tailwind CSS** with **Alpinejs** for the frontend.

## Build, Test, and Development Commands
### Development
- **Run Dev Server**: `php artisan serve`
- **Frontend Assets (Watch)**: `npm run dev`
- **Build Assets**: `npm run build`

### Database
- **Run Migrations**: `php artisan migrate`
- **Seed Database**: `php artisan db:seed`

### Testing & Quality
- **Run Tests**: `php artisan test` or `vendor\bin\phpunit`
- **Format Code**: `vendor\bin\pint` (uses Laravel Pint)

## Coding Style & Naming Conventions
- **PHP**: Follows PSR-12 standards via **Laravel Pint**.
- **Indentation**: 4 spaces for most files, 2 spaces for YAML (as per `.\.editorconfig`).
- **Naming**: Use camelCase for methods and variables in PHP; PascalCase for Classes and Models.
- **Views**: Blade templates should use kebab-case for filenames.

## Testing Guidelines
- **Framework**: PHPUnit.
- **Organization**: Feature tests reside in `.\tests\Feature`, and Unit tests in `.\tests\Unit`.
- **Note**: Ensure database migrations are up to date before running feature tests.

## Commit Guidelines
- Maintain concise and descriptive commit messages.
- Avoid large, monolithic commits; prefer smaller, focused changes.
