# miniCRM

## Installation

- Create a mysql database with the following parameters :
  - 'miniCRM' on port 3306, with username 'root' and password left blank.

- Install Laravel 5.7. [Laravel Installation Guide](https://laravel.com/docs/5.7/installation)

- Download or clone miniCRM.

- Open a command prompt in the directory you saved miniCRM into and type 'php artisan serve'.

- Goto [port 8000](http://127.0.0.1:8000) on your local host and you should be greeted with the home screen.


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

Using the command prompt in the root folder, use the command 'php artisan migrate' to instantiate the database
with the user, or 'php artisan migrate --seed' to populate the database with random companies and employees.
Companies have a 1-to-many relationships with Employees.


 - Email : admin@admin.com
 
 - Password : password

Use the web app to view, add, edit, and delete employees and companies. Upon logging in, you will be greeted with
a simple homepage. Clicking on the companies or employees link will bring you to the relevant index, where all the
rows in the current table are displayed, along with links to create, edit, and delete.

Note : Companies cannot be deleted if they have dependant employees.

To view companies/employees, use '/{table}/{id}/{CRUD method}'. {id} can be omitted on certan actions.

*Examples :*

*localhost:8000/employees/12/show*

*localhost:8000/companies/7/edit*

*localhost:8000/employees/create*


# Tables
- companies
- employees


# Methods
- show
- edit
- create
- delete
