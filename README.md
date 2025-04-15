# Task Management Application - Laravel
A simple task management application built with Laravel, featuring drag-and-drop prioritization and project organization.

## Features
✅ Create, edit, and delete tasks \
🏷️ Assign tasks to projects \
🔄 Drag-and-drop task prioritization \
🗂️ Filter tasks by project \
📊 Automatic priority management \
🎨 Clean, responsive Bootstrap UI \

## Requirements
PHP 8.0+
Composer
MySQL 5.7+
Node.js 14+
npm

## Installation
### 1. Clone the repository:
git clone https://github.com/yourusername/laravel-task-manager.git
cd laravel-task-manager

### 2. Install PHP dependencies:
composer install

### 3. Install JavaScript dependencies:
npm install

### 4. Configure your database in .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= database_name
DB_USERNAME= root
DB_PASSWORD= setup_a_password

### 5. Run migrations:
php artisan migrate

### 6. Compile assets:
npm run dev

### 6. run in development environment:
php artisan serve \
npm run dev

## Usage

### 1. Start the development server:
php artisan serve

### 2. Access the application at:
http://localhost:8000

## Acknowledgments
Laravel community
SortableJS developers
All contributors
