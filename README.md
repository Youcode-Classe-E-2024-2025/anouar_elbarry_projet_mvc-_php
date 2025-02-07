# EniBlog - PHP MVC Blog Application

## Overview
EniBlog is a simple blog application built using the PHP MVC architecture. It features a front office for public users and a back office for administrators. The application is designed with security and modularity in mind, utilizing best practices for session management, authentication, and data validation.

## Features
- **User Authentication**: Secure login and registration with CSRF protection.
- **Role Management**: Admin and author roles with specific permissions.
- **Article Management**: Create, edit, and view articles.
- **Responsive Design**: Built with Tailwind CSS for a responsive UI.

## Project Structure
```
├── public/                  # Public directory (browser accessible)
│   ├── index.php           # Application entry point
│   ├── .htaccess           # URL rewriting and security
│   └── assets/             # CSS, JS, images
│
├── app/                     # Application code
│   ├── controllers/        # Controllers (Business logic)
│   │   ├── front/         # Front Office controllers
│   │   │   ├── HomeController.php
│   │   │   └── ArticleController.php
│   │   └── back/          # Back Office controllers (Admin)
│   │       ├── DashboardController.php
│   │       └── UserController.php
│   │
│   ├── models/            # Models (Database management)
│   │   ├── User.php
│   │   └── Article.php
│   │
│   ├── views/             # Template files for views
│   │   ├── front/        # Front Office views
│   │   │   ├── home.twig
│   │   │   └── article.twig
│   │   └── back/         # Back Office views (Admin)
│   │       ├── dashboard.twig
│   │       └── users.twig
│   │
│   ├── core/             # Core application classes
│   │   ├── Router.php    # Route management
│   │   ├── Controller.php # Parent controller class
│   │   ├── Model.php     # Parent model class
│   │   ├── View.php      # Twig template management
│   │   ├── Database.php  # PostgreSQL connection via PDO
│   │   ├── Auth.php      # Session and authentication management
│   │   ├── Validator.php # Data validation
│   │   ├── Security.php  # XSS, CSRF, SQL Injection protection
│   │   └── Session.php   # Advanced session management
│   │
│   └── config/           # Application configuration
│       ├── config.php    # Database configuration
│       └── routes.php    # Route definitions
│
├── logs/                  # Error and access logs
├── vendor/               # Dependencies (Composer)
├── .env                  # Environment variables
├── composer.json         # PHP dependency manager
└── .gitignore           # Git ignore rules
```

## Installation
1. **Clone the repository**:
   ```bash
   git clone https://github.com/Youcode-Classe-E-2024-2025/anouar_elbarry_projet_mvc-_php.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd anouar_elbarry_projet_mvc-_php
   ```

3. **Install dependencies**:
   - Ensure you have PHP and Composer installed.
   - Run `composer install` to install any PHP dependencies.

4. **Database Setup**:
   - Create a MySQL database for the application.
   - Import the provided SQL file to set up the database schema.

5. **Configure Environment**:
   - Copy `.env.example` to `.env` and update the database credentials and other configurations.

6. **Run the application**:
   - Use a local server setup like Laragon or XAMPP to serve the `public` directory.

## Usage
- Access the application in your web browser.
- Register a new account or log in with existing credentials.
- Navigate through the blog articles and manage your content.

## Security Features
- **CSRF Protection**: Tokens are used to protect against CSRF attacks.
- **Session Management**: Secure session handling with periodic ID regeneration.
- **Input Validation**: User inputs are validated and sanitized to prevent XSS and SQL injection attacks.

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request for any improvements or bug fixes.

## License
This project is licensed under the MIT License. See the `LICENSE` file for more information.

## Contact
For any inquiries or support, please contact the project maintainer at [elbarryanwar37@gmail.com].
