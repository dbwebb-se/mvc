Get going Symfony
====================

Documentation

* https://symfony.com/doc/current/setup.html

Install using composer create project into the directory `app`.

```
composer create-project symfony/website-skeleton app
cd app
```

Make it run in your own Apache or XAMPP installation.

```
# Make the dirs writable by the web server
chmod o+w var/{cache,log}
```

Open a browser to your own installation of Apache or XAMPP and point to the `public/` directory.



Create routes, controllers and views
-----------------------

Check the status of the routes.

```
php bin/console debug:router
```

Copy example files.

```
cp .env app
cp HelloWorldController.php app/src/Controller
cp message.html.twig app/templates
cp routes.yaml app/config
```

Try out the routes.

```
app/public/hello-world
app/public/hello-world-view
app/public/hello
app/public/hello/hello-the-new-world-by-arg
```
