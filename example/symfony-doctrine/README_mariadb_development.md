MariaDB as development environment
===========================

This is an optional part of this exercise and shows how you can use the MariaDB database instead of SQLite as the local database.



A walkthrough
-----------------------------------

There is a recording where Mikael walks and talks you through this exercise.

[![YouTube video image](http://img.youtube.com/vi/nEiN3mUGnmw/0.jpg)](http://www.youtube.com/watch?v=nEiN3mUGnmw "Kmom05 - Symfony och Doctrine ORM med MariaDB som lokal utvecklingsmiljö (övning)")



Local database in `.env.local`
---------------------------

Create the file `.env.local` and update your settings for the `DATABASE_URL` by adding the setting for MariaDB. The details in the `.env.local` will override the settings in the `.env`.

This is the general setup of the connection string.

```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=mariadb-10.5.8"
```

You should now modify it to your environment, for example like this.

```
DATABASE_URL="mysql://maria:P%40ssw0rd@127.0.0.1:3306/mvc?serverVersion=mariadb-10.6.5"
```

The part with `%40` is the character `@` as urlencoded. You can find it out like this.

```
php -r "echo urlencode('P@ssw0rd');"
```

You can find your database version like this.

```
mariadb -e "SELECT VERSION();"
```




Create the database
---------------------------

You can now create the database.

```
php bin/console doctrine:database:create
```

This will create the database named in your connection url. You can now open the database and check its schema which should be empty at first.

```
mariadb mvc -e "SHOW TABLES;"
```


Create and run a migration
---------------------------

You can now create a migration to build up the database.

First create the migration and inspect its result. It is the SQL that creates and alters the existing datababase.

```
php bin/console make:migration
```

Then run and apply the migration.

```
php bin/console doctrine:migrations:migrate
```

Now you can review the current schema in the database.

```
mariadb mvc -e "SHOW TABLES;"
```

There should be a table that maps to your entity class (and some other utility tables managed by Doctrine).



Run SQL towards the database
---------------------------

You can also use the console to do pure SQL towards the database.

```
php bin/console dbal:run-sql 'SELECT * FROM product'
```



Test your application
---------------------------

You can now test your application and add, view, update and delete products.

You should see that the same codebase you used to SQLite will now work MariaDB.

You can change the database url in `.env.local` to reflect what database you are using.



MariaDB as the production environment on the student server
---------------------------

There is an article showing how to use "[MariaDB as production environment on the student server](README_mariadb_production.md)". It shows how to setup the `.dev.student.local` to enable using MariaDB as the database server when running the application on the student server.



<!-- Raw SQL -->

<!-- Add methods to the entity object -->
<!-- Search page -->
