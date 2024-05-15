## Food Ordering Website

## Description :
Developed a full-stack food ordering website using PHP, MySQL, JavaScript, Bootstrap, CSS & HTML featuring menu browsing, category section, order placement 
and an admin panel for managing restaurant offerings and customer orders.

## Technologies Used
- PHP
- MySQL
- JavaScript
- Bootstrap
- CSS
- HTML

## Usage
1. Users can explore various restaurant menus and view detailed descriptions and prices of items.
2. Users can select items, customize their orders, and add them to the cart.
3. Search functionality to find specific items or categories.
4. Restaurant admins can manage menus, update item details, view customer orders, and handle order statuses.

## Installation
1. Install XAMPP.
2. Clone the repository and paste it inside 'C:\xampp\htdocs'.
3. Create a database with name 'food_order' in phpMyAdmin.
4. Create a table 'admin' with cloumn (id int primary key auto_increment,full_name varchar(100),  username varchar(100), password varchar(100)) and add admin details in it.
5. Create a table 'category' with cloumn (id int primary key auto_increment, title varchar(100), image varchar(100), featured varchar(100), active varchar(100)).
6. Create a table 'food' with cloumn (id int primary key auto_increment, title varchar(100), description varchar(100), price varchar(100), image varchar(100), category_id int, featured varchar(100) active varchar(100)).
7. Create a table 'order_tbl' with cloumn (id int primary key auto_increment, food varchar(100), price int, qty int, total int, order_date datetime, status varchar(100), customer_name varchar(100), customer_contact varchar(100), customer_email varchar(100), customer_address varchar(100)).
8. Start the Apache and MySql in XAMPP.
9. Open Browser and type 'localhost/ecommerce/shopeasy/user/index.php'
