Roubost Task

a fleet-management system (bus-booking
system)

first I divvied the task to 3 main problems then I tried to find solution for each one 
* creating seats system - I knew it was too bad if create table seats for every bus trip so i lean on reserved seats then I get the non-reserved seats to 
* validate trip dispatch and destination cities - i used city order on the bus line to know which city before and after so if the line comes from A-B-C-D the order of city A have to be less or equal to City D not the opposite  
* allowing users to book cities on the line allow user to book from city B to C for example i have to store the dispatch and destination city order in the reservation table because the query will become to complex count on calculate every time 

i used laravel sail to make docker image for the project you can run the image with the command 
>  ./vendor/bin/sail up -d

then publish the migration and seed file with the command

>  ./vendor/bin/sail artisan migrate --seed

there is 3 main functions
> /api/cities GET

should return all cities

> /api/reservations GET

Should return the available trips and seats on the reservation parameters

params |notes
-------|--------
date_from |
date_to |
dispatch_city_id |
destination_city_id |

> api/reservations POST

params | notes
-------|------
date_from |
trip_id | returned from the get function
dispatch_city_id |
destination_city_id |
name| user name

i used laravel/breeze for dashboard auth
here are the routes and credentials
> /login
>email : admin@admin.com
> password :123456

it will be created after running the seed command 

also here is the documentation for the api
> https://documenter.getpostman.com/view/2535308/Tzedi589
