<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy CRUD API</title>
</head>

<body>
    <div align="center">
        <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
    </div>

    <div align="center">
        <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
        <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
        <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
        <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
    </div>

    <h2 align="center">🚀 Pharmacy CRUD API</h2>

    <p>Welcome to Pharmacy CRUD API, a Laravel-powered web application for managing medication and customer records.</p>

    <h2 align="center">🛠️ Used Technologies</h2>

    <ul>
        <li>Laravel Framework</li>
        <li>PHP</li>
        <li>SQLite</li>
        <li>JWT Authentication</li>
    </ul>

    <h2 align="center">📋 Routes</h2>

    <p>Check out the API routes provided by this application:</p>

    <h3>Public Routes</h3>
    <ul>
        <li><strong>POST</strong> /login</li>
    </ul>

    <h3>Protected Routes</h3>
    <ul>
        <li><strong>POST</strong> /logout</li>
        <li><strong>GET</strong> /users</li>
        <li><strong>POST</strong> /users</li>
        <li><strong>GET</strong> /users/{user}</li>
        <li><strong>PUT</strong> /users/{user}</li>
        <li><strong>DELETE</strong> /users/{user}</li>
        <li><strong>GET</strong> /medications</li>
        <li><strong>POST</strong> /medications</li>
        <li><strong>GET</strong> /medications/{medication}</li>
        <li><strong>PUT</strong> /medications/{medication}</li>
        <li><strong>DELETE</strong> /medications/{medication}</li>
        <li><strong>GET</strong> /customers</li>
        <li><strong>POST</strong> /customers</li>
        <li><strong>GET</strong> /customers/{customer}</li>
        <li><strong>PUT</strong> /customers/{customer}</li>
        <li><strong>DELETE</strong> /customers/{customer}</li>
    </ul>

    <h3>Sample Payloads</h3>
    <details>
        <summary>Login Payload</summary>
        <pre>
        {
          "email": "example@example.com",
          "password": "your_password"
        }
      </pre>
    </details>

    <details>
        <summary>User Payload</summary>
        <pre>
        {
          "name": "John Doe",
          "email": "john@example.com",
          "password": "password123",
          "role": "admin"
        }
      </pre>
    </details>

    <details>
        <summary>Medication Payload</summary>
        <pre>
        {
          "name": "Aspirin",
          "description": "Pain relief medication",
          "quantity": 100
        }
      </pre>
    </details>

    <details>
        <summary>Customer Payload</summary>
        <pre>
        {
          "name": "Jane Doe",
          "email": "jane@example.com",
          "phone_number": "1234567890",
          "gender": "female",
          "allergies": "Peanuts"
        }
      </pre>
    </details>

    <h2 align="center">🚀 Running the Project Locally</h2>

    <h3>Prerequisites</h3>
    <ul>
        <li>PHP >= 7.4</li>
        <li>Composer</li>
        <li>SQLite</li>
    </ul>

    <h3>Setup Instructions</h3>

    <ol>
        <li>Clone the repository:</li>
        <pre>git clone https://github.com/LahiruSandaruwan/pharmacyCRUD.git</pre>

        <li>Navigate to the project directory:</li>
        <pre>cd pharmacyCRUD</pre>

        <li>Install dependencies:</li>
        <pre>composer install</pre>

        <li>Create a copy of the `.env.example` file and rename it to `.env`:</li>
        <pre>cp .env.example .env</pre>

        <li>Generate application key:</li>
        <pre>php artisan key:generate</pre>

        <li>Run migrations to create the database schema:</li>
        <pre>php artisan migrate</pre>

        <li>Start the development server:</li>
        <pre>php artisan serve</pre>
    </ol>

    <p>You can now access the application at <a href="http://localhost:8000" target="_blank">http://localhost:8000</a>.</p>

    <h2 align="center">🔒 License</h2>

    <p align="center">This project is open-sourced and licensed under the <a href="https://opensource.org/licenses/MIT" target="_blank">MIT license</a>.</p>
</body>

</html>
