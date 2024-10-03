# Laravel MVC and API Product catalog application

This project is a Laravel-based web application that serves both as a traditional MVC app and an API for managing comments, products, and user authentication (with admin functionality). This guide will walk you through setting up the project, running migrations, and accessing the application through both the browser (MVC) and API endpoints.

## Prerequisites

Before you begin, ensure you have the following:

- PHP >= 8.x
- Composer
- MySQL or another preferred database
- Node.js & npm
- Postman (optional, for API testing)

## Getting Started

### 1. Clone the repository

Clone the project to your local machine:

```bash
git clone <repository-link>
cd <project-directory>
```

### 2. Install Composer dependencies

Run the following command to install PHP dependencies:

```bash
composer install
```

### 3. Create and configure .env file

Copy the .env.example file to .env.

```bash
cp .env.example .env
```

Open .env and configure your environment variables, especially the following sections:

• Database Configuration: Set your database connection details.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

• App URL: Set the URL for your application.

```bash
APP_URL=http://localhost:8000
```

### 4. Run migrations and seed the database

After setting up the .env file, run the following commands to create the database tables and seed them with some sample data.

```bash
php artisan migrate --seed
```

This will migrate the tables and populate them with some initial data.


### 5. Install Node.js dependencies

Run the following commands to install frontend dependencies (Bootstrap 5, etc.).

```bash
npm install
```

This will compile the assets and serve them in development mode.

### 6. Run the development server

Finally, start the Laravel development server.

```bash
php artisan serve
```

The application will now be available at http://localhost:8000.


### 8. MVC Routes

Here are some of the key MVC routes:

POST /register - Register a new user

POST /login - Login

GET /products - List all products

GET /products/{id} - View a specific product

POST /comments - Add a comment

POST /comments/{id}/approve - Approve a comment (admin only)

POST /comments/{id}/deny - Deny a comment (admin only)

### 9. API Routes

The application includes several API routes for managing products, comments, and authentication. These routes require authentication via a Bearer token, which you can retrieve from the login route.

To simplify API testing, download the Postman collection from this link and import it into Postman. This collection contains all the necessary API routes for the application.


#### API Authentication

After registering a new user or logging in, you'll receive a Bearer token, which you can use for authenticated requests. Attach the token to the Authorization header in Postman, like so:

```bash
Authorization: Bearer <your-token>
```

#### Available API Routes

POST /api/register - Register a new user

POST /api/login - Login and retrieve a Bearer token

GET /api/products - List all products

GET /api/products/{id} - View a specific product

POST /api/comments - Add a comment 

POST /api/comments/{id}/approve - Approve a comment (admin only)

POST /api/comments/{id}/deny - Deny a comment (admin only)

### 10. Troubleshooting

If you encounter issues, consider the following:

• Missing dependencies: Ensure that both Composer and npm dependencies are installed.

• Database connection issues: Double-check your .env file for correct database credentials.

• Cache issues: If you encounter problems with routes or configuration caching, clear caches using:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### Notes

• In database seed, there is predefined admin user. When you log in as admin, you will be redirected to admin dashboard.

Credentials for admin user are:

```bash
email: john@laravel.test
password: password
```

• Default password for all seed users is 'password'.

• In project root folder, you have Product catalog.postman_collection.json file for API testing in Postman (Postman collection file).
