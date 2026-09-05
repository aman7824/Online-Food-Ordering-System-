🍔 Online Food Ordering System

A simple and responsive Online Food Ordering System built using PHP and MySQL. This web-based application allows customers to browse food items, search for dishes, select quantities, and place orders online.

The system also includes a powerful Admin Panel for managing food categories, menu items, customer orders, and administrator accounts.

📌 Project Overview

The Online Food Ordering System is designed for restaurants, cafes, eateries, and canteens that want to manage their food menu and customer orders digitally.

The project consists of two main sections:

👤 Customer Panel – Browse food categories, search food items, and place orders.
🔐 Admin Panel – Manage categories, food items, orders, and administrator accounts.
✨ Features
👨‍💻 Admin Panel
🔐 Secure Admin Login & Logout
📊 Admin Dashboard
📂 Category Management
🍕 Food/Menu Management
🖼️ Food Image Management
📦 Order Management
👥 Admin Account Management
🔑 Update Admin Password
🗑️ Delete Admin Accounts
📋 View Customer Orders
🛒 Customer Panel
🏠 Responsive Landing Page
📂 Browse Food Categories
🍔 View Available Food Items
🔎 Search Food Items
➕ Select Food Quantity
🛍️ Place Food Orders
📱 Responsive User Interface
🖼️ Screenshots
🏠 Landing Page

📂 Category Page

🍔 Foods Page

🛒 Order Form

🔐 Admin Login

📊 Admin Dashboard

📂 Admin Category Records

🍕 Admin Food Records

📦 Admin Order Records

Note: Create a screenshots folder in the project root and place your screenshot images inside it using the filenames mentioned above.

🛠️ Technologies Used
PHP
MySQL
HTML5
CSS3
JavaScript
Bootstrap (if included in the project)
XAMPP / WAMP
📁 Project Structure
Online-Food-Ordering-System/
│
├── admin/
│   ├── dashboard
│   ├── categories
│   ├── foods
│   ├── orders
│   └── users
│
├── databasefiles/
│   └── food_order.sql
│
├── screenshots/
│   ├── landing-page.png
│   ├── category-page.png
│   ├── foods-page.png
│   ├── order-form.png
│   ├── admin-login.png
│   ├── admin-dashboard.png
│   ├── admin-category-records.png
│   ├── admin-food-records.png
│   └── admin-order-records.png
│
├── assets/
├── index.php
└── ...


The exact folder structure may vary depending on the downloaded source-code version.

⚙️ Installation & Setup

Follow these steps to run the project on your local machine.

1. Install XAMPP or WAMP

Install a local development server such as:

XAMPP
WAMP

Make sure Apache and MySQL are available.

2. Download the Project

Download or clone this repository:

git clone https://github.com/your-username/Online-Food-Ordering-System.git

3. Move the Project

For XAMPP, copy the project folder into:

C:\xampp\htdocs\


For WAMP, copy the project folder into:

C:\wamp\www\

4. Start Apache and MySQL

Open the XAMPP/WAMP control panel and start:

Apache
MySQL

5. Create the Database

Open phpMyAdmin:

http://localhost/phpmyadmin


Create a new MySQL database using the database name required by the project.

6. Import the SQL File

Locate:

databasefiles/food_order.sql


Open phpMyAdmin → select your database → Import → choose food_order.sql → click Import.

7. Configure Database Connection

Check the project's database connection/configuration file and update the following values if required:

$host = "localhost";
$username = "root";
$password = "";
$database = "food_order";


Use the database name specified by the SQL file/project configuration if it differs.

🚀 Run the Project

After completing the setup, open your browser.

Customer Panel
http://localhost/web/

Admin Panel
http://localhost/web/admin


If you renamed the project folder, replace web with your actual folder name.

🔐 Admin Login

Use the administrator credentials provided with the project:

Username: katojkalemba
Password: Kalemba@2000


Security Note: If you deploy this project online, change the default administrator password immediately.

🗄️ Database

The project uses MySQL for storing application data such as:

Food categories
Food/menu items
Customer orders
Administrator accounts
Other application records

The SQL database file is included in:

databasefiles/food_order.sql

📱 Responsive Design

The application is designed to provide a user-friendly experience across different screen sizes, including:

💻 Desktop
💻 Laptop
📱 Mobile
📟 Tablet
🎯 Use Cases

This project can be used as a starting point for:

🍽️ Restaurants
☕ Cafes
🥡 Food shops
🏫 School/college canteens
🍔 Small food businesses
🎓 PHP/MySQL academic projects
🔮 Future Improvements

Some features that can be added in future versions:

💳 Online Payment Integration
📧 Email Order Notifications
📱 SMS Notifications
👤 Customer Registration & Login
🛒 Shopping Cart
📍 Delivery Address & Tracking
⭐ Food Reviews & Ratings
📊 Advanced Sales Reports
🔔 Real-Time Order Notifications
🧾 Printable Order Receipts
⚠️ Security

If you are using this project for learning or development:

Change the default admin credentials.
Use prepared statements for database queries.
Validate and sanitize user input.
Restrict access to administrative pages.
Do not expose database credentials publicly.
Keep PHP and server software updated.
📚 Learning Purpose

This project is useful for learning and understanding:

PHP CRUD operations
MySQL database integration
User/admin panels
Food/menu management
Order management
PHP form handling
Basic web application architecture
👨‍💻 Author

Ansari Aman

⭐ Support

If you find this project useful, consider giving the repository a ⭐ on GitHub.

📄 License

This project is intended for educational and development purposes. Please check the original source/project license before redistributing or using it commercially.
