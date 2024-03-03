<h1 align="center">Pharmacy CRUD Application</h1>

<p>This is a CRUD (Create, Read, Update, Delete) application built with Laravel for managing medications and customers in a pharmacy.</p>

<h2>Instructions for Running Locally</h2>

<h3>Prerequisites</h3>

<ul>
  <li>PHP >= 7.3</li>
  <li>Composer</li>
  <li>SQLite or MySQL database</li>
  <li>Node.js and npm (optional, for front-end assets)</li>
</ul>

<h3>Setup Instructions</h3>

<ol>
  <li>Clone the repository:
    <code>git clone https://github.com/LahiruSandaruwan/pharmacyCRUD.git</code>
  </li>
  <li>Navigate to the project directory:
    <code>cd pharmacyCRUD</code>
  </li>
  <li>Install PHP dependencies using Composer:
    <code>composer install</code>
  </li>
  <li>Create a new <code>.env</code> file based on the provided <code>.env.example</code>.</li>
  <li>Generate an application key:
    <code>php artisan key:generate</code>
  </li>
  <li>Configure the database connection in the <code>.env</code> file:
    <pre>DB_CONNECTION=sqlite
DB_DATABASE=/path/to/your/database.sqlite</pre>
    Replace <code>/path/to/your/database.sqlite</code> with the path to your SQLite database file or configure the connection for MySQL or any other database supported by Laravel.
  </li>
  <li>Migrate the database:
    <code>php artisan migrate</code><br>
    If you have seeded data, you can run:
    <code>php artisan db:seed</code>
  </li>
</ol>

<h3>Running the Application</h3>

<p>Start the development server:
  <code>php artisan serve</code>
</p>

<p>You can now access the application at <a href="http://localhost:8000">http://localhost:8000</a>.</p>

<h2>Routes</h2>

<p>This application provides the following routes for API access:</p>

<ul>
  <li><strong>Authentication:</strong>
    <ul>
      <li>POST <code>/login</code>: User authentication</li>
      <li>POST <code>/logout</code>: User logout</li>
    </ul>
  </li>
  <li><strong>Users:</strong>
    <ul>
      <li>GET <code>/users</code>: List all users</li>
      <li>POST <code>/users</code>: Create a new user</li>
      <li>GET <code>/users/{user}</code>: Retrieve a specific user</li>
      <li>PUT <code>/users/{user}</code>: Update a user</li>
      <li>DELETE <code>/users/{user}</code>: Delete a user</li>
    </ul>
    <p><strong>Sample Payload (POST /users):</strong></p>
    <pre>{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "role": "user"
}</pre>
  </li>
  <li><strong>Medications:</strong>
    <ul>
      <li>GET <code>/medications</code>: List all medications</li>
      <li>POST <code>/medications</code>: Create a new medication</li>
      <li>GET <code>/medications/{medication}</code>: Retrieve a specific medication</li>
      <li>PUT <code>/medications/{medication}</code>: Update a medication</li>
      <li>DELETE <code>/medications/{medication}</code>: Delete a medication</li>
    </ul>
    <p><strong>Sample Payload (POST /medications):</strong></p>
    <pre>{
  "name": "Aspirin",
  "description": "Pain reliever",
  "quantity": 100
}</pre>
  </li>
  <li><strong>Customers:</strong>
    <ul>
      <li>GET <code>/customers</code>: List all customers</li>
      <li>POST <code>/customers</code>: Create a new customer</li>
      <li>GET <code>/customers/{customer}</code>: Retrieve a specific customer</li>
      <li>PUT <code>/customers/{customer}</code>: Update a customer</li>
      <li>DELETE <code>/customers/{customer}</code>: Delete a customer</li>
    </ul>
    <p><strong>Sample Payload (POST /customers):</strong></p>
    <pre>{
  "name": "Alice Smith",
  "email": "alice@example.com",
  "phone_number": "123-456-7890",
  "address": "123 Main St, City, Country"
}</pre>
  </li>
</ul>

<h2>Contributing</h2>

<p>Contributions are welcome! Please read the <a href="https://laravel.com/docs/contributions">contribution guide</a> for details.</p>

<h2>License</h2>

<p>This project is open-source and licensed under the <a href="https://opensource.org/licenses/MIT">MIT License</a>.</p>
