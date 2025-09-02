
# 🛒 Online Grocery Management System

## 📌 Project Overview

The **Online Grocery Shopping System** is a web-based application built using **PHP** and **MySQL** that allows customers to purchase groceries online from the comfort of their home.
It provides features for **customers** to browse, search, add products to cart, and place orders, while **admins** can manage products, categories, and orders.

---

## 🚀 Features

### 👩‍💻 Customer Module

* User Registration & Login (with validation)
* Browse grocery categories & products
* Search products by name/category
* Add products to **Shopping Cart**
* Manage Cart (add, remove, update quantity)
* Place orders with checkout system
* View order history & status

### 🛠️ Admin Module

* Secure Admin Login
* Manage Categories (Add/Update/Delete)
* Manage Products (Add/Update/Delete, stock availability)
* Manage Orders (view all customer orders, update status)
* View Customer Details

---

## 🏗️ Technology Stack

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Server:** XAMPP / Apache

---

## 📂 Project Structure

```
grocery_shopping/
│── index.php              # Homepage
│── login.php              # User login
│── register.php           # User registration
│── products.php           # Browse products
│── cart.php               # Shopping cart
│── checkout.php           # Place order
│── order_history.php      # View orders
│── admin/
│   ├── admin_login.php    # Admin login
│   ├── manage_products.php
│   ├── manage_categories.php
│   ├── manage_orders.php
│── includes/
│   ├── db_connect.php     # Database connection
│   ├── header.php
│   ├── footer.php
│── assets/
│   ├── css/               # Stylesheets
│   ├── js/                # Scripts
│   ├── images/            # Product images
```

---

## ⚙️ Installation Guide

1. **Clone the repository**

   ```bash
   git clone https://github.com/YourUsername/grocery_shopping.git
   ```

2. **Move project to XAMPP/htdocs**

   ```bash
   C:/xampp/htdocs/grocery_shopping
   ```

3. **Setup Database**

   * Open **phpMyAdmin**
   * Create a database:

     ```sql
     CREATE DATABASE groceryshopping;
     ```
   * Import the SQL file (`groceryshopping.sql`) into phpMyAdmin.

4. **Update Database Connection**
   In `includes/db_connect.php`, set:

   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $dbname     = "groceryshopping";
   ```

5. **Run the project**

   * Start Apache & MySQL in XAMPP
   * Visit:

     ```
     http://localhost/grocery_shopping/
     ```

---

