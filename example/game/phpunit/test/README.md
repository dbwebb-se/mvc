About the phpunit test directory
================================

About Mock.

Create the  Mock files/classes in the directory `test/Mock/<file>.php` and the `config.php` will include it and thus make it available in the test classes.

About running only a test class.

```
make phpunit options="test/Controller"
make phpunit options="test/Controller/ControllerFormTest.php"
```

About running only a test method.

```
make phpunit options="--filter testControllerViewAction test/Controller"  
make phpunit options="--filter testControllerViewAction"
```

Add the `view/` directory for code coverage.

```
<directory suffix=".php">view</directory>
```
