
##  Show route list in laravel 

php artisan route:list 



php artisan route:list
php artisan make:controller controllername
sail artisan make:controller --resource PostController


php artisan make:migration create_post_table --create="posts"

php artisan migrate:rollback


php artisan make:seeder UsersTableSeeder
sail artisan make:seeder UsersTableSeeder 

php artisan db:seed

php artisan migrate:rollback --step=1
2
3

php artisan make:models Posts

php artisan make:models User_details

php artisan make:models models name save to app/models

php artisan make:factory UserDetailsFactory --model=User_details

sail artisan make:controller --resource UserDetailsController

sail composer require laravel/socialite


?state=yrAjOY8kCu&code=4%2F0AY0e-g6nO3bG6trgO7to0ogNLCG4ubd7eAW5oGGvpFbD9BK_iDAioiqUgdnHZKa8_dc-CQ&scope=email%20profile%20openid%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&authuser=0&prompt=consent


https://console.cloud.google.com/apis/credentials?project=project-website-314807

http://localhost:3000/login? 
state=AIyxj7zl7k&
code=4%2F0AY0e-g7mdONlT4iIiNrJswU4aUgn8V-67g9ojOVm1HisK1nycUkFZ7s7h67kmRbiloV7Eg&
scope=email%20profile%20openid%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&
authuser=0&
prompt=consent



https://accounts.google.com/signin/oauth/warning?authuser=0&part=AJi8hANaJCVUc1fqRd6u7idpZnJthIBMT_1eBjhUFJp4TbjWXj9U5CGhXGRmZBmghOkzdhIW2Mv7ZykoWDMDxU7T1xhOIbMcB4GLSWt_jpj-3LGqosB1OeA-cH6HQJAdf37E5NnhOpUci6c6Wp3HQxFTWgG3ZPRgjTTP6mA6ELB7li-cYTluF-ZNZNtdIp3FZZH_S35vgyyphbaXDRwzwaIa8qUvuIruwzaRWk_I7Kya_PuVJj52O0HrO4cuK-CKTea5A1qqiWcyJqs0h2Of2Av_7Zm_TE7DQak-xZbbjGBcjdCRNFg3RFFmWP2G_isDDMRDI58OtCgPZH4VEQPN9XAm4MEpo_NTk4HAZouEaPziEKRIZUK-2cwXkz9nMPo7fY_48ICG-9rKP8VH6Nbb5kxV-aCatQ_OfEbOXkB91CCqsNi12jFsqDde8A2fRP_9N3aglSuvG5z2z3efC34kVgsn13LeBPYZNA&as=S1997506154%3A1621940095491995&client_id=14757956463-i7pn4r8arrel30q04rh9htcmnf1aoaot.apps.googleusercontent.com&rapt=AEjHL4ON7LflsnbsUzws-708RIgniF4XOwoEjdJbdGTfsUug8pDBX4iRGpL7jYUkUJar1d_AeTNNNtr5mhvw6sfilrJdeWQSpQ#


http://localhost:3000/callback?state=QzlXdoAhpt&code=4%2F0AY0e-g6jRKQqscJUMKucOhEHdYRfj7u23Q1kYT1MFiGBII2LxQjNbKr6gZhrAtTMSNEecg&scope=email%20profile%20openid%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&authuser=0&prompt=consent


https://nuxt-auth.herokuapp.com/


create seed for posts
create factory for posts 

sail artisan make:seeder PostTableSeeder 

php sail  artisan make:factory PostFactory --model=Posts

php sail artisan db:seed

php artisan db:seed

php artisan db:seed --class=UserSeeder


php sail artisan make:model Role -m
php sail artisan make:migration create_role_user_table --create=role_user

php sail artisan migrate:rollback --step=1


php sail  artisan make:factory RolesFactory
php sail  artisan make:factory Roles_UsersFactory

sail artisan make:seeder RolesTableSeeder 
sail artisan make:seeder Roles_UsersTableSeeder 

php sail artisan make:model Roles_Users


php sail artisan db:seed --class=RolesTableSeeder
php sail artisan db:seed --class=Roles_UsersTableSeeder 

php sail artisan make:controller --resource RoleController


polymorphic relationship

php sail artisan make:model Staff -m
php sail artisan make:model Product -m
php sail artisan make:model Photo -m

php sail artisan make:controller ImageStaffProductsController


php sail  artisan make:factory StaffFactory
php sail  artisan make:factory ProductFactory


sail artisan make:seeder StaffTableSeeder 
sail artisan make:seeder ProductTableSeeder 

php sail artisan db:seed --class=StaffTableSeeder
php sail artisan db:seed --class=ProductTableSeeder 


php sail artisan make:model Post -m
php sail artisan make:model Video -m
php sail artisan make:model Tag -m
php sail artisan make:model Taggable -m

php sail artisan make:controller --resource TagVideoPostController 

php sail  artisan make:factory VideoFactory
php sail  artisan make:factory TagFactory
php sail artisan migrate:refresh --seed


php sail artisan make:seeder TagSeeder
php sail artisan make:seeder VideoSeeder 

php sail artisan db:seed --class=TagSeeder
php sail artisan db:seed --class=VideoSeeder 

php sail artisan make:factory TaggableFactory
php sail artisan make:seeder TaggableTableSeeder 

php sail artisan make:model Taggable

php sail artisan db:seed --class=TaggableTableSeeder 

docker exec -it nuxt_client_nuxt-app


php sail artisan make:migration add_slug_imagevideo_posts_table --create=role_user

php sail artisan make:migration add_publish_text_in_posts_table


php sail artisan make:migration create_messageoftheday_table --create=messageoftheday
sail artisan make:controller --resource messageoftheday
php sail artisan make:model messageoftheday

php sail artisan make:seeder MessageoftheDayTableSeeder 
php sail artisan db:seed --class=MessageoftheDayTableSeeder 

