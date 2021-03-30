<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Library Book API 

Please Follow these instructions to get the app up and running.

Clone the Git Repo
### `git clone https://github.com/tomasalonz55/loopco_library_back.git loopcoLibrary`

cd into your project
### `cd loopcoLibrary`

Install Composer Dependencies
### `composer install`

Create a copy of .env File
### `cp .env.example .env`

Generate App Encryption Keys
### `php artisan key:generate`

Create an empty database for the application, can be a MySql DB.
In the .env file add database information, 
fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created.

Migrate the database
### `php artisan migrate`

Start the server
### `php artisan serve`

**Note: This project is made to run on por :8000 please make sure this is the case on your running server**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
