# miniCRM

## Installation

- Create a mysql database called 'miniCRM' on port 3306.

- Install Laravel 5.7. [Laravel Installation Guide](https://laravel.com/docs/5.7/installation)

- Download or clone miniCRM.

- Open a command prompt in the directory you saved miniCRM into and type 'php artisan serve'.

Goto [port 8000](http://127.0.0.1:8000) on your local host and you should be greeted with the home screen.

## Description

miniCRM is a tiny Customer Relationship Management system that provides basic functionality to manage
a one-to-many relationship between companies and employees.

## Features
 - Basic CRUD functionality
 - Faker database seeding
 - Fully integrated for localization
 - Request Validation
 - Paginated results

## Usage

Using the command prompt in the root folder, use the command 'php artisan migrate' to instantiate the database
with the user, or 'php artisan migrate --seed' to populate the database with random companies and employees.

# Email admin@admin.com
# Password password

To view companies/employees, use '/{table}/{id}/{CRUD method}'

# Example
'/employees/12/show'

# Tables
companies
employees

# Methods
show
edit
create
delete
