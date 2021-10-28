<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

Installations instruction
-
0. Run container
```PHP
docker-compose exec app php artisan migrate
```

2. Install dependencies
```PHP
composer install
```
3. Run migrations
```PHP
docker-compose exec app php artisan migrate
```
4. Seeds data
```PHP
docker-compose exec app php artisan db:seed
```

Working commands
- 
Create item
```PHP
docker-compose exec app php artisan migrate
```
Search item
```PHP
docker-compose exec app php artisan items:search
```

### ToDo list

- [ ] Remove unnecessary parts of application
- [ ] Implement Doctrine instead of Eloquent
- [ ] Dive dipper into Docker
- [ ] Improve Docker container
