# Growth Experiments

Simple little application to help you manage your growth experiences pipeline.

Inspired by **[Brian Balfour](http://www.coelevate.com/)** (Growth VP at Hubspot).

**Why?** I don't want to pay for the SaaS apps out there and I don't like word type docs to manage this :smile:

Nice to watch: [Building a Growth Machine](http://www.heavybit.com/library/video/building-a-growth-machine/)

## Preview ##

![Preview](http://i.imgur.com/1LkFoB1.png)

## Installation ##

I recommend you install [Homestead](https://laravel.com/docs/5.3/homestead)

```bash
git clone https://github.com/wildlifechorus/growthExperiments.git
```

```bash
composer install
```

Generate and configure your `.env` file:

```bash
mv .env.example .env
php artisan key:generate
```

Add initial Migrations and Seeders

```bash
php artisan migrate
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=ExperimentsTableSeeder
```

You can find additional Laravel 5.3 configuration [here](https://laravel.com/docs/5.3/installation#configuration).

## Login Credentials ##

```bash
test@email.com
test
```

## Official Laravel 5.3 Documentation

Documentation for the Laravel 5.3 framework can be found on the [Laravel website](http://laravel.com/docs).

## Copyleft and License

Copyleft 2016

This project is licensed under the **["THE BEER-WARE LICENSE" (Revision 42)](http://www.cs.trincoll.edu/hfoss/wiki/Chris_Fei:_Beerware_License)**.