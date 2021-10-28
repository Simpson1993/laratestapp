<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

Installations instruction
-
1. Run container
```PHP
docker-compose up -d
```
2. Configure `.env` file according to `.env-example`
3. Install dependencies
```PHP
composer install
```
4. Run migrations
```PHP
docker-compose exec app php artisan migrate
```
5. Seeds data
```PHP
docker-compose exec app php artisan db:seed
```

Working commands
- 
Create item
```PHP
docker-compose exec app php artisan items:create
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
- [x] Add ability to switch search engine (Elastic/ORM)
- [ ] Dive dipper into Elasticsearch
- [ ] Add ES configuration file instead of using env()
- [ ] Improve Elasticsearch index logic (add numeric index search)
- [ ] Search by complectation parameters
- [ ] Improve SearchItems command interaction
- [ ] Improve SearchItems command output format
- [ ] CreateItems massive assigment
- [ ] Check dependencies
- [ ] Install xdebug
