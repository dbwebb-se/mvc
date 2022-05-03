Quality metrics of your PHP code
==========================

This exercise will show you how to get going with quality metrics using the tool phpmetrics.



The tool phpmetrics
--------------------------

The tool [phpmetrics](https://phpmetrics.org/) will read your source code and create a HTML report containing various quality metrics on your code. This type of information can indicate the level of code quality or code complexity. Using this tool can help you work with your code to improve the various quality aspects.

There is a [new and more updated website for phpmetrics](https://phpmetrics.github.io/website/) with improved documentation on the metrics.

The recommendation is to install the tool in the directory `tools/` so it does not conflict with your application.

We will use the tool wget to download a PHAR containing the tool in one PHP executable.

```
# Go to the root of your Symfony directory
mkdir --parents tools/phpmetrics
composer require --working-dir=tools/phpmetrics phpmetrics/phpmetrics
```

You can now execute the tool like this.

```
tools/phpmetrics/vendor/bin/phpmetrics --version
tools/phpmetrics/vendor/bin/phpmetrics --help
```



Quality metrics
--------------------------

The tool phpmetrics can produce several quality metrics from your code. You can list all metrics available like this.

```
tools/phpmetrics/vendor/bin/phpmetrics --metrics
```

Looking at the list we find for example metrics for:

* Cohesion (LCOM)
* Coupling (Afferent and Efferent)
* Cyclomatic complexity



Metrics report by text
--------------------------

You can now analyse the metrics on your code in the `src/` directory like this.

```
tools/phpmetrics/vendor/bin/phpmetrics src
```

You will get a printed report with the metrics.

Try to analyse your code and find at least values for the following metrics.

* Cohesion (LCOM)
* Coupling (Afferent and Efferent)
* Cyclomatic complexity



Metrics report by HTML
--------------------------

You can generate a HTML report which contains more details and makes it easier to analyse your code.

```
tools/phpmetrics/vendor/bin/phpmetrics --report-html=docs/metrics src
```

Open your web browser to the report in the directory `docs/metrics`.



Configuration file for phpmetrics
--------------------------

You can add a configuration file to make it easier to run phpmetrics with various settings. There is a sample configuration file in [`phpmetrics.json`](phpmetrics.json). You can copy that file to the root of your project.

```
# You are in the root of the course repo
cp example/phpmetrics/phpmetrics.json me/report

# You are in the me/report directory
cp ../../example/phpmetrics/phpmetrics.json .
```

You can then execute the command like this.

```
tools/phpmetrics/vendor/bin/phpmetrics --config=phpmetrics.json
```



Composer scripts
--------------------------

To make it easier to execute the tools you can add them to the script section of your `composer.json`.

This is how you can add the scripts.

```
{
    "scripts": {
        "phpmetrics": "tools/phpmetrics/vendor/bin/phpmetrics --config=phpmetrics.json"
    }
}
```

You can verify that your update did not make the `composer.json` corrupt by running the following command.

```
composer validate
```

If all seems okey you should be able to execute the tool like this.

```
composer phpmetrics
```

You can read more on "[composer and writing custom commands](https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands)".
