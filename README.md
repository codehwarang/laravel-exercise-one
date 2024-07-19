# Laravel Exercise One

Simple web-application for work exercising. A brief description of this app is web-app that accompany you to manage your products. This app is built with Laravel 11.x, some powerful PHP framework made by Taylor Otwel.

## Installation

> Please make sure that you have `composer` installed on your machine

First thing first, do clone this repository. To clone you can just copy the command below.

```bash
git clone https://gitlab.com/codehwarang/laravel-exercise-one.git
```

After you done so, you can continue to install the necessary dependencies required by using the command below.

```bash
# to install laravel and its dependencies
composer install

# to install the js dependencies to load datatable
npm install
```

You are pretty much done installing. The step after is to setup your `.env` file, you can just copy the `.env.example` given and suit up yourself to configure the required environment variables.

> In some cases, you may need to run `php artisan key:generate` to generate the application key needed

## Usage

Running this application is pretty much simple, first thing first you need to build the js scripts and you can do that by using the command below.

```bash
npm run build
```

You are ready to go, do run this commands below.

```bash
# migrating database
php artisan migrate:fresh

# create a symlink for the public directory
php artisan storage:link

# serve the application
php artisan serve
```

### Techs Explained

This project was done to accomplish the exercise given by my senior. Below are the checklists of my tasks.

-   [x] Do learn Laravel request (includes the HTTP Request and Form Request). Pretty much done implemented in handling products creation.
-   [x] Do learn about handling error and logging using both file and database. Done implemented using custom logger with the monolog customization (https://laravel.com/docs/11.x/logging#creating-custom-channels-via-factories).
-   [x] Do learn about datatables (using the db query). In this case, I found the most suitable solution for this point is to use Datatable library made by Yajra (https://yajrabox.com/).
-   [x] Implementing DTO (Data Transfer Object) in Laravel, based on this example (https://medium.com/@mohammad.roshandelpoor/dto-data-transfer-objects-in-laravel-6b391e1c2c29).

### Features Explained

This small project may not contains full-features yet. This below list is the features that currently supported.

-   Login/Register/Logout (Basic Authentication using Fortify)
-   Read Products (Yajra Datatable)
-   Create Product (DTO implementation)
-   Dual Logging (File and Database)
