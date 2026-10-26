# Halcon Web Application

## Description

Halcon Web Application is a web application developed for a construction material distributor. Its purpose is to manage internal customer orders and allow customers to check the status of their orders.

Customers can search for an order using its **invoice number** without logging in. The application displays the current order status, process information, and photographic evidence when applicable.

The application was developed using **Laravel 7, PHP, MySQL, Blade, and HTML**.

## Order Status

The application manages four order statuses:

- **Ordered:** The order has been registered by the Sales department.
- **In Process:** The Warehouse department is preparing the order or Purchasing is obtaining missing materials.
- **In Route:** The order is being prepared for delivery or is on its way to the customer.
- **Delivered:** The order has been delivered to the customer.

## User Roles

The administrative system includes the following roles:

- **Administrator:** Manages users and assigns roles.
- **Sales:** Registers customer orders.
- **Purchasing:** Handles purchasing activities.
- **Warehouse:** Handles warehouse activities and order preparation.
- **Route:** Handles deliveries and photographic evidence.

## Main Features

### Public Features

- Search for orders using an invoice number.
- View the current order status.
- View process information and dates.
- View photographic evidence for orders in route or delivered.

### Administrative Features

- User authentication.
- Administrative dashboard.
- View registered users.
- Create and edit users.
- Assign user roles.
- Activate and deactivate users.
- View customer orders.
- Create new orders.
- Edit order information.
- Update order statuses.
- Associate products with orders.
- Upload photographic evidence.
- Archive orders using logical deletion.
- View archived orders.
- Restore archived orders.

## Database

The application uses a MySQL database named `halcon_db`.

The main database tables are:

- `roles`
- `users`
- `customers`
- `products`
- `orders`
- `order_details`
- `photo_evidences`

The database uses primary keys, foreign keys, and relationships between models.

Laravel migrations are used to create the database structure, while seeders and factories generate sample information for testing.

## Technologies Used

- PHP
- Laravel 7
- MySQL
- Laravel Blade
- HTML
- Composer
- XAMPP
- Visual Studio Code
- Git and GitHub

## Installation

1. Clone the repository.
2. Open the `laravel-app` directory.
3. Install the project dependencies using Composer.
4. Configure the `.env` file with the MySQL database connection.
5. Create a MySQL database named `halcon_db`.
6. Run the database migrations.
7. Run the seeders to generate sample data.
8. Create the public storage link for photographic evidence.
9. Start the Laravel development server.

### Commands

```bash
composer install
```

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

```bash
php artisan storage:link
```

```bash
php artisan serve
```

Before running the commands, create the `.env` file from `.env.example` and configure the database connection.

## Test Administrator Account

After running the database seeders, the following test account can be used:

**Email:** admin@halcon.test  
**Password:** password123

This account is intended for local development and testing only.

## Project Structure

The Laravel application is located inside the `laravel-app` directory.

- `app/` — Models and controllers.
- `database/migrations/` — Database structure.
- `database/seeds/` — Sample data.
- `database/factories/` — Test data generation.
- `resources/views/` — Blade templates.
- `routes/web.php` — Application routes.
- `public/` — Public application files.

## Project Development

This repository contains the analysis, design, and development of the Halcon Web Application for the **Web Application Design** course.

### Evidence 1 — Analysis and Design

The first stage focused on identifying the system requirements and designing the application, including:

- Functional and non-functional requirements.
- Scrum methodology.
- UML diagrams.
- BPMN process diagrams.
- Entity-relationship diagram.
- Database design.
- Wireframes and prototypes.

### Evidence 2 — Application Development

The second stage focused on implementing the application using Laravel 7, including:

- Database migrations and model relationships.
- Controllers and application routes.
- Authentication and administrative views.
- User and order management.
- Order status tracking.
- Photographic evidence.
- Logical deletion and restoration.
- Database seeders and factories.
- Public invoice search.

## Current Status

The main application features have been implemented and tested locally