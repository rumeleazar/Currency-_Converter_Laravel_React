# Currency_Converter_Laravel #
Currency converter site made with Laravel and ReactJS (for the front end, you need to clone my other repository: Currency_Converter_React)

## Requirements ##
1. PHP (https://www.php.net/downloads)
2. Composer (https://getcomposer.org/download/)
3. Laravel (https://laravel.com/docs/4.2)
4. Node.js (https://nodejs.org/en/download/)
5. npm (https://www.npmjs.com/get-npm)
6. sqlite3/sqlite

## How to run ##
1. Clone this repository
2. Change directory to the project directory (**Currency_Converter_Laravel/CurrencyConverter**)
3. Run the "composer install" command
4. Run the "npm install" command
5. On the **database** directory, create a new file named **"database.sqlite"**
6. Run the **"php artisan migrate** command
7. Run **php artisan serve** to start the server
8. Server runs on localhost:8000
9. Run the React server to connect to the frontend


## Notes to remember so no error occur ##
1. On your php folder, there should be file named **php.ini**
2. Edit the **php.ini** file. Look for the **curl.cainfo**,**extension=pdo_sqlite**, and **extension=sqlite3** then remove the semicolon(;) on front
