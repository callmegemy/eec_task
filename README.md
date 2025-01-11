EEC Task Project

This Folder consists of two parts: a Laravel backend and an Angular frontend. Kindly follow the instructions below to set up and run both projects.

Prerequisites

Local Server : Ensure you have a local server environment like XAMPP or Laragon installed and running.

Start Apache and MySQL services.

Ensure your MySQL server is accessible (usually at localhost or 127.0.0.1).

Node.js and npm : Install Node.js (which includes npm).

Composer : Install Composer.

------

# EEC Task - Backend

This is the backend part of the EEC Task project, built with Laravel. Follow the instructions below to set up and run the backend.

## Repository
- Repository URL: [https://github.com/callmegemy/eec_task](https://github.com/callmegemy/eec_task)

Clone the Repository

Clone this repository to your local machine using the following command:
git clone git@github.com:callmegemy/eec_task.git

Folder: eec_task

Navigate to the Laravel Project -> Open your terminal and navigate to the eec_task folder:

cd eec_task

Install Dependencies -> Run the following command to install the necessary Laravel dependencies:

composer install

Set Up Environment File -> Copy the .env.example file to create a new .env file:

cp .env.example .env

Generate Application Key -> Generate a new application key:

php artisan key:generate

Configure the Database

Open the .env file.

Update the following fields with your database details: (if necessary)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

Run Database Migrations and Seed the Database -> Run the following commands to set up the database structure and seed it with initial data:

php artisan migrate --seed

Start the Local Server -> Ensure your local server (XAMPP or similar) is running. Then start the Laravel development server:

php artisan serve

The server will be available at http://127.0.0.1:8000.

Test API Endpoints -> All API endpoints have been tested using Postman. 

--------------------------------------------

# EEC Task - Frontend

This is the frontend part of the EEC Task project, built with Angular. Follow the instructions below to set up and run the frontend.

## Repository
- Repository URL: [https://github.com/callmegemy/eec_ui](https://github.com/callmegemy/eec_ui)

1. Clone the Repository
Clone this repository to your local machine using the following command:
git clone git@github.com:callmegemy/eec_ui.git

Folder: eec-ui

Navigate to the Angular Project -> Open your terminal and navigate to the eec-ui folder:

cd eec-ui

Install Dependencies -> Run the following command to install all required packages:

npm install

Run the Angular Project -> Start the Angular development server:

ng serve

The project will be available at http://localhost:4200.

Viewing the Application

Open a web browser and navigate to http://localhost:4200.

You will see all the data fetched from the backend and displayed in the Angular application.

Notes

Ensure the Laravel backend is running before starting the Angular project.

Confirm that your local server (XAMPP or similar) is running with MySQL and Apache services active.

That`s it all thank you for your time.

