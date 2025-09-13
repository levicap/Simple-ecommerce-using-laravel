🛒 Simple E-Commerce App (Laravel)

A basic e-commerce platform built with Laravel.
Features include product browsing, shopping cart, checkout, and order management.

✨ Features

👕 Product Management – Add, edit, delete, and list products.

🛒 Shopping Cart – Add/remove products from the cart.

💳 Checkout System – Place orders with billing/shipping info.

🔐 Authentication – User registration & login.

📦 Order Management – Users can view their order history.

⚡ Admin Dashboard – Manage products and orders.

🛠️ Tech Stack

Framework: Laravel

Database: MySQL / MariaDB

Frontend: Blade templates, Bootstrap/Tailwind CSS

Authentication: Laravel Breeze / Jetstream

Payment (optional): Stripe / PayPal

🚀 Getting Started
1. Clone the Repository
git clone https://github.com/your-username/simple-laravel-ecommerce.git
cd simple-laravel-ecommerce

2. Install Dependencies
composer install
npm install && npm run dev

3. Configure Environment

Copy .env.example to .env and update:

APP_NAME="SimpleEcommerce"
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=

4. Generate App Key
php artisan key:generate

5. Run Migrations & Seeders
php artisan migrate --seed

6. Serve the Application
php artisan serve


App will run on http://localhost:8000
.
