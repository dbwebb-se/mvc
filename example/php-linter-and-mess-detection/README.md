PHP Linter and Mess Detection
==========================

This exercise will show you how to get going with static code linters and mess detectors for your PHP code you write in Symfony.

The tools you are going to install are really useful development tools.

It is common that you can find plugins to your texteditor to make it possible to execute the linters while you write your code.



PHPMD - PHP Mess Detector
--------------------------

The [PHPMD tool](https://phpmd.org/) is a mess detector warning you when you write "messy" code with potential problems.

The tool works according to a ruleset and it checks that your code follows the rules.  

The recommendation is to install the tool in the directory `tools/` so it does not conflict with your application.

```
# Go to the root of your Symfony directory
mkdir --parents tools/phpmd
composer require --working-dir=tools/phpmd phpmd/phpmd
```

Verify that the tool can be executed.

```
tools/phpmd/vendor/bin/phpmd --version
tools/phpmd/vendor/bin/phpmd --help
```

Now you can execute the tool like this.

```
tools/phpmd/vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode
```

When you get a warning you can read about it in the [documentation for the rules](https://phpmd.org/rules/index.html).




### Configuration file

You can add a configuration file [`phpmd.xml`](phpmd.xml) to the root of your project. In the configuration file can you make exceptions and tune the rules you want to follow.

You can then execute the linter like this.

```
tools/phpmd/vendor/bin/phpmd src text phpmd.xml
```



PHPStan - Find bugs before they reach production
--------------------------

[PHPStan](https://phpstan.org/) is a linter tool that tries to "find bugs before they reach production".

The tool works according to a ruleset and it checks that your code follows the rules.  

The recommendation is to install the tool in the directory `tools/` so it does not conflict with your application.

```
# Go to the root of your Symfony directory
mkdir --parents tools/phpstan
composer require --working-dir=tools/phpstan phpstan/phpstan
```

Verify that the tool can be executed.

```
tools/phpstan/vendor/bin/phpstan --version
tools/phpstan/vendor/bin/phpstan --help
```

Now you can execute the tool like this.

```
tools/phpstan/vendor/bin/phpstan analyse src
```

PHPstan validates your code according to [levels between 0 and 10](https://phpstan.org/user-guide/rule-levels) where 0 is the loosest level and 9 being the strictest level of linting.

Try to validate your code on level 9 and then you can downsize the level to an acceptable one.

```
tools/phpstan/vendor/bin/phpstan analyse -l 9 src
```

You can decide which level you want to use on your own.



PHP Copy/Paste Detector (PHPCPD)
--------------------------

[The tool phpcpd](https://github.com/sebastianbergmann/phpcpd) is a copy and paste detector for PHP. It analyses your code to find duplicated code which might be a hint on bad coding practice.

The recommendation is to install the tool in the directory `tools/` so it does not conflict with your application.

```
# Go to the root of your Symfony directory
mkdir --parents tools/phpcpd
composer require --working-dir=tools/phpcpd sebastian/phpcpd
```

Verify that the tool can be executed.

```
tools/phpcpd/vendor/bin/phpcpd --version
tools/phpcpd/vendor/bin/phpcpd --help
```

Now you can execute the tool like this.

```
tools/phpcpd/vendor/bin/phpcpd src
```



Composer scripts
--------------------------

To make it easier to execute the tools you can add them to the script section of your `composer.json`.

This is how you can add the scripts.

Do not forget to set the accurate level for phpstan.

Ensure that you are using the configuration file for phpmd, or update the command with the ruleset to use.

```
{
    "scripts": {
        "phpmd": "tools/phpmd/vendor/bin/phpmd src text phpmd.xml || true",
        "phpstan": "tools/phpstan/vendor/bin/phpstan analyse -l 9 src || true",
        "phpcpd": "tools/phpcpd/vendor/bin/phpcpd src || true",
        "lint": [
            "@phpcpd",
            "@phpmd",
            "@phpstan"
        ]
    }
}
```

You can verify that your update did not make the `composer.json` corrupt by running the following command.

```
composer validate
```

If all seems okey you should be able to execute the tools like this.

```
composer phpmd
composer phpstan
composer phpcpd
composer lint
```

The command `composer lint` is intended to run all tools that do linting. It could be a good idea to also include `phpcs` to check your codestyle.

You can read more on "[composer and writing custom commands](https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands)".
