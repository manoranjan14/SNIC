# SNIC Web Application README

## Overview

The **SNIC Web Application** is an innovative online platform designed to enhance the shoe shopping experience for consumers while providing efficient management tools for administrators. Built using PHP, this application operates at two levels: **Consumer Level** and **Admin Level**.

## Features

### Consumer Level
- **Product Browsing**: Users can easily browse a diverse range of shoes.
- **Request Specific Shoes**: Consumers can request shoes not listed in the catalog.
- **Shopping Cart Management**: Users can add, review, and remove items from their virtual shopping cart.
- **Secure Transactions**: Facilitates secure payments through a trusted payment gateway.

### Admin Level
- **Product Management**: Admins can add, edit, or remove products from the catalog.
- **Transaction Oversight**: Administrators can manage user transactions and ensure smooth operations.

## Technologies Used

- **PHP**: Server-side scripting language for application logic.
- **MySQL**: Database management system for storing product and transaction data.
- **HTML/CSS/JavaScript**: Front-end technologies for creating a responsive user interface.
- **Payment Gateway Integration**: For secure payment processing.

## Installation

### Step 1: Clone the Repository
```bash
git clone https://github.com/manoranjan14/SNIC.git
cd SNIC
```

### Step 2: Set Up the Environment
1. Ensure you have PHP and MySQL installed on your server.
2. Create a new MySQL database and import the provided SQL schema to set up the necessary tables.

### Step 3: Configure Database Connection
Edit the `connection.php` file to include your database credentials:
```php
<?php
$host = 'localhost'; // Database host
$db = 'your_database'; // Database name
$user = 'your_username'; // Database username
$pass = 'your_password'; // Database password
?>
```

### Step 4: Run the Application
Navigate to your web server's document root and access the application through your browser:
```
http://localhost/SNIC/
```


## Future Enhancements

- **Expand Product Range**: Integrate additional shoe brands and categories.
- **User Accounts**: Implement user registration and login features for personalized experiences.
- **Enhanced Search Functionality**: Add filters and search options to improve product discovery.
- **Mobile Responsiveness**: Optimize UI for mobile devices.

Citations:
[1] https://apps.apple.com/bh/app/snic-mobile-application/id1599084258
[2] https://sonicfoundation.dev
[3] https://snyk.io
[4] https://www.techtarget.com/searchsoftwarequality/definition/Web-application-Web-app
[5] https://appexive.com/blog/top-5-key-features-of-enterprise-web-applications
[6] https://snyk.io/learn/what-is-mit-license/
[7] https://snicsolutions.com
[8] https://www.reddit.com/r/opensource/comments/x3a2p1/mit_license_copyright_newbie_question/
