## About Projet

This project is developed with laravel 9 framewok. This application will provide API for [eudaimonia_bakery](https://github.com/lovyethasrt/eudaimonia_bakery) flutter mobile application. Currently API still provides communication with one resource, ``vouchers``, with 4 endpoints to perform <b>CRUD</b> operations.

## Quick Start

#### Clone the repo

```shell
git clone https://github.com/lovyethasrt/eudaimonia-api.git eudaimonia-api
cd eudaimonia-api
```
### Install Project Dependencies
```shell
composer install
npm install
```

### Setup Environment Variable
```Shell
cp .env.example .env
php artisan key:generate
```

### Setup Database MYSQL
Create a database in mysql on your local server as configured in the `.env` file. After that, run the following command to create the table schema and add the data seeder.
```shell
php artisan migrate --seed
```

### Run the application
Make sure you are connected to wifi, check the IP address that your pc obtained from WiFi. Use the IP to run Laravel 
```shell
php artisan serve --host=<ip address>
```

### Access the resource 
Please access your base_url laravel running for example `http://192.192.68.112/vouchers` to test the response of the API. Up to this point your Laravel APIs can be accessed in Flutter.

