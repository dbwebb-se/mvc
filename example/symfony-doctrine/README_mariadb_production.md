MariaDB as production environment
--------------------------

This is an optional part of this exercise and shows how you can use the MariaDB database as a production environment on the student server.



### Database in `.env.student.local`

Create a file `.env.student.local` which is a file containing the database url to use when the application is running on the student server. You can read a bit on the background on the [naming of the env file](https://github.com/dbwebb-se/mvc/issues/37).

The general setup is like this.

```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=mariadb-10.5.8"
```

You should now modify it to your environment, for example like this.

```
DATABASE_URL="mysql://maria:db_password@127.0.0.1:3306/db_name?serverVersion=mariadb-10.5.8"
```


You can use the following SQL code to create the database.

```
DATABASE_URL="mysql://maria:P%40ssw0rd@127.0.0.1:3306/mvc?serverVersion=mariadb-10.6.5"
```

The part with `%40` is the character `@` as urlencoded. You can find it out like this.

```
php -r "echo urlencode('P@ssw0rd');"
```

You can find your database version like this.

```
mariadb mvc -e "SELECT VERSION();"
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





<!-- Raw SQL -->

<!-- Add methods to the entity object -->
<!-- Search page -->
