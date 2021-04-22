Get going Laravel
====================

Documentation

* https://laravel.com/docs/8.x

Install using composer create project into the directory `app`.

```
composer create-project laravel/laravel app
ls app
```

Make it run in your own Apache or XAMPP installation.

```
# Make the storage dir writable by the web server
chmod -R o+w storage/
```

Open a browser to your own installation of Apache or XAMPP and point to the `public/` directory.



Create routes, controllers and views
-----------------------

Copy example files.

```
cp .htaccess app/public
cp HelloWorldController.php app/app/Http/Controllers
cp message.blade.php app/resources/views
cp web.php app/routes
```

Clear the cache when updating your routes.

```
php artisan route:cache
```

Try out the routes.

```
app/public/hello-world
app/public/hello-world-view
app/public/hello
app/public/hello/hello-the-new-world-by-arg
```
