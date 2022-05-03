Software Quality Metrics
========================

This guide provides you with three sample projects that you can inspect through Scrutinizer and phpmetrics. The guide also provides explanations on some of the more comman metrics used for analysing software quality.



Video
----------------------------

A walkthrough of this guide was recorded in the following videos.

[![YouTube video image](http://img.youtube.com/vi/4P5r6eOp1lY/0.jpg)](http://www.youtube.com/watch?v=4P5r6eOp1lY "Zoom kmom06 - Övning med Scrutinizer och phpmetrics (1 av 2)")

[![YouTube video image](http://img.youtube.com/vi/xZZMEX2ArWQ/0.jpg)](http://www.youtube.com/watch?v=xZZMEX2ArWQ "Zoom kmom06 - Övning med Scrutinizer och phpmetrics (2 av 2)")



Example projects in Scrutinizer
------------------------

Here are some example projects you can review in Scrutinizer.

[![Build Status](https://scrutinizer-ci.com/g/canax/router/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/router/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/canax/router/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/router/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/canax/database/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/database/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/canax/database/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/database/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/mosbth/cimage/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mosbth/cimage/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/mosbth/cimage/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mosbth/cimage/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mosbth/cimage/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mosbth/cimage/?branch=master)



Example projects with phpmetrics
------------------------

This is how you can review the above example projects with phpmetrics.

Start by creating a working directory, install phpmetrics and clone the repos.

```
# Create a working directory
mkdir work
cd work

# Clone the projects
git clone https://github.com/canax/database.git
git clone https://github.com/canax/router.git
git clone https://github.com/mosbth/cimage.git

# Install phpmetrics
mkdir --parents tools/phpmetrics
composer require --working-dir=tools/phpmetrics phpmetrics/phpmetrics
```

Create a HTML report for each repository.

```
tools/phpmetrics/vendor/bin/phpmetrics --report-html=metrics/database database/src
tools/phpmetrics/vendor/bin/phpmetrics --report-html=metrics/router router/src
tools/phpmetrics/vendor/bin/phpmetrics --report-html=metrics/cimage cimage
```

You can now open your browser to the reports in the `metrics/` directory.

Some of the [metrics used are explained in the documentation](https://phpmetrics.github.io/website/metrics/).



Issues and Violations
------------------------

Visible in Scrutinizer and phpmetrics.

Mess detectors with general suggestions on how to improve code sections.

Notifications on bad code and suggestions of best practice.



Code size & Volume
------------------------

Visible in Scrutinizer and phpmetrics.

How "large" is a class/method when counting the lines of code, with and without the comments.

A really large class or method could imply a toublesome code section to develop and maintain.



Code coverage
------------------------

Visible in Scrutinizer and can be included in phpmetrics by configuration.

Lines, files, classes, methods covered by one or several test cases.

Higher coverage could imply that the code is well tested.

Low coverage could imply potential risk in quality assurance.




Cyclomatic complexity
------------------------

Visible in Scrutinizer and phpmetrics.

The higher the value the more complex the code might be resulting in harder to maintain and develop.



Cohesion
------------------------

Cohesion also know as Lack of cohesion of methods (LCOM) is visible in Scrutinizer and phpmetrics.

How well does the method stick together in the class.

> "Things that need to change together should exist together."

Lower values indicates focused classes with single responsibilities which gives "high cohesion" where the methods really belong to the class.

A higher value (low cohesion) might indicate a class with many responsibilities that can be divided into several classes.

Try to aim for lower values. That is high cohesion supporting single responsibility.



Coupling
------------------------

Visible in Scrutinizer and phpmetrics.

* Afferent coupling (AC) is the number of classes affected by given class.
    * Outgoing connections
* Efferent coupling (EC) is the number of classes from which given class receives effects.
    * Incoming connections

High number of AC (outgoing) might say that this class uses many other classes.

High number of EC (incoming) might say that many other classes depends on this class.


<!--
Instability is a measuremnt
-->


<!--
Maintainability index
------------------------


Duplication
------------------------


CRAP
------------------------


Changes
------------------------
-->
