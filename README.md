<img width="948" height="809" alt="8" src="https://github.com/user-attachments/assets/6709964a-feab-424d-97b1-651e78d901e7" /># 🍽️ Online Food Ordering System

A simple and user-friendly Online Food Ordering System built with PHP, MySQL, HTML, CSS, and JavaScript.

This project provides a complete food ordering workflow with an Admin Panel for managing food categories, food items, and customer orders.

It is suitable for academic projects, PHP/MySQL practice, restaurants, cafes, food shops, and small food businesses.

---

## 🚀 Features

### 👤 Customer Side

* 🍔 Browse available food items
* 📂 Browse food by categories
* 🔎 Search food items
* 🛒 Place food orders
* 🧾 Submit customer/order information
* 📋 View available food menu
* 📱 Responsive user interface

### 🔐 Admin Panel

* 🔑 Secure administrator login
* 📊 Admin dashboard
* 📂 Manage food categories
* 🍔 Manage food items
* ➕ Add new food items
* ✏️ Update food items
* 🗑️ Delete food items
* 📦 Manage customer orders
* 🔄 Update order status
* 👤 Manage administrator account

---

## 🛠️ Technologies Used

| Technology | Purpose                   |
| ---------- | ------------------------- |
| PHP        | Backend Development       |
| MySQL      | Database                  |
| HTML5      | Page Structure            |
| CSS3       | Styling                   |
| JavaScript | Client-side Functionality |
| Bootstrap  | Responsive UI             |
| XAMPP      | Local Development Server  |
| phpMyAdmin | Database Management       |

---

## 📁 Project Structure

Online-Food-Ordering-System/
│
├── admin/
│   ├── css/
│   ├── js/
│   ├── images/
│   ├── partials/
│   ├── add-admin.php
│   ├── add-category.php
│   ├── add-food.php
│   ├── delete-admin.php
│   ├── delete-category.php
│   ├── delete-food.php
│   ├── delete-order.php
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── manage-admin.php
│   ├── manage-category.php
│   ├── manage-food.php
│   ├── manage-order.php
│   └── update-*.php
│
├── css/
│   └── style.css
│
├── images/
│   └── food images
│
├── js/
│   └── custom.js
│
├── partials/
│   ├── front-menu.php
│   ├── footer.php
│   └── menu.php
│
├── databasefiles/
│   └── food_order.sql
│
├── config/
│   └── constants.php
│
├── index.php
├── categories.php
├── foods.php
├── food-search.php
├── order.php
└── README.md
> Project structure may vary depending on the version of the project.

---

# 💻 Installation & Setup

Follow the steps below to run this project on your local machine.

## 1️⃣ Install XAMPP

Download and install XAMPP on your computer.

Make sure the following services are available:

* Apache
* MySQL
* phpMyAdmin

Start:

Apache → Start
MySQL → Start
---

## 2️⃣ Clone or Download the Project

Clone the repository using Git:

git clone YOUR_GITHUB_REPOSITORY_URL
Or download the project as a ZIP file and extract it.

---

## 3️⃣ Move Project to XAMPP

Copy the project folder:

Online-Food-Ordering-System
into:

C:\xampp\htdocs\
Your final path should look like:

C:\xampp\htdocs\Online-Food-Ordering-System\
---

# 🗄️ Database Setup

This application uses MySQL to store application data including:

* Food Categories
* Food Items
* Customer Orders
* Admin Accounts
* Other Application Data

## 1. Open phpMyAdmin

Open:

http://localhost/phpmyadmin/
---

## 2. Create Database

Create a new database named:

food_order
---

## 3. Import SQL File

Open the database:

food_order
Then click:

Import
Select:

databasefiles/food_order.sql
and click:

Go
The required tables will be created automatically.

---

# ⚙️ Database Configuration

Check the database configuration file in the project.

For example:

<?php

define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food_order');

$conn = mysqli_connect(
    LOCALHOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME
);

if (!$conn) {
    die("Database Connection Failed");
}

?>
> Update the database username, password, host, and database name according to your local environment.

---

# 🌐 Run the Application

After starting Apache and MySQL, open:

### 🏠 Customer Website

