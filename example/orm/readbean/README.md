Get going ReadBeanPHP
===========================

The docs to read and work through.

* https://redbeanphp.com/index.php?p=/install
    * https://github.com/gabordemooij/redbean/blob/master/README.markdown
* https://redbeanphp.com/index.php?p=/models



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
