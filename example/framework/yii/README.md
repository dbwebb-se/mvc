Get going Yii
====================

Documentation

* https://www.yiiframework.com/doc/guide/2.0/en/start-installation
* https://www.yiiframework.com/doc/guide/2.0/en/start-hello



Install it
-----------------------

Install using composer create project into the directory `app`.

```
composer create-project --prefer-dist yiisoft/yii2-app-basic app
ls app
```

You can open the PHP built in webserver to verify the installation.

```
php -S localhost:8080 -t app/web
```



Make it run in your Apache locally
-----------------------

Open a browser to your own installation of Apache or XAMPP and point to the `web/` directory.



Make it run on the student server
-----------------------

Copy the `.htaccess` file.

```
# From the root of the example directory
cp .htaccess app/web
```

Edit the file and change 'mosstud' to your own acronym. Do also review that the path seems to be correct.

Publish using `dbwebb publishpure` to the student server and verify that it works.



Implement views, routes and controllers
-----------------------

Copy example files.

```
# From the root of the example directory
mkdir app/views/hello-world
cp message.php app/views/hello-world
cp HelloWorldController.php app/controllers
cp web.php app/config
```

Try out the routes, both locally and publish to the student server.

```
web/hello-world/hello1
web/hello-world/hello2
web/hello-world/hello?message=The-message
```



Problem
-----------------------

* When publishing to the student server you (might) get error on files that can not be removed. This is due to these cache-files being generated from the web server and you have no rights to these directories or files. The Yii application seems to work anyway. So it is okey to proceed anyway.
