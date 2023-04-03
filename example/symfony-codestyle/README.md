<!--
---
author: mos
revision:
    "2023-04-03": "(B, mos) Work through and updated."
    "2022-03-27": "(A, mos) First release."
---
-->
![phpcs image](.img/phpcs.png)

Symfony code style
==========================

This exercise will show you how to get going with formatting your code like a Symfony developer. The exercise will also show you how to check and fix your code style for a general PHP project using PHP FIG standard code style.

The tools you are going to install are really useful development tools.



Precondition
--------------------------

You know how to work with a Symfony installation and you have an application you can work with.



.gitignore tools/ 
--------------------------

We are to install the tool into the directory `tools/`. This is a place for development tools and we choose to not include it with our git repository since it is not crucial for the application and it can easily be restored with a few manual steps.

Start by creating the directory `tools/` in the root of your repo.

```
# Go to the root of your Symfony app directory
mkdir tools
```

You should ignore the directory `tools/` in the file `.gitignore` to avoid checking in these development tools.

You can just add the following line to the `.gitignore` file you have in the root of your repo.

```
tools/
```

You can then use `git status` to verify that the directory is not shown as a missing directory. It should be silently ignored. 



PHP Coding Standards Fixer
--------------------------

The Symfony community uses the tool "[PHP Coding Standards Fixer](https://cs.symfony.com/)" to format the code so it looks the same throughout all Symfony modules.

The tool does not provide any warnings or hints (as per default), it just processes your code to fix its code style.

You can read more on the [Symfony Coding Standards](https://symfony.com/doc/current/contributing/code/standards.html) to learn how the code should be written.



### Install it

The recommendation is to install the tool in the directory `tools/` so it does not conflict with your application.

```
# Go to the root of your Symfony app directory
mkdir --parents tools/php-cs-fixer
composer require --working-dir=tools/php-cs-fixer friendsofphp/php-cs-fixer
```

Now you can execute the tool like this.

Check its version.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer --version
```

Check its help.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer --help
```



### Detect code style issues

Start by doing a `--dry-run` to only display the files needing to be fixed, this will not fix them.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run
```

If you add a `-v` you will get an explanation of the code style issues found (if any).

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run -v
```



### Fix code style issues

You can now fix the code style issue, like this.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src
```



PHP-FIG on standards for PHP frameworks
--------------------------

The code style for Symfony is valid for Symfony and it partly relies on the code style developed within the [PHP-FIG organization](https://www.php-fig.org/) which tries to develop standards for framework operability.

The standards are called PSR and the current PSR related to code style are these:

* [PSR-1: Basic Coding Standard](https://www.php-fig.org/psr/psr-1/)
* [PER Coding Style](https://www.php-fig.org/per/coding-style/)

The PSR related to the "[PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/)" depends on how you name and structure your code.

To check your code so it follows the code style you can use the tool PHP_CodeSniffer.


<!--
PHP_CodeSniffer
--------------------------

Let us install the tool [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) so we can use it to validate our code. With this tool we will get the utilities `phpcs` that checks the code style and provide warnings and we get the utility `phpcbf` which fixes the code style. We also need to set what standard to follow (there are many) and we will go with the PSR latest code style through a configuration file.

The tool we install into the directory `tools/` like this.

```
# Go to the root of your Symfony directory
mkdir --parents tools/php-codesniffer
composer require --working-dir=tools/php-codesniffer squizlabs/php_codesniffer
```

You can now run the tools like this.

```
tools/php-codesniffer/vendor/bin/phpcs -h
tools/php-codesniffer/vendor/bin/phpcbf -h
```

Now try to execute the code style checker using the PSR-12 standard like this.

```
tools/php-codesniffer/vendor/bin/phpcs --standard=PSR12 src
```

If you want to use more detailed rules you can setup your own configuration file. There is an example in [`phpcs.xml`](phpcs.xml).
-->


Composer scripts
--------------------------

To make it easier to execute the tool you can add them to the script section of your `composer.json`. The composer tool can then help you to execute the scripts. You can read more on "[composer and writing custom commands](https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands)" to see how it is done.

Start by inspecting your `composer.json` and look for the following section to see what scripts are already defined for you.

```
{
    "scripts": {

    }
}
```

Now you can try to add the following scripts.

```
{
    "scripts": {
        "csfix": "tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src",
        "csfix:dry": "tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run -v"
    }
}
```

You can verify that your update did not make the `composer.json` corrupt by running the following command.

```
composer validate
```

If all seems ok, then you should be able to execute the tools like this.

```
composer csfix:dry
composer csfix
```

This type of tool is a very valuable help when creating good and clean code.



Configuration file for php-cs-fixer
--------------------------

For the time being, all your source code is in `src/`. But later on, you might add unit tests into the directory `tests/`. Then csfixer needs to work with that directory also. You can solve that by adding a configuration file for csfixer.

There is a sample configuration file in [.php-cs-fixer.dist.php](.php-cs-fixer.dist.php) that supports checking the code style in multiple directories.

Copy that file and place it in the root of your project.

You can then run the command like this and send in the multiple paths at the end of the command line.

```
# In the root of the project dir
tools/php-cs-fixer/vendor/bin/php-cs-fixer --config=.php-cs-fixer.dist.php fix src tests
```

Update the scripts part in `composer.json` before you proceed.