http://localhost/Online-Food-Ordering-System/
### 🔐 Admin Panel

http://localhost/Online-Food-Ordering-System/admin/
---

# 🔑 Admin Login

Use the administrator account created in your database.

Username: YOUR_ADMIN_USERNAME
Password: YOUR_ADMIN_PASSWORD
> Security: Do not publish real administrator credentials in a public GitHub repository. Change the default credentials before deploying the project to a live/production server.

---

# 📊 Admin Panel

The Admin Panel allows administrators to manage the complete food ordering system.

### Available Management Modules

#### 📂 Category Management

* Add Category
* Update Category
* Delete Category
* View Categories

#### 🍔 Food Management

* Add Food
* Update Food
* Delete Food
* Manage Food Items
* Upload Food Images
* Set Food Price
* Assign Food Category

#### 📦 Order Management

* View Customer Orders
* View Order Details
* Update Order Status
* Delete Orders

#### 👤 Admin Management

* Add Administrator
* Update Administrator
* Delete Administrator
* Manage Admin Accounts

---

# 🖼️ Screenshots

Add screenshots of your project here.

Example:

## 📸 Screenshots

### 🏠 Home Page

<img width="856" height="958" alt="1" src="https://github.com/user-attachments/assets/46274dcd-0700-4a58-b763-82842faeec4d" />


### 🍔 Food Menu

<img width="861" height="949" alt="4" src="https://github.com/user-attachments/assets/778ed112-c976-4fcd-bf6c-f6d4d9af2a93" />


### 🔐 Admin Login

<img width="265" height="209" alt="6" src="https://github.com/user-attachments/assets/df427ccf-f563-44db-b5c0-973bd495db47" />


### 📊 Admin Category Report

<img width="905" height="584" alt="7" src="https://github.com/user-attachments/assets/161213d1-b687-41c5-af96-b98b5bc48a4d" />


### Admin Food Record 

<img width="948" height="809" alt="8" src="https://github.com/user-attachments/assets/6ff2821b-ab07-4dad-a129-28414f1512a5" />


### Admin Order Record 

<img width="948" height="362" alt="9" src="https://github.com/user-attachments/assets/821fd126-0fe1-4e82-bd0a-1b213660c15b" />




---

# 🎯 Use Cases

This project can be used for:

* 🍽️ Restaurants
* ☕ Cafes
* 🥡 Food Shops
* 🏫 School Canteens
* 🍔 Small Food Businesses
* 🎓 PHP/MySQL Academic Projects
* 💻 PHP Web Development Practice
* 📚 Learning CRUD Operations
* 🗄️ Database Management Practice
* 👨‍💻 Web Development Portfolio Projects

---

# 📚 Learning Objectives

This project helps developers understand:

* PHP CRUD Operations
* MySQL Database Integration
* PHP Form Handling
* MySQL Queries
* Database Operations
* Admin Panel Development
* Food Menu Management
* Order Management
* User Interface Development
* Basic Web Application Architecture
* Local Server Configuration
* phpMyAdmin Database Management
* File Upload Handling
* Session Management

---

# 🔄 Application Workflow

Customer
   │
   ▼
Home Page
   │
   ▼
Browse Categories
   │
   ▼
Browse Food Items
   │
   ▼
Select Food
   │
   ▼
Place Order
   │
   ▼
Order Stored in MySQL
   │
   ▼
Admin Login
   │
   ▼
Admin Dashboard
   │
   ▼
Manage Orders
   │
   ▼
Update Order Status
---

# 🔮 Future Improvements

The following features can be added in future versions:

### 💳 Online Payment

Integrate payment gateways such as:

* Razorpay
* Stripe
* PayPal

### 📧 Email Notifications

Send automatic emails when:

* Order is placed
* Order is confirmed
* Order is cancelled
* Order is delivered

### 📱 SMS Notifications

Send order status updates through SMS.

### 👤 Customer Registration & Login

Add:

* Customer registration
* Login
* Logout
* Profile management
* Password reset

### 🛒 Shopping Cart

Implement:

* Add to Cart
* Remove from Cart
* Update Quantity
* Cart Total
* Checkout

### 📍 Delivery Address & Tracking

Add:

