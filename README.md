<h1 align="center" style="color: #3498db;">Pharmacy CRUD Application</h1>

<p style="font-size: 16px; line-height: 1.6;">
  This is a CRUD (Create, Read, Update, Delete) application built with Laravel for managing medications and customers in a pharmacy.
</p>

<h2 style="color: #2c3e50;">Instructions for Running Locally</h2>

<h3 style="color: #2980b9;">Prerequisites</h3>

<ul style="list-style-type: square;">
  <li>PHP >= 7.3</li>
  <li>Composer</li>
  <li>SQLite or MySQL database</li>
  <li>Node.js and npm (optional, for front-end assets)</li>
</ul>

<h3 style="color: #2980b9;">Setup Instructions</h3>

<ol>
  <li>Clone the repository:
    <code style="background-color: #ecf0f1; padding: 2px 4px;">git clone https://github.com/LahiruSandaruwan/pharmacyCRUD.git</code>
  </li>
  <li>Navigate to the project directory:
    <code style="background-color: #ecf0f1; padding: 2px 4px;">cd pharmacyCRUD</code>
  </li>
  <li>Install PHP dependencies using Composer:
    <code style="background-color: #ecf0f1; padding: 2px 4px;">composer install</code>
  </li>
  <li>Create a new <code style="background-color: #ecf0f1;">.env</code> file based on the provided <code style="background-color: #ecf0f1;">.env.example</code>.</li>
  <li>Generate an application key:
    <code style="background-color: #ecf0f1; padding: 2px 4px;">php artisan key:generate</code>
  </li>
  <li>Configure the database connection in the <code style="background-color: #ecf0f1;">.env</code> file:
    <pre style="background-color: #ecf0f1; padding: 10px; border-left: 5px solid #2980b9;">DB_CONNECTION=sqlite
DB_DATABASE=/path/to/your/database.sqlite</pre>
    Replace <code>/path/to/your/database.sqlite</code> with the path to your SQLite database file or configure the connection for MySQL or any other database supported by Laravel.
  </li>
  <li>Migrate the database:
    <code style="background-color: #ecf0f1; padding: 2px 4px;">php artisan migrate</code><br>
    If you have seeded data, you can run:
    <code style="background-color: #ecf0f1; padding: 2px 4px;">php artisan db:seed</code>
  </li>
</ol>

<h3 style="color: #2980b9;">Running the Application</h3>

<p>Start the development server:
  <code style="background-color: #ecf0f1; padding: 2px 4px;">php artisan serve</code>
</p>

<p>You can now access the application at <a href="http://localhost:8000" style="color: #3498db;">http://localhost:8000</a>.</p>

<h2 style="color: #2c3e50;">Routes</h2>

<p>This application provides the following routes for API access:</p>

<!-- Similar structure for Routes, Used Technologies, Contributing, and License sections -->
<ul style="list-style-type: none;">
  <li><strong style="color: #2980b9;">Authentication:</strong>
    <ul>
      <li>POST <code style="background-color: #ecf0f1; padding: 2px 4px;">/login</code>: User authentication</li>
      <li>POST <code style="background-color: #ecf0f1; padding: 2px 4px;">/logout</code>: User logout</li>
    </ul>
  </li>
  <li><strong style="color: #2980b9;">Users:</strong>
    <ul>
      <li>GET <code style="background-color: #ecf0f1; padding: 2px 4px;">/users</code>: List all users</li>
      <li>POST <code style="background-color: #ecf0f1; padding: 2px 4px;">/users</code>: Create a new user</li>
      <li>GET <code style="background-color: #ecf0f1; padding: 2px 4px;">/users/{user}</code>: Retrieve a specific user</li>
      <li>PUT <code style="background-color: #ecf0f1; padding: 2px 4px;">/users/{user}</code>: Update a user</li>
      <li>DELETE <code style="background-color: #ecf0f1; padding: 2px 4px;">/users/{user}</code>: Delete a user</li>
    </ul>
    <p><strong style="color: #2980b9;">Sample Payload (POST /users):</strong></p>
    <pre style="background-color: #ecf0f1; padding: 10px; border-left: 5px solid #2980b9;">{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "role": "user"
}</pre>
  </li>
  <li><strong style="color: #2980b9;">Medications:</strong>
    <ul>
      <li>GET <code style="background-color: #ecf0f1; padding: 2px 4px;">/medications</code>: List all medications</li>
      <li>POST <code style="background-color: #ecf0f1; padding: 2px 4px;">/medications</code>: Create a new medication</li>
      <li>GET <code style="background-color: #ecf0f1; padding: 2px 4px;">/medications/{medication}</code>: Retrieve a specific medication</li>
      <li>PUT <code style="background-color: #ecf0f1; padding: 2px 4px;">/medications/{medication}</code>: Update a medication</li>
      <li>DELETE <code style="background-color: #ecf0f1; padding: 2px 4px;">/medications/{medication}</code>: Delete a medication</li>
    </ul>
    <p><strong style="color: #2980b9;">Sample Payload (POST /medications):</strong></p>
    <pre style="background-color: #ecf0f1; padding: 10px; border-left: 5px solid #2980b9;">{
  "name": "Aspirin",
  "description": "Pain reliever",
  "quantity": 100
}</pre>
  </li>
  <li><strong style="color: #2980b9;">Customers:</strong>
    <ul>
      <li>GET <code style="background-color: #ecf0f1; padding: 2px 4px;">/customers</code>: List all customers</li>
      <li>POST <code style="background-color: #ecf0f1; padding: 2px 4px;">/customers</code>: Create a new customer</li>
      <li>GET <code style="background-color: #ecf0f1; padding: 2px 4px;">/customers/{customer}</code>: Retrieve a specific customer</li>
      <li>PUT <code style="background-color: #ecf0f1; padding: 2px 4px;">/customers/{customer}</code>: Update a customer</li>
      <li>DELETE <code style="background-color: #ecf0f1; padding: 2px 4px;">/customers/{customer}</code>: Delete a customer</li>
    </ul>
    <p><strong style="color: #2980b9;">Sample Payload (POST /customers):</strong></p>
    <pre style="background-color: #ecf0f1; padding: 10px; border-left: 5px solid #2980b9;">{
  "name": "Alice Smith",
  "email": "alice@example.com",
  "phone_number": "123-456-7890",
  "gender": "female",
  "allergies": "none"
}</pre>
  </li>
</ul>

<h2 style="color: #2c3e50;">Used Technologies</h2>

<ul style="list-style-type: circle;">
  <li>Laravel Framework</li>
  <li>PHP</li>
  <li>SQLite (or MySQL)</li>
  <li>Composer</li>
  <li>Node.js and npm (optional for compiling front-end assets)</li>
</ul>

<h2 style="color: #2c3e50;">Contributing</h2>

<p>Contributions are welcome! Please read the <a href="https://laravel.com/docs/contributions" style="color: #3498db;">contribution guide</a> for details.</p>

<h2 style="color: #2c3e50;">License</h2>

<p>This project is open-source and licensed under the MIT License. For more information, please see the <a href="LICENSE" style="color: #3498db;">LICENSE</a> file.</p>
