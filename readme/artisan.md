php sail artisan make:migration create_AdminUserLogs_table --create="AdminUserLogs"
php sail migrate
php sail artisan migrate:rollback --step=1


php sail artisan make:migration add_users_table_is_active 


php sail artisan migrate:refresh --seed
