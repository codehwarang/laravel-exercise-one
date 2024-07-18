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
