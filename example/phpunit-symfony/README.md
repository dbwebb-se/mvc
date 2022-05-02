Run unittests with PHPUnit in Symfony
==========================

This exercise will show you how to get going with unittesting in Symfony using PHPUnit.

This short article is based on the longer Symfony documentation article "[Testing](https://symfony.com/doc/current/testing.html)". You can head over to that article after you have completed the installation in this article. The important part are about unit test, you can skip (or read fast) the parts of integration and application tests.



Install PHPUnit
--------------------------

The tool [PHPUnit](https://phpunit.de/) will help you create and execute unit tests for your code.

Symfony integrates with PHPUnit and we can use composer to install it. Symfony will add their own layer of helpers on top of PHPUnit.

```
# Go to the root of your Symfony directory
composer require --dev symfony/test-pack
```

Verify that the tool can be executed.

```
bin/phpunit
```



### Configuration file

Symfony adds the PHPUnit configuration file as `phpunit.xml.dist` and it will be enough to start with.



First test case
--------------------------

Lets setup the first test suite and execute it. Here are the example code you can use for it. Copy the code to your own installation of symfony.

* [`src/Dice/Dice.php`](src/Dice/Dice.php)
* [`tests/Dice/DiceTest.php`](tests/Dice/DiceTest.php)

Try to execute the test suite.

```
bin/phpunit
```

It could look like this showing that the test suite was successfully executed and it contains of one test case and two assertions.

```
PHPUnit 9.5.20

Testing
.                                                                   1 / 1 (100%)

Time: 00:00.038, Memory: 6.00 MB

OK (1 test, 2 assertions)
```



Code coverage report
--------------------------

Lets generate a code coverage report from the test suite.

You need to have installed [Xdebug](https://xdebug.org/) to generate code coverage reports.



### Code coverage as text

Execute the test suite and generate a code coverage report as text.

```
XDEBUG_MODE=coverage bin/phpunit --coverage-text tests/Dice/DiceTest.php
```

You will get a report for all your classes. You should be able to see the Dice class, with a report looking something like this.

```
App\Dice\Dice
  Methods:  66.67% ( 2/ 3)   Lines:  50.00% (  2/  4)
```



### Code coverage as HTML

We can also generate code coverage as HTML. To do so we update the configuration file `phpunit.xml.dist` with a report instruction on the code coverage.

```
<report>
  <clover outputFile="build/coverage.clover"/>
  <html outputDirectory="build/coverage" lowUpperBound="35" highLowerBound="70"/>
</report>
```

You should place that section within the `<coverage>` and `</coverage>`. You can see a complete configuration filen in [`phpunit.xml.dist`](phpunit.xml.dist).

When the test suite is executed and the code coverage reports are generated it might look like this in the output.

```
Generating code coverage report in Clover XML format ... done [00:00.167]

Generating code coverage report in HTML format ... done [00:00.060]
```

The Clover XML format is easy to use for other tools, for example when you want an external tool to visualize the code coverage report. That is why we included as default of your setup.

The HTML report is generated in the directory `build/coverage`, open it up with your web browser. Find the coverage for the Dice class and try to add another test case with assertions to make it fully covering the class.



Composer scripts
--------------------------

To make it easier to execute the tool you can add it to the script section of your `composer.json`.

This is how you can add the scripts.

```
{
    "scripts": {
        "phpunit": "XDEBUG_MODE=coverage vendor/bin/phpunit"
    }
}
```

You can verify that your update did not make the `composer.json` corrupt by running the following command.

```
composer validate
```

If all seems okey you should be able to execute the tool like this.

```
composer phpunit
```

You can read more on "[composer and writing custom commands](https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands)".
