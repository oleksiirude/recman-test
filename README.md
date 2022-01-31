# recman-test

Requirements:
- PHP ^7.4
- MySQL 8
- Composer

How to set up:
- clone this repo locally and cd to project dir root
- login to mysql cli client and execute this command for creating database: "CREATE DATABASE IF NOT EXISTS recman_db;"
- exit from mysql cli client and execute next command for creating table: mysql --user=“root” --database="recman_db" -p < database/sql/create_users_table.sql
- run composer install
- cd to public dir and run PHP dev server with command "php -S 127.0.0.1:8080"
- go to http://127.0.0.1:8080/registration