cd /home/profetcefetvga/profet

composer install && yarn install && yarn prod

php artisan migrate && php artisan db:seed
