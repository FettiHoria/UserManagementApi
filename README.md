<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this project

This is the Api part of my user management project made with Laravel 10.

## Run it locally

### Windows

After you clone the project on your machine open a terminal inside de project directory and run the command "php artisan key:generate" to generate a key specific for your instance.
Install an apache server to have a mysql service, on windows is simple, install Xampp, open it enable MySql (now i think is MariaDB) then open phpmyadmin ("http://localhost/phpmyadmin/"), user: root no password.
Create a new database called "omeron_test".
Then you go back to terminal and run "php artisan migrate". 
Start the api with "php artisan serve".
Using postman call "(http://127.0.0.1:8000/api/register)" with name, email and password in form-data to create the first user. From phpmyadmin make it the admin by adding "admin" in the "role" column.
![image](https://github.com/user-attachments/assets/17345f7c-a232-4fe3-ad22-2e3675245aae)

Login with that user on the client (just clone that project and run "ng serve" on its directory).

### Linux

This can be complicated.

Install mysql if don't have it and then run "sudo mysql", create a new user because the root one will not work "CREATE USER 'user'@'hostname';" and give him some privilages "GRANT ALL PRIVILEGES ON dbTest.* To 'user'@'hostname' IDENTIFIED BY 'password';"

Go on phpmyadmin and log in using your new user and continue from here exactly like I described fro Windows.

## License

[MIT license](https://opensource.org/licenses/MIT).
