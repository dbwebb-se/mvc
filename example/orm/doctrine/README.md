Get going Doctrine
===========================

The docs to read and work through.

* https://www.doctrine-project.org/projects/doctrine-orm/en/current/tutorials/getting-started.html



Install
---------------------------

Check what version is used in the `composer.json`, update if needed, then install it.

```
composer install
```

If you want to do a fresh restart then remove all generated and installed files.

```
composer clean
```

You can verify the installation by checking that the cli command works.

```
vendor/bin/doctrine
```



Create the database
---------------------------

The example uses SQLite and stores the database in the `db/` directory.

You create the database using the Doctrine command.

```
vendor/bin/doctrine orm:schema-tool:create
```

If you make changes to the layout of the stored objects you may need to re-create the database.

Do either of these commands.

```
# Drop and create from scratch
vendor/bin/doctrine orm:schema-tool:drop --force
vendor/bin/doctrine orm:schema-tool:create
```

```
# Update to only adapt the changes made
vendor/bin/doctrine orm:schema-tool:update --force
```



Scripts using the database
---------------------------

In the `bin/` directory there are a couple of scripts that uses the database. Try them out and review their source code to evaluate how one works with Doctrine.

Start with these commands to get going.

```
php bin/create.php Mumin 1337
php bin/findAll.php
```



Check the database
---------------------------

Open up the SQLite database and review the schema created.

Use regular SQL to see the content of the database.

```
sqlite3 db/db.sqlite
```



Problems
---------------------------

No particular problems detected.
