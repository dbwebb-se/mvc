![Symfony image](http://dbwebb.se/image/kurs/mvc/kmom01-symfony.png?w=900&h=200&cf)

Get going with Symfony
====================

This exercise will help you create a web application/service using a Symfony installation. You will add a controller, web pages using a template engine and a REST API.



Documentation
----------------------------

The exercise is built on the documentation of the Symfony project and the basics comes from the article "[Installing & Setting up the Symfony Framework](https://symfony.com/doc/current/setup.html)".



Prepare
----------------------------

Start by copying this directory.

```
# Go to the root of the course repo
rsync -av example/symfony me/kmom01
cd me/kmom01/symfony
```



Install the project skeleton
----------------------------

Install a project skeleton using `composer create-project` into the directory `app`.

This creates a traditional web application.

```
composer create-project symfony/website-skeleton app
cd app
composer require webapp
```

Inspect the files in your installation.



Run your app
-----------------------

This is examples on how you can run your application locally. It is enough if one of the alternatives works for you.



### PHP built in webserver

You can open the PHP built in webserver to verify the installation.

```
php -S localhost:8888 -t public
```

You should now be able to open a web browser to `http://localhost:8888` and see the welcome page.



### Make it run in your Apache locally

Open a browser to your installation of Apache or XAMPP and point to the `public/` directory.



### Make it run using docker-compose

This is an advanced option and only relevant if you are skilled at docker and coker-compose.

You can start the application using docker-compose if you have it enabled.

Start by copying the file `docker-compose.yaml`. The file contains the setup for various docker containers running different versions of PHP.

```
# You are in the app directory
cp ../docker-compose.yaml .
```

Start a container that mounts the current dir as the application directory.

```
docker-compose run php81-apache
```

You can now access the application with your web browser at `http://localhost:11081`.



Publish app onto the student server
-----------------------

You can now try to run the application on the student server.

Start by copying the `.htaccess` file to the `public` directory.

```
# You are in the app directory
cp ../.htaccess public
```

Edit the file `.htaccess` and change 'mosstud' to your own acronym. Do also review that the path seems to be correct.

Publish the application to the student server.

```
dbwebb publishpure me
```

Verify that it works.



Create a home page (lucky number)
-----------------------

This is a short example on how to [create your first page in Symfony](https://symfony.com/doc/current/page_creation.htm).



### Add a controller and a route

Install the annotations package.

```
# You are in the app directory
composer require annotations
```

Copy the controller file containing the code for the route `lucky/number`.

```
cp ../LuckyController.php src/Controller
```

Check that the route `lucky/number` is available.

```
bin/console debug:router
```

Open your web browser to the route `public/lucky/number` or just `lucky/number` depending on how you are running the web server.

Inspect the code in the controller and make a few small changes to the web page so you got a feeling of "owning the code".



### Render a template

Lets move the rendering of the web page to a template file and use the Twig template engine to render it.

Quickly browse the documentation on [the template engine Twig](https://twig.symfony.com/).

Install the Twig package.

```
# You are in the app directory
composer require twig
```

Copy the controller file containing the code for the route `lucky/number/twig`.

```
cp ../LuckyControllerTwig.php src/Controller
```

Copy the template file containing the code for rendering the response.

```
cp ../lucky_number.html.twig templates
```

Open your web browser to the route `public/lucky/number/twig` or just `lucky/number/twig` depending on how you are running the web server.

Inspect the code in the controller and in the template file. Make a few small changes to it and try to get the feeling of "owning the code".



### JSON response

Creating routes that send JSON data as a reply is the core in a RESTful web service. Lets create a controller that does that.

Copy the controller file containing the code for the routes `api/lucky/number` and `api/lucky/number2`.

```
cp ../LuckyControllerJson.php src/Controller
```

Open your web browser to the routes:

* `/api/lucky/number`
* `/api/lucky/number2`
* `/api/lucky/number/1/100`

Inspect the code in the controller. Make a few small changes to it and try to get the feeling of "owning the code".



Symfony bin/console
----------------------------

The tool `bin/console` is a utility that can help develop and troubleshoot your application.

Here are a few examples on how to use it.

```
# Show the routes
bin/console debug:routes

# Match a specific route
bin/console router:match /lucky/number

# Clear the cache
bin/console cache:clear

# Show available commands
bin/console
```



Where to go from here?
----------------------------

You now know the following about Symfon apps.

* How to install it.
* How to run it.
* How to add a controller and render web pages through views (template files) to your Symfony app.
* How to add routes that produces JSON responses which is an embryo to a RESTful API web service.

You might want to learn more on controllers and routing.

* [Controller](https://symfony.com/doc/current/controller.html)
* [Routing](https://symfony.com/doc/current/routing.html)



Fast track to test this README
-----------------------

These are commands to test this article by reproducing the installation using docker. These are used only for test purpose.

Warning that the commands will remove all files in the `me/kmom01/symfony` directory.

```
# Root of the course repo
rm -rf me/kmom01/symfony

# Go to the root of the course repo
rsync -av example/symfony me/kmom01
cd me/kmom01/symfony

# Install app from skeleton
#docker-compose run php80 composer create-project symfony/skeleton app
docker-compose run php81 composer create-project symfony/skeleton app
cp docker-compose.yaml app
cd app
#docker-compose run php80 composer require webapp
docker-compose run php81 composer require webapp

# Student server
cp ../.htaccess public
dbwebb publishpure me

# Create first page
docker-compose run php81 composer require annotations
cp ../LuckyController.php src/Controller

docker-compose run php81 composer require twig
cp ../LuckyControllerTwig.php src/Controller
cp ../lucky_number.html.twig templates

cp ../LuckyControllerJson.php src/Controller
```

Test the application in docker.

```
docker-compose up php81-apache
```

Access the application with your web browser at `http://localhost:11081`.

Debug the routes and clear the cache.

```
docker-compose run php81 bin/console debug:router
docker-compose run php81 bin/console cache:clear
```
