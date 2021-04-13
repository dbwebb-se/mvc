Get going with phpunit
===================================

This is short tutorial with code samples on how to get going with phpunit for unit testing and code coverage.

* [A walkthrough](#a-walkthrough)
* [Prerequisite](#prerequisite)
* [Get going](#get-going)
* [The game source code](#the-game-source-code)
* [Directory structure](#directory-structure)
* [Executing the test cases](#executing-the-test-cases)
* [Review the code coverage](#review-the-code-coverage)
* [Get good code coverage](#get-good-code-coverage)
* [Review a test case](#review-a-test-case)
* [More on testing](#more-on-testing)
* [Summary](#summary)
* [Excercise](#excercise)
* [Thoughts](#thoughts)



A walkthrough
-----------------------------------

There is a recording from a Zoom session where Mikael walks you through this exercise.

[![YouTube video image](http://img.youtube.com/vi/HSZH4VKpE_k/0.jpg)](http://www.youtube.com/watch?v=HSZH4VKpE_k "Kurs mvc kmom03 tisdagsgenomgång, del 2/3 övning phpunit (Zoom med Mikael)")



Prerequisite
-----------------------------------

You have PHP 7.3 or above.

You have composer installed.

You have installed and enabled the PHP Xdebug extension for PHP CLI.



Get going
-----------------------------------

The directory contains code to run the game "Guess my number". You can play the game like this.

First install the essentials and dump the autoloader.

```
composer install
```

Or by using the Makefile.

```
make install
```

Now point your browser to the gamecontroller in `htdocs/index.php` to launch the game.

It looks like this.

![The game in a browser](doc/img/the-game.png)

The game should be working and be playable as one would expect.



The game source code
-----------------------------------

The source code for this example is mainly a class [`Guess`](src/Guess/Guess.php) implementing the game "Guess my number" where it holds a number between 1 and 100 and the guesser should guess the number where each guess results in a reply of "Correct", "To high" or "To low".

An exception is thrown when your guess is higer than 100 or lower than 1.

The game controller is in the file [`htdocs/index.php`](htdocs/index.php).

The game is rendered by the view in [`view/guess`](view/guess).

The basic configuration is setup in [`config/config.php`](config/config.php), mostly dealing with error handling and a default exception handler that takes care of all exceptions not caught by the programmer.



Directory structure
-----------------------------------

This is the directory structure for the complete example program.

| Item            | Description     |
| :-------------- | :-------------- |
| `REAME.md`      | This file.         |
| `Makefile`      | Makefile to easy carry out various tasks. |
| `composer.json` | To use the autoloader from composer. |
| `config/`       | Directory for configuration files. |
| `doc/img/`      | Images used in this README file. |
| `htdocs/`       | The actual web program using the source code classes and implementing the game. |
| `src/`          | The source code classes to test. |
| `view/`         | Template files to create views. |
| `test/<srcdir>` | The test suite with all test cases that phpunit will execute. |
| `test/config.php` | Configuration file to setup PHP essentials for phpunit and the surroundings, including the autoloader and defining constanst or including mocks. |
| `.phpunit.xml`  | Configuration read by phpunit on startup. |

Check out the directory structure and the content of the files to get acquainted with them.



Executing the test cases
-----------------------------------

The test suite consists of the test cases in the directory `test/` and its subdirectories.

All classes ending with postfix `Test` will be executed by phpunit. You can have all your test cases in one class, or one class per source class, or several test classes per source class, and in your own directory structure. How you do is all about structure, readability and maintainability.

I usually prefer dividing my test cases into several test classes for each source class, where appropriate, it gives me better overview of the test cases and enhance the documentation of the test suite.

You can execute the test suite, with all test cases, through the Makefile.

```text
make phpunit
```

Or

```text
make test
```

The output can look like this.

```text
PHPUnit 9.5.4 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 00:00.054, Memory: 10.00 MB

OK (3 tests, 8 assertions)

Generating code coverage report in Clover XML format ... done [00:00.003]

Generating code coverage report in HTML format ... done [00:00.009]
```

The output states that all three test cases were carried out, containing a total of 8 assertions. It also states that the code coverage was generated in both a clover and a HTML report.

This is how it could look like when executing the test suite through `make test`.

![Run phpunit in the terminal](doc/img/phpunit-terminal.png)

Now, lets use the code coverage to see how much of the code is covered by the current test suite.



Review the code coverage
-----------------------------------

Lets look at the code coverage report that is generated. It is a report saved in the generated directory `build/coverage` that provides a HTML view of the classes, methods and lines of code tested.

Open a web browser to `build/coverage/index.html` and review the report.

![Overview of code coverage](doc/img/code-coverage-overview.png)

![Details of code coverage](doc/img/code-coverage-detail.png)

As a general rule of thumb, try go get the report to show the color green. It is nice to have 100% code coverage, but sometimes its just fine with 70%. The percentage of code coverage is not the single most important metric of how good your test suite are.



Get good code coverage
-----------------------------------

One aim with a test suite is to cover all lines of code, we measure this through code coverage. The test cases you write should optimally cover the whole code, each line, at least once. Some code sections need to be covered by several test cases due to their complexity depending on different values or states.

In most cases one should be able to get code coverage thought the class public API, the public methods. That would imply a class that is written to be testable. If you have code sections that can not be reached through the public API, then you should ask yourself "why do I have this structure?".

Sometimes you encounter classes that are hard to write test cases for, or to get enough code coverage. This can be an indicator to refactor the class to make it more testable.

Lets look a bit into the test cases.



Review a test case
-----------------------------------

A basic setup for a test class is as follows, it is a class with any namespace and name ending with `Test` and it extends the class `\PHPUnit\Framework\TestCase`.

```php
namespace Mos\Guess;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class GuessCreateObjectTest extends TestCase
{

}
```

It could be a good practice to save the class in a filename representing the class.

Add a test to the class by adding a method and name it prefixed by `test`. All such methods will be executed by the test runner (phpunit).

```php
/**
 * Construct object and verify that the object has the expected
 * properties, use no arguments.
 */
public function testCreateObjectNoArguments()
{
    $guess = new Guess();
    $this->assertInstanceOf("\Mos\Guess\Guess", $guess);

    $res = $guess->tries();
    $exp = 6;
    $this->assertEquals($exp, $res);
}
```

A test method is considered as one test, or one test case, that can carry out zero or several assertions that verifies that certain conditions are fulfilled. The various methods for assertions are provided by phpunit and documented in its documentation.

Someone has said the following.

> _"If it have no assert, it aint no test."_

Assertions are ways to check that various states and values are correct, after some code is executed. A test, contains both code executing public methods in the class and performing asserts on post conditions, types and return values.

Another important thing to remember is that each test should be able to run independantly on the other tests. This will make it possible to execute tests independantly of each other and even in parallell to speed things up.

> _"If the tests can not run independently, then they are not unit tests."_



More on testing
-----------------------------------

The aim is to use the class as a white box test object. The class code is readable to the one who writes the test suite.

Your test suite shall executes as many class methods as possible and verify various states of the tested class using assertions.

The main approach is to write test cases for the public methods of the class. It would require other test strategies to test a class having protected members not accessable from the class public API or testing a class having external dependencies or testing a class using persistent storage like a database. Those more advanced test cases are out of scope of this tutorial.

Divide your test suite into classes having reasonable sizes. That will make it easier to maintain and further develop your test suite.

Use many small test methods, testing specific areas. Name these methods with proper names, describing what they test. This will aid when trying to remember what a certain method is testing. Write a one-liner comment above each method to further exaplain what the test does, that will also aid in maintaining and developing your test suite.



Summary
-----------------------------------

You have now verified that phpunit and code coverage works on your environment and you have perhaps gained some understanding of how unit testing and phpunit works.



Excercise
-----------------------------------

As an exercise you shall now finalize the test suite by adding test case(s) with assertions for the method `Guess::makeGuess()` and do reach a code coverage of 100%.



Thoughts
-----------------------------------

What about the PHP code in the directories `config/`, `htdocs/` and `view/`? Should that code also the covered by unit test or?
