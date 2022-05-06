Symfony and Doctrine
==========================

This exercise will show you how to get going with the Doctrine ORM within your Symfony project.

This short article is partly based on the longer Symfony documentation article "[Databases and the Doctrine ORM](https://symfony.com/doc/current/doctrine.html)". You can head over to that article to review it, after you have completed this exercise.



A walkthrough
-----------------------------------

There is a recording where Mikael walks and talks you through this exercise.

[![YouTube video image](http://img.youtube.com/vi/1fs8OWvMhdg/0.jpg)](http://www.youtube.com/watch?v=1fs8OWvMhdg "Kmom05 - Symfony och Doctrine ORM CRUD (övning)")



Install Doctrine
--------------------------

You can install Doctrin via the ORM Symfony pack.

```
# Go to the root of your Symfony directory
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```



Configure the database URL
---------------------------

The `.env` files contain configuration details for your Symfony application.

Open your file `.env` in your editor and edit the `DATABASE_URL`. For this exercise we will start using SQLite.

This is how the setting should look like for SQLite.

```
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
```

The database file will now be stored as `var/data.db`.



About DotEnv
---------------------------

Using `.env` files to configure your application is used by many frameworks and in many programming languages.

The concept first started with the [DotEnv for Ruby](https://github.com/bkeepers/dotenv) and it was then ported to other languages. There is for example a [PHP DotEnv](https://github.com/vlucas/phpdotenv). You can read more on [Configuring Symfony using .env](https://symfony.com/doc/current/configuration.html).

In the README for Ruby DotEnv there is a [table showing the order of the configuration files](https://github.com/bkeepers/dotenv#what-other-env-files-can-i-use) and with recommendations for which files should be checked in to Git and which ones should not be checked in, given that you follow the recommendations and always have your secrets in the files ending with `.local`.



Verify settings from Dotenv
--------------------------

You can verify the files and settings that are read by the DotEnv.

```
# Debug the dotenv
php bin/console debug:dotenv
```

This can be helpful to debug issues with the configuration settings.



Create the database
---------------------------

You can now create the database.

```
php bin/console doctrine:database:create
```

This will create the database file `var/data.db`. You can now open it and check its schema which should be empty at first.

```
sqlite3 var/data.db
```



Create a Entity Class
---------------------------

You can now create a Entity Class, the class to hold the data to be saved to the database.

Run the command to create the product entity class.

```
php bin/console make:entity
```

Create a class called Product with two fields.

* name:string
* value:int

The following files were created. Open them in your editor to review them.

```
created: src/Entity/Product.php
created: src/Repository/ProductRepository.php
```



Create and run a migration
---------------------------

When you update your entities you need to apply those changes to the database using migrations.

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
sqlite3 var/data.db
```

There should be a table that maps to your entity class (and some other utility tables managed by Doctrine).



Create a controller using the entity
---------------------------

Lets create a controller that can use the Product entity.

```
php bin/console make:controller ProductController
```

Review the files created.

```
created: src/Controller/ProductController.php
created: templates/product/index.html.twig   
```

Check your routes.

```
php bin/console debug:router
php bin/console debug:router product
php bin/console router:match /product
```

Open up the route `/product` in your browser to access the controller handler.



Add a route `product/create`
---------------------------

To your controller, add a new method like this, to create a new product.

```
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @Route("/product/create", name="create_product")
 */
public function createProduct(
    ManagerRegistry $doctrine
): Response {
    $entityManager = $doctrine->getManager();

    $product = new Product();
    $product->setName('Keyboard_num_' . rand(1, 9));
    $product->setValue(rand(100, 999));

    // tell Doctrine you want to (eventually) save the Product
    // (no queries yet)
    $entityManager->persist($product);

    // actually executes the queries (i.e. the INSERT query)
    $entityManager->flush();

    return new Response('Saved new product with id '.$product->getId());
}
```

Open the route path in your browser to create a new product into the database.

If you get a "Read-only" error on your database, then make it writable for the user who runs the web server.

```
chmod 666 var/data.db
```

Review the content of your database, your newly created rows should be there.

```
sqlite3 var/data.db
```



Run SQL towards the database
---------------------------

You can also use the console to do pure SQL towards the database.

```
php bin/console dbal:run-sql 'SELECT * FROM product'
```



Add a route `product/show`
---------------------------

To your controller, add a new method like this, to view all products.

```
use App\Repository\ProductRepository;

/**
    * @Route("/product/show", name="product_show_all")
    */
public function showAllProduct(
    ProductRepository $productRepository
): Response {
    $products = $productRepository
        ->findAll();

    return $this->json($products);
}
```

Open the route path in your browser to view the result.



Add a route `product/show/{id}`
---------------------------

To your controller, add a new method like this, to view a product by its id.

```
/**
 * @Route("/product/show/{id}", name="product_by_id")
 */
public function showProductById(
    ProductRepository $productRepository,
    int $id
): Response {
    $product = $productRepository
        ->find($id);

    return $this->json($product);
}
```

Open the route path in your browser to view the result.



Add a route `product/delete/{id}`
---------------------------

To your controller, add a new method like this, to delete a product by its id.

```
/**
 * @Route("/product/delete/{id}", name="product_delete_by_id")
 */
public function deleteProductById(
    ManagerRegistry $doctrine,
    int $id
): Response {
    $entityManager = $doctrine->getManager();
    $product = $entityManager->getRepository(Product::class)->find($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $entityManager->remove($product);
    $entityManager->flush();

    return $this->redirectToRoute('product_show_all');
}
```

Open the route path in your browser to view the result.

Remember that methods that update the state and the database should really be POST and not GET. This method was just simpler to implement to show how to work with Doctrine to update the database.



Add a route `product/update/{id}/{value}`
---------------------------

To your controller, add a new method like this, to update a product by its id and provide a new value to it.

```
/**
 * @Route("/product/update/{id}/{value}", name="product_update")
 */
public function updateProduct(
    ManagerRegistry $doctrine,
    int $id,
    int $value
): Response {
    $entityManager = $doctrine->getManager();
    $product = $entityManager->getRepository(Product::class)->find($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $product->setValue($value);
    $entityManager->flush();

    return $this->redirectToRoute('product_show_all');
}
```

Open the route path in your browser to view the result.

Remember that methods that update the state and the database should really be POST and not GET. This method was just simpler to implement to show how to work with Doctrine to update the database.



SQLite and the production environment
--------------------------

You can now try and push the repo to the studentserver to verify that the application also works there.

You should be able to see that your local database is uploaded and used at the student server.



Build custom queries into Repository object
--------------------------

If you want to add more custom queries into the ProductRepository object you might just add methods to it. There are several ways of writing these methods together with SQL to perform the actual queries.

* [Doctrine Query Language](https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/dql-doctrine-query-language.html) (almost like SQL but for objects)
* [Query builder](https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/query-builder.html) (build queries through methods)
* [Native SQL](https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/native-sql.html) (execute SQL and map results to entities)
* Standard SQL

You can read more on these different types of techniques and how to extend the ProductRepository with more methods in the article section "[Querying for Objects: The Repository](https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository)".

That article also has sections on working with relationships and associations and how to work with testing when databases are involved.



MariaDB as development environment
--------------------------

This is an optional part that let you work with the MariaDB as the database.

You can now try to change your database url to use MariaDB instead. There is an article "[MariaDB as development environment](README_mariadb_development.md)" showing you how that can be done.

There is also an article showing how to use "[MariaDB as production environment on the student server](README_mariadb_production.md)".
