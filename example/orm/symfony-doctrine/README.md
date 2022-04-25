Get going Symfony Doctrine
===========================

The docs to read and work through.

* https://symfony.com/doc/current/doctrine.html



Install
-----------------------

Install using composer create project into the directory `app`.

```
composer create-project symfony/website-skeleton app
ls app
```

You can open the PHP built in webserver to verify the installation.

```
php -S localhost:8080 -t app/public
```



Run in your local Apache
---------------------------

To be able to run the application in your local Apache you need to have a `.htaccess`.

```
cd app
cp ../.htaccess public
```



Configure the database URL
---------------------------

Create a file `.env.local` in your editor and create the `DATABASE_URL` to your liking. The content in this file will override and add to the the content in the `.env` file.

For SQLite, use the default setup.

```
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
```

The database file will now be stored as `var/data.db`.

You can also copy a `.env.local` like this, it already have the above settings.

```
cp ../.env.local .
```

<!-- MySQL -->



Create the database
---------------------------

You can now create the database.

```
php bin/console doctrine:database:create
```

This will create the database file `var/data.db`. Open it and check its schema (should be empty at first).

```
sqlite3 var/data.db
```



Create a Entity Class
---------------------------

You can now create a Entity Class, the class to hold the data to be saved to the database.

Create a Product with these fields.

* name:string
* value:int

Run the command to create the product entity class.

```
php bin/console make:entity
```

The following files were created. Open them in your editor to review them.

```
created: src/Entity/Product.php
created: src/Repository/ProductRepository.php
```

<!--
```
cp ../Product.php src/Entity
cp ../ProductRepository.php src/Repository
```
-->



Create and run a migration
---------------------------

When you update your entities you need to apply those changes to the database using migrations.

First create the migration and inspect its result. Its the SQL that creates and alters the existing datababase.

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

There should be a table that maps to your entity class.



Create a controller using the entity
---------------------------

Lets create a controller that uses the entity.

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

<!--
```
cp ../ProductController.php src/Controller
cp ../HelloController.php src/Controller
```
-->



Add a route `product/create`
---------------------------

To your controller, add a new method like this, to create a new product.

```
use App\Entity\Product;

/**
 * @Route("/product/create", name="create_product")
 */
public function createProduct(): Response
//public function createProduct(EntityManagerInterface $entityManager): Response
{
    // you can fetch the EntityManager via $this->getDoctrine()
    // or you can add an argument to the action:
    //  createProduct(EntityManagerInterface $entityManager)
    $entityManager = $this->getDoctrine()->getManager();

    $product = new Product();
    $product->setName('Keyboard_num_' . rand(1, 9));
    $product->setValue(rand(100, 999));

    // tell Doctrine you want to (eventually) save the Product (no queries yet)
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

You can also use the console to do SQL.

```
php bin/console doctrine:query:sql 'SELECT * FROM product'
```



Add a route `product/all`
---------------------------

To your controller, add a new method like this, to view all products.

```
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/product/all", name="find_all_product")
 */
public function findAllProduct(
        EntityManagerInterface $entityManager
): Response {
    $products = $entityManager
        ->getRepository(Product::class)
        ->findAll();

    return $this->json($products);
}
```

Open the route path in your browser to view the result.



Add a route `product/{id}`
---------------------------

To your controller, add a new method like this, to view a product by its id.

```
/**
 * @Route("/product/{id}", name="product_find_by_id")
 */
public function findByIdProduct(int $id): Response {
    $product = $this->getDoctrine()
        ->getRepository(Product::class)
        ->findById($id);

    return $this->json($product);
}
```

Open the route path in your browser to view the result.



Publish and run on student server
---------------------------

Edit the file `public/.htaccess`. There is a sample file in the root of the example directory.

Publish to the student server using dbwebb cli.

```
dbwebb publishpure me
# or
dbwebb publispure symfony-doctrine
```

You can also login to the student server and execute the console commands, this might be useful for troubleshooting or analysing the database.

```
dbwebb login
cd www/dbwebb-kurser/mvc/me/orm-test/symfony-doctrine/app
php bin/console debug:router
php bin/console doctrine:query:sql 'SELECT * FROM product'
```



The quick version of this guide
---------------------------

This is how to quickly repeat the setup of this guide.

```
composer create-project symfony/website-skeleton app
cd app
cp ../.htaccess public
cp ../.env.local .
cp ../HelloController.php src/Controller
cp ../Product.php src/Entity
cp ../ProductRepository.php src/Repository
cp ../ProductController.php src/Controller
install -d templates/product
cp ../index.html.twig templates/product
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

Useful commands, used in the guide.

```
php bin/console doctrine:database:create
sqlite3 var/data.db
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console make:controller ProductController
php bin/console debug:router
php bin/console debug:router product
php bin/console router:match /product
php bin/console doctrine:query:sql 'SELECT * FROM product'
```




Problems
---------------------------

No particular problems detected.
