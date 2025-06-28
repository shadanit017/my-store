<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

# 🎯 Laravel 12 - Stripe Product Purchase App (Laravel Cashier)

This Laravel 12 application allows users to browse products, pay using Stripe (via Laravel Cashier), and track transactions.

---

## 🧱 Requirements

- PHP >= 8.2  
- MySQL >= 5.7.8 or MariaDB >= 10.2.7  
- Composer  
- Node.js & npm  
- Stripe test account

---

## 🧑‍💻 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/shadanit017/my-store.git
cd my-store

```

## Install Dependencies

```bash
composer install
npm install && npm run build
```
## Setup Environment File

```bash
cp .env.example .env
php artisan key:generate

```

## Update your .env with DB and Stripe keys:
```bash
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...

```

## Migrate and Seed the Database
```bash
php artisan migrate --seed
```

## Run the Application
```bash
php artisan serve
```

## 💳 How to Test Payments
```bash
Card Number: 4242 4242 4242 4242
Exp: 12/34
CVC: 123
```
