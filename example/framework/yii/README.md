Get going Yii
====================

Documentation

* https://www.yiiframework.com/doc/guide/2.0/en/start-installation
* https://www.yiiframework.com/doc/guide/2.0/en/start-hello

Install using composer create project into the directory `app`.

```
composer create-project --prefer-dist yiisoft/yii2-app-basic app
ls app
```

Open a browser to your own installation of Apache or XAMPP and point to the `web/` directory.



Create routes, controllers and views
-----------------------

Copy example files.

```
cp .htaccess app/web
mkdir app/views/hello-world
cp message.php app/views/hello-world
cp HelloWorldController.php app/controllers
cp web.php app/config
```

Try out the routes.

```
web/hello-world/hello1
web/hello-world/hello2
web/hello-world/hello?message=The-message
```
