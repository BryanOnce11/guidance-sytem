# Guidance System

## Requirements

### PHP

-   Version 8.1
-   Documentation: https://www.php.net

### Composer

-   Version >2.7.1
-   Documentation: https://getcomposer.org/doc/

### Laravel framework

-   Version 10
-   Documentation: https://laravel.com/docs/8.x/

---

## Initial Setup

```bash
# Clone the repo
git clone https://github.com/BryanOnce11/guidance-sytem.git

# Setup the .env file by copying the .env.example
cp .env.example .env # Configure the .env file after making a copy

# Generate a new application key
# This command sets the APP_KEY in your .env file, which is used for encryption
php artisan key:generate

# Install the composer dependencies
composer install

# Create a symlink for Laravel storage
php artisan storage:link

# Install the NPM dependencies
npm ci --legacy-peer-deps

# Build Laravel Mix
yarn run dev
```

### How to run migrations?

```bash
php artisan migrate --seed
```

### How to serve the project locally?

```bash
php artisan serve
```