* Delivery address
* Google Maps integration
* Delivery tracking
* Estimated delivery time

### ⭐ Food Reviews & Ratings

Allow customers to:

* Rate food
* Write reviews
* View ratings

### 📊 Advanced Sales Reports

Add reports for:

* Daily Sales
* Weekly Sales
* Monthly Sales
* Most Ordered Food
* Revenue
* Total Orders

### 🔔 Real-Time Order Notifications

Provide real-time notifications to administrators when a new order is placed.

### 🧾 Printable Order Receipts

Allow customers/admins to generate printable receipts.
### 📦 Order Status Tracking

Example statuses:

Pending
   ↓
Confirmed
   ↓
Preparing
   ↓
Out for Delivery
   ↓
Delivered
### 🌓 Dark Mode

Add a modern dark/light theme switcher.

### 📱 Mobile Application

Develop Android/iOS applications using:

* Flutter
* React Native
* Native Android

---

# 🔒 Security Recommendations

Before deploying this project to a production server:

* 🔑 Change the default admin username and password.
* 🔐 Use strong administrator passwords.
* 🛡️ Use prepared statements for database queries.
* ✅ Validate all user input.
* 🧹 Sanitize user input where appropriate.
* 🔒 Protect administrative pages.
* 🚫 Never expose database credentials.
* 🚫 Do not upload sensitive configuration files.
* 🔐 Store secrets in environment variables where possible.
* 🌐 Use HTTPS on production.
* 🐘 Keep PHP updated.
* 🗄️ Keep MySQL updated.
* ⚠️ Disable unnecessary PHP error messages on production.
* 💾 Regularly back up the database.
* 🔐 Implement proper session management.
* 📁 Restrict dangerous file uploads.
* 🚫 Do not commit passwords, API keys, or .env files to GitHub.

---

# 🧪 Local Development

Recommended environment:

Operating System : Windows / Linux / macOS
Server            : Apache
PHP               : 7.x / 8.x
Database          : MySQL
Database Tool     : phpMyAdmin
Local Server      : XAMPP
Browser            : Chrome / Firefox / Edge
> PHP version compatibility may depend on the original project code. If you encounter deprecated-function or compatibility errors, check the PHP version required by the project.

---

# 🐛 Troubleshooting

## ❌ Database Connection Error

Check:

Database Name
Database Username
Database Password
MySQL Service
Make sure MySQL is running in XAMPP.

---

## ❌ Page Not Found

Make sure the project exists inside:

C:\xampp\htdocs\
Then verify the URL:

http://localhost/Online-Food-Ordering-System/
---

## ❌ Admin Panel Not Opening

Check:

http://localhost/Online-Food-Ordering-System/admin/
Also verify that Apache is running.

---

## ❌ Images Not Displaying

Check:

* Image folder path
* File permissions
* Image filename
* PHP upload configuration
* Relative/absolute image paths

---

# 📂 Database

SQL database file:

databasefiles/food_order.sql
Database:

food_order
The database contains information related to:

Categories
Food Items
Orders
Administrators
---

# 👨‍💻 Author

## Ansari Aman

BCA Graduate | MCA Final Year
PHP | MySQL | Python | JavaScript | Web Development

---

# ⭐ Support

If you find this project useful, please consider giving this repository a ⭐ on GitHub.

Your support is appreciated and helps encourage further development.

---

# 📄 License

This project is intended for educational and development purposes.

Please check the original project's license and terms before redistributing or using this project commercially.

---

# 🤝 Contributing

Contributions are welcome!

If you would like to improve this project:

### 1. Fork the repository

git fork YOUR_GITHUB_REPOSITORY_URL
### 2. Create a new branch

git checkout -b feature/new-feature
### 3. Make your changes

### 4. Commit your changes

git add .
git commit -m "Add new feature"
### 5. Push the branch

git push origin feature/new-feature
### 6. Create a Pull Request

---

# 📌 Project Status

🟢 Active Development

This project can be further improved by adding modern features such as online payments, customer authentication, shopping cart functionality, delivery tracking, reviews, analytics, and mobile application support.

---

## 🍽️ Online Food Ordering System

Built with ❤️ using PHP & MySQL

⭐ Star this repository if you find it useful!
