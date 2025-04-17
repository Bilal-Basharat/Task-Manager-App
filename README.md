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

### 4. Run the MySQL server and create the database there 

### 5. Configure your database in .env:
DB_CONNECTION=mysql \
DB_HOST=127.0.0.1 \
DB_PORT=3306 \
DB_DATABASE= database_name (put the database name here which you have created on the MySQL server) \
DB_USERNAME= root  \
DB_PASSWORD= setup_a_password (if you want to setup the password then create on the MySQL server and put the password here)

### 6. Run migrations (to create tables in the database):
php artisan migrate

### 7. Compile assets:
npm run dev

## Execution

### 1. Start the development server:
#### Run the following commands on the console to execute the application:
php artisan serve \
npm run dev \
Run MySQL Server

### 2. Access the application at:
http://localhost:8000

## Acknowledgments
Laravel community \
SortableJS developers \
All contributors 