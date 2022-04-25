MariaDB as development and production environment
--------------------------

This is an optional part of this exercise and shows how you can use the MariaDB database instead of SQLite.



### Local database in `.env.local`

Update your settings in `.env.local` and comment out the previous database url and add another setting for MariaDB. This is the general setup.

```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=mariadb-10.5.8"
```

You can use the following SQL code to create the database.

```
CREATE DATABASE mvc;
```

You can also create the database user or you can use another user that you already have created.

```
CREATE USER 'maria'@'localhost' IDENTIFIED BY 'PAssw0rd';
GRANT ALL PRIVILEGES ON mvc.* TO 'maria'@'localhost';
```

<!--
Osäker om det behövs?
CREATE USER 'maria'@'%' IDENTIFIED BY 'PAssw0rd';
GRANT ALL PRIVILEGES ON mvc.* TO 'maria'@'%';
-->

Updating the database url it can now look like this.

```
DATABASE_URL="mysql://maria:PAssw0rd@127.0.0.1:3306/mvc?serverVersion=mariadb-10.5.8"
```
