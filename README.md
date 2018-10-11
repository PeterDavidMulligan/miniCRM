# miniCRM

## Installation

- Create a mysql database with the following parameters :
  - Database Name : miniCRM
  - Database Port : 3306
  - Username : root
  - Password :

- Install Laravel 5.7. [Laravel Installation Guide](https://laravel.com/docs/5.7/installation)

- Download or clone miniCRM.

- Change 'username' and 'password' in '/config/mail.php' to your own [MailTrap](https://mailtrap.io/) details to receive automated    emails. (Optional)

- Open a command prompt in the directory you saved miniCRM into and run 'php artisan migrate --seed' to create user and populate
  the database.

- In the command prompt, run 'php artisan serve' to run a local server.

- Go to [port 8000](http://localhost:8000) on your local host and you should be greeted with the log in screen.
  Use the following details:
  - Email : admin@admin.com
  - Password : password


## Description

miniCRM is a tiny Customer Relationship Management system that provides basic functionality to manage
a one-to-many relationship between companies and employees.


## Features
 - Basic CRUD functionality
 - Paginated results
 - Faker database seeding
 - Fully integrated for localization
 - Request Validation on Models
 - Automatic mail sending with MailTrap
 

## Usage

Using the command prompt in the root folder, use the command 'php artisan migrate --seed' to instantiate the database
with the user and populate the database with random companies and employees. Companies have a 1-to-many relationships with
Employees.

Use the web app to view, add, edit, and delete employees and companies. Upon logging in, you will be greeted with
a simple homepage. Clicking on the companies or employees link will bring you to the relevant index, where all the
rows in the current table are displayed, along with links to create, edit, and delete. There is a dropdown navbar
in the top-right corner that you can use to go between home, companies, and employees, or to log out of the system.

Note : Companies cannot be deleted if they have dependant employees.

To view companies/employees, use '/{table}/{id}/{CRUD method}'. {id} can be omitted on certan actions.

*Examples :*

*localhost:8000/employees/12/show*

*localhost:8000/companies/7/edit*

*localhost:8000/employees/create*


# Routes
- /companies
- /employees
  - /index
  - /create
  - /edit
  - /delete

