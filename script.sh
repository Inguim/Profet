cd /home/profetcefetvga/profet
php artisan storage:link
composer install && yarn install && yarn prod
php artisan migrate
php artisan passport:install
# php artisan db:seed --class=TiposNotificacaoSeeder
php artisan db:seed --class=TipoContribuicaoSeeder
# yarn prod

# php artisan migrate && php artisan db:seed
