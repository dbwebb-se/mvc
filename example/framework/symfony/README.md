Get going Symfony
====================

Documentation

* https://symfony.com/doc/current/setup.html

Install using composer create project into the directory `app`.

```
composer create-project symfony/website-skeleton app
ls app
```

You can open the PHP built in webserver to verify the installation.

```
php -S localhost:8080 -t app/public
```


Make it run in your Apache locally
-----------------------

Open a browser to your own installation of Apache or XAMPP and point to the `public/` directory.



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
cp .env app
cp HelloWorldController.php app/src/Controller
cp message.html.twig app/templates
cp routes.yaml app/config
```

Check the status of the routes.

```
php bin/console debug:router
```

Try out the routes.

```
app/public/hello-world
app/public/hello-world-view
app/public/hello
app/public/hello/hello-the-new-world-by-arg
```



Problem
-----------------------

No particular problems were detected.

<!--
* If you run into cache issues when publishing to the student server, try to clear the cache and warm it up for the production server (student server).

```
APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear
```
-->

<!--
* Clear the cache by executing `php bin/console cache:pool:clear`.
-->
