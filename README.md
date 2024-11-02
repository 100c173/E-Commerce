# Laravel E-commerce Management System#


## Description
This project is a simple e-commerce management system built with **Laravel 10**. The system includes **an admin** dashboard for managing products, categories, and orders and **a customer** view for browsing and purchasing products. **Laravel Sanctum** is used for API authentication to secure the application endpoints, and **Laravel UI** provides an authentication setup for users.

-----------------------------------------------------------------
## Key Models:
-   **Users** (roles: Admin, Customer)
-   **Products**
-   **Categories**
-   **Orders**
----------------------------------------------------------------
##  Setup Instructions:

**Prerequisites :**
    **PHP 8.0+**
    **Composer**
    **Laravel 10**
    **MySQL or other supported databases**

**Run migrations and seeders:**
    php artisan migrate --seed
    **Note: The seeders include an Admin user to access the dashboard.**

# Seeding Data:
The database seeder creates the following initial data:
    **Admin User:** Can be accessed with the credentials set in the AdminSeeder.
    **Sample Categories and Products:** To populate the e-commerce catalog.

----------------------------------------------------------------
## Models and Relationships

## User Roles
  **Admin:** Has access to the dashboard for managing categories, products, and viewing orders.
  **Customer:** Can browse products and place orders.

## Relationships
   **Product - Category:** Many-to-many.
   **Order - User:** Each order is placed by a single user and linked to a single product.

## Middleware and Access Control
  **AdminMiddleware:** Redirects users based on their roles.
     -Only admin users can access the **/dashboard** routes.
  **Sanctum Middleware:** Secures API endpoints for authenticated access.

----------------------------------------------------------------
### API Endpoints
   The following API routes are secured using Laravel Sanctum and allow both customers and admins to interact with the system.

  ## Authentication Routes
-   Login: **/api/login** (POST)
-   Register: **/api/register** (POST)
-   Logout: **/api/logout** (POST)

   ## Product Routes
-   List All Products: **/api/products** (GET)
-   List Products by Category: **/api/products/category/{id}** (GET)
-   Admin Product Management: CRUD operations for products **(Admin-only)**

   ## Order Routes
-   Place an Order: **/api/orders** (POST)
-   View Orders: **/api/orders** (GET) - **(Only the current user requests)**

----------------------------------------------------------------
## Admin Dashboard
The Admin Dashboard is accessible at **/dashboard** and includes sections for managing:

**Products:** Add, update, delete **(soft delete enabled)**, and **restore products**.
**Categories:** Add, update, delete categories.
**Orders:** View all customer orders.

**Customer View**
  Customers can:
    **Browse the product catalog.**
    **Place orders through the API.**

----------------------------------------------------------------

## ApiPostman
https://api.postman.com/collections/38893521-7d6c3f8a-bfaa-4618-84a6-2e0a431c2280?access_key=PMAT-01JB9ZXGBCSFACTAE41XTR1Y28
