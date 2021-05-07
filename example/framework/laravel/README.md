Get going Laravel
====================

Documentation

* https://laravel.com/docs/8.x



Install
-----------------------

Install using composer create project into the directory `app`.

```
composer create-project laravel/laravel app
ls app
```

You can open the PHP built in webserver to verify the installation.

```
php -S localhost:8080 -t app/public
```



Make it run in your Apache locally
-----------------------

Make it run in your own Apache or XAMPP installation.

Open a browser to your own installation of Apache or XAMPP and point to the `public/` directory.

If you get an error:

> The stream or file "...laravel/app/storage/logs/laravel.log" could not be opened in append mode: failed to open stream: Permission denied

```
# Make the storage dir writable by the web server
chmod -R o+w app/storage/
```

Reload the page.



Make it run on the student server
-----------------------

Copy the `.htaccess` file.

```
# From the root of the example directory
cp .htaccess app/public
```

Edit the file and change 'mosstud' to your own acronym. Do also review that the path seems to be correct.

Publish using `dbwebb publishpure` to the student server and verify that it works.



Implement views, routes and controllers
-----------------------

Copy example files.

```
# From the root of the example directory
cp *Controller.php app/app/Http/Controllers
cp *.blade.php app/resources/views
cp web.php app/routes
```

<!--
Unclear if this is needed.

Always clear the cache when updating your routes.

```
cd app
php artisan route:cache
```
-->

Try out the routes, both locally and publish to the student server.

```
app/public/hello-world
app/public/hello-world-view
app/public/hello
app/public/hello/hello-the-new-world-by-arg
```

There is a form example that uses the flash session at the following url.

```
app/public/form
```



The fast track
-----------------------

These are the commands to execute to quickly setup the installation in this guide.

```
composer create-project laravel/laravel app
chmod -R o+w app/storage/
cp .htaccess app/public
cp *Controller.php app/app/Http/Controllers
cp *.blade.php app/resources/views
cp web.php app/routes
```

Start the web server.

```
php -S localhost:8080 -t app/public
```

Useful commands.

```
php artisan route:list
```



Problem
-----------------------

No particular problems were detected.
