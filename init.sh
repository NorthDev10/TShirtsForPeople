docker-compose exec app composer install
docker-compose exec app php artisan migrate:refresh --seed
cd ./site
yarn
yarn build