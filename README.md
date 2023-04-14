## useful commands
- install composer dependencies: `composer install`
- rename .env.example file: `mv .env.example .env`
- generate app key: `php artisan key:generate`
- to drop previous sqlite db: `rm database/database.sqlite`
- to run migrations and seed the db: `php artisan migrate --force --seed`
- to run server: `php artisan serve`
- to run dev front server `npm i; npm run dev`