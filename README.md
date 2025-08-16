# Laravel CRM

A simple Customer Relationship Management (CRM) system built with Laravel.

## Features

- Customer CRUD (Create, Read, Update, Delete)
- Notes for each customer
- Tag system (many-to-many)
- Authentication with Laravel Breeze
- Tailwind CSS frontend

## Tech Stack

- Laravel 11
- Laravel Breeze (authentication)
- Tailwind CSS
- MySQL

## Setup Instructions

```bash
git clone https://github.com/Iliyakarimi020304/laravel-crm.git
cd your-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
