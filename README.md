# Laravel 13 + Livewire 4 + Spatie Permission Starter

A starter project for building Laravel applications with **Laravel 13**,
**Livewire 4**, and **Spatie Laravel Permission 8**.

Use this repository as a starting point for applications that need
role-based access control (RBAC) with Laravel's authentication and
authorization features.

## Tech Stack

-   [Laravel 13](https://laravel.com/)
-   [Livewire 4](https://livewire.laravel.com/)
-   [Spatie Laravel Permission
    8](https://spatie.be/docs/laravel-permission)
-   PHP and a supported database engine

## Features

-   Laravel application foundation
-   Livewire 4 integration
-   Spatie roles and permissions package integration
-   Role- and permission-based authorization using Laravel's
    authorization features

> This repository provides the foundation and package integration. Add
> or customize role-management screens, user interfaces, seeders, and
> application-specific access rules to suit your project.

## Requirements

Check the official Laravel 13 and package documentation for the exact
supported PHP and database versions.

You will need:

-   PHP version supported by Laravel 13
-   Composer
-   Node.js and npm
-   MySQL/MariaDB or another database supported by Laravel

For MySQL/MariaDB, use **InnoDB** as the storage engine. It supports
larger index keys than MyISAM and is the recommended choice for typical
Laravel applications.

## Installation

Clone the repository:

``` bash
git clone https://github.com/YOUR-USERNAME/laravel-livewire-rbac-starter.git
cd laravel-livewire-rbac-starter
```

Install PHP dependencies:

``` bash
composer install
```

Install frontend dependencies and build assets:

``` bash
npm install
npm run build
```

Create your environment file:

``` bash
cp .env.example .env
```

Generate the application key:

``` bash
php artisan key:generate
```

Configure your database connection in `.env`, then run the migrations:

``` bash
php artisan migrate
```

Publish Spatie Permission's configuration and migration files if they
have not already been published in this project:

``` bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Then run migrations:

``` bash
php artisan migrate
```

If the package configuration and migration files are already committed
in this repository, you do not need to publish them again.

Start the development server:

``` bash
composer run dev
```

## Using Roles and Permissions

Spatie Laravel Permission provides APIs for assigning roles and
permissions and checking authorization.

For example:

``` php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Create a permission
$permission = Permission::create([
    'name' => 'edit articles',
]);

// Create a role
$role = Role::create([
    'name' => 'editor',
]);

// Assign the permission to the role
$role->givePermissionTo($permission);

// Assign the role to a user
$user->assignRole('editor');

// Check a user's role or permission
$user->hasRole('editor');
$user->can('edit articles');
```

Refer to the [Spatie Laravel Permission
documentation](https://spatie.be/docs/laravel-permission) for guards,
teams, middleware, caching, and advanced usage.

## Configuration

Review `config/permission.php` and adjust the package settings to your
application's needs.

After changing permission configuration or role/permission data, you can
clear the permission cache with:

``` bash
php artisan permission:cache-reset
```

## Contributing

Contributions, suggestions, and bug reports are welcome. Feel free to
open an issue or submit a pull request.

## License

Choose and add a license before publishing this repository. If you want
others to reuse and modify the project, consider an open-source license
such as the MIT License.
