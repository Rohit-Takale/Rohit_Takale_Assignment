# Laravel Seeder Setup

## Prerequisites

Before getting started, ensure you have the following:

- **PHP**: Version 8.2
- **Composer**: Dependency manager for PHP
- **npm**: Package manager for JavaScript

### Install PHP

Ensure PHP 8.2 is installed on your system. 

### Install Composer

1. Download Composer
### Install npm

1. Ensure Node.js is installed. 
2. Open a terminal or command prompt and run:

    npm install
    

## Setup

1. **Clone the Repository:**

    
    https://github.com/Rohit-Takale/Upfinzo_Assignment.git
   

2. **Install PHP Dependencies:**

    Run the following command to install Laravel and other PHP dependencies:

   
    composer install
   

3. **Install JavaScript Dependencies:**

    Run the following command to install JavaScript dependencies:

    npm install
    

4. **Run the Seeders:**

    To set up the database with the necessary data, follow these steps:

    - **Run the `UserDeatilSeeder`**:

        ```bash
        php artisan db:seed --class=UserDeatilSeeder
        ```

    - **Run the `LoanDetailsSeeder`**:

        ```bash
        php artisan db:seed --class=LoanDetailsSeeder
        ```

## Logging In and Processing Data

1. **Log in** using the credentials:

    - **Email:** `developer@gmail.com`
    - **Password:** `Test@Password123#`

2. After logging in, you will be redirected to the **Process Data** page.

3. Click the **Process Data** button.

4. After receiving a success message, click the **View Details** button.

5. You will be redirected to the **EMI Details** page, where you will see the details populated based on the seed data.

## GitHub Repository

You can find the project repository on GitHub here: https://github.com/Rohit-Takale/Upfinzo_Assignment.git

---

If you encounter any issues or need further assistance, please refer to the Laravel documentation or contact support.
