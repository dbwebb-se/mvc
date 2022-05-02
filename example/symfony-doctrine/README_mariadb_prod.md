MariaDB as production environment
===========================

This is an optional part of this exercise and shows how you can use the MariaDB database as the production environment on the studentserver specifically by using the student database server.



APP_ENV as student
--------------------------

The `.env` files are read in order and from the comments we can see in what order they are read by the environment.

```
# In all environments, the following files are loaded if they exist,
# the latter taking precedence over the former:
#
#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides
#
# Real environment variables win over .env files.
```

This means that if we set the environment variable `APP_ENV="student"` on the student server, then we can provide a configuration file `.env.student` (which can be committed) and a `.env.student.local` (uncommitted) with settings valid for the database url to use on that specific environment.



The student database
--------------------------

We have the general url for MariaDB and we now need to find the specific settings for the student database server.

```
DATABASE_URL="mysql://db_user:db_password@db_server:db_port/db_name?serverVersion=mariadb-10.5.8"
```

These are the specific settings for the student database server.

| Setting     | Value |
|-------------|-------|
| db_user     | Your student acronym. |
| db_password | The password generated for you by the tool at the student portal. |
| db_server   | blu-ray.student.bth.se |
| db_port     | 3306 |
| db_name     | You have one database with the same name as your student acronym. You can not create more databases. |
| serverVersion | Login to the database to find out the current version used. |

The specific settings for the student database server will then look like this.

```
DATABASE_URL="mysql://acronym:password@blu-ray.student.bth.se:3306/acronym?serverVersion=mariadb-10.5.8"
```

You can log in to the database using the terminal by first login to the ssh.student and then start the terminal to connect to the database server.

This is how to login to ssh.student.

```
# Using dbwebb-cli with ssh keys
dbwebb login

# Using ssh with password (or ssh keys)
ssh acronym@ssh.student.bth.se
```

You can now open the terminal client to the database server and directly connect to your database. Change the value of acronym to your own student acronym. Remember that the password for the database is different from the password you use to login to ssh.student.

```
mariadb -uacronym -p -hblu-ray.student.bth.se acronym
```

Once you are connected you can execute `SELECT VERSION();` to find your `serverVersion`.



Database in `.env.student.local`
--------------------------

For this exercise we opt to use the uncommitted `.env.student.local`. Create that file and add the database url to it.

The general setup is like this.

```
DATABASE_URL="mysql://db_user:db_password@db_server:db_port/db_name?serverVersion=mariadb-10.5.8"
```

We can update the configuration setting to use variables to enhance readability of the database url and provide values for the specific settings of the student database.

```
# Update these settings for your connection to the student database
DATABASE_USER="acronym"
DATABASE_PASSWORD="password"
DATABASE_HOST="blu-ray.student.bth.se"
DATABASE_PORT="3306"
DATABASE_NAME="acronym"
DATABASE_VERSION="mariadb-10.5.8"

# The database url uses the values from the settings above
DATABASE_URL="mysql://$DATABASE_USER:$DATABASE_PASSWORD@$DATABASE_HOST:$DATABASE_PORT/$DATABASE_NAME?serverVersion=$DATABASE_VERSION"
```



### Verify settings from Dotenv

You can verify that the settings are correct by debugging the dotenv and use the `APP_ENV=student`.

```
# Set the environment to use
export APP_ENV="student"

# Debug the dotenv
php bin/console debug:dotenv
```

You can now see the specific settings read from each .env file and the final settings.

Unset the APP_ENV when you are done.

```
# Set the environment to use
unset APP_ENV
```


<!--
Secrets in `.env.student.local`
--------------------------

echo -n "xxx" | php bin/console secrets:set DATABASE_PASSWORD -
bin/console secrets:list --reveal
bin/console debug:dotenv

-->



Try out the new database
--------------------------

You can now publish your application to the student server and see what happens.

You will most likely get an error message saying that your database is not setup. You can then create the database, the first migration and then run it. You need to do so on the student server.

```
# Login to the student server
dbwebb login

# Move to the project directory
cd www/dbwebb-kurser/mvc/me/report
```

Run the following commands on the student server.

Before you start, check the output of your DotEnv environment and verify that the correct database url is used.

```
bin/console debug:dotenv
```

Now you can move on to set up the database.

Do create the database.

```
bin/console doctrine:database:create
```

Prepare and execute the first migration that creates the database tables.

```
bin/console make:migration
bin/console doctrine:migrations:migrate
```

Verify that the connection works and that you can perform a SQL query.

```
php bin/console dbal:run-sql 'SELECT * FROM product'
```

You can now reload your database application and start adding products. Your application code should work without the need of any changes.
