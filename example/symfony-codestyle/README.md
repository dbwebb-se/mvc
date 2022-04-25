Symfony codestyle
==========================

This exercise will show you how to get going with formatting your code like a Symfony developer. The exercise will also show you how to check and fix your codestyle for a general PHP project using PHP FIG standard codestyle.

The tools you are going to install are really useful development tools.



Git ignore tools/
--------------------------

Before we start.

You should ignore the directory `tools/` in the file `.gitignore` to avoid checking in those development tools as part of your repository.

You can just add the following line to your `.gitignore` file you have in the root of your repo.

```
tools/
```



PHP Coding Standards Fixer
--------------------------

The Symfony community uses the tool "[PHP Coding Standards Fixer](https://cs.symfony.com/)" to format the code so it looks the same all throughout all Symfony modules.

The tools does not provide any warnings or hints (as per default), it just processes your code to fix its codestyle.

You can read more on the [Symfony Coding Standards](https://symfony.com/doc/current/contributing/code/standards.html) to learn how the code should be written.

The recommendation is to install the tool in the directory `tools/` so it does not conflict with your application.

```
# Go to the root of your Symfony directory
mkdir --parents tools/php-cs-fixer
composer require --working-dir=tools/php-cs-fixer friendsofphp/php-cs-fixer
```

Now you can execute the tool like this.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer --version
tools/php-cs-fixer/vendor/bin/php-cs-fixer --help
```



### Detect code style issues

Start by doing a `--dry-run` to only display the files needing to be fixed, this will not actually fix them.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run
```

If you add a `-v` you will get an explanation on the code style issues found.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src --dry-run -v
```



### Fix code style issues

You can now just fix the code style issue, like this.

```
tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src
```

There exists plugins for texteditors and it is recommended that you install it to get the correct codestyle.



PHP-FIG on standards for PHP frameworks
--------------------------

The codestyle for Symfony is valid for Symfony and it partly relies on the codestyle developed within the [PHP-FIG organisation](https://www.php-fig.org/) with tries to develop standards for framework operarability.

The standards are called PSR and the current PSR related to codestyle are these:

* [PSR-1: Basic Coding Standard](https://www.php-fig.org/psr/psr-1/)
* [PSR-12: Extended Coding Style Guide](https://www.php-fig.org/psr/psr-12/)

The PSR related to the "[PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/)" does also imply how to name and structure your code.

To check your code so it follows the codestyle you can use the tool PHP_CodeSniffer.



PHP_CodeSniffer
--------------------------

Let us install the tool [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) so we can use it to validate our code. With this tool we will get the utilities `phpcs` that checks the codestyle and provide warnings and we get the utility `phpcbf` which fixes the codestyle. We also need to set what standard to follow (there are many) and we will go with the PSR latest codestyle through a configuration file.

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

Now try to execute the codestyle checker using the PSR-12 standard like this.

```
tools/php-codesniffer/vendor/bin/phpcs --standard=PSR12 src
```

If you want to use more detailed rules you can setup your own configuration file. There is an example in [`phpcs.xml`](phpcs.xml).



Composer scripts
--------------------------

To make it easier to execute the tools you can add them to the script section of your `composer.json`. The tool composer can then help you to execute the scripts. You can read more on "[composer and writing custom commands](https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands)" to see how its done.

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
        "phpcs": "tools/php-codesniffer/vendor/bin/phpcs --standard=PSR12 src",
        "phpcbf": "tools/php-codesniffer/vendor/bin/phpcbf --standard=PSR12 src"
    }
}
```

You can verify that your update did not make the `composer.json` corrupt by running the following command.

```
composer validate
```

If all seems okey you should be able to execute the tools like this.

```
composer csfix
composer phpcs
composer phpcbf
```

These tools are very valuable when creating good code.



Configuration file for php-cs-fixer [OPTIONAL]
--------------------------

This is useful when you want to check the code style in multiple directories, for example both `src/` and `tests/`.

If you want to have php-cs-fixer to be able to check code style in multiple directories you will need a configuration file. There is a sample configuration file in [.php-cs-fixer.dist.php](.php-cs-fixer.dist.php).

Copy that file and place it in the root of your project.

You can then run the command like this and send in the multiple paths at the end of the command line.

```
# In the root of the project dir
tools/php-cs-fixer/vendor/bin/php-cs-fixer --config=.php-cs-fixer.dist.php fix src tests
```
