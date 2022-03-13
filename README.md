# FilKhemda Front Test

php -v: 8.1

API source code: [Arbeitnow](https://documenter.getpostman.com/view/18545278/UVJbJdKh).

Clone the project


Run Composer \
`composer install`

Copy the ENV \
`cp .env.example .env` 

Generate KEY \
`php artisan key:generate`


## Docker Installtion 

Let’s build & run our app in a Docker container: \
```./vendor/bin/sail up```

OR

Also you can use \
`docker-compose up -d`

## Local Installtion 

`php artisan server --port=80`

UNIT TEST \
`php artisan test`