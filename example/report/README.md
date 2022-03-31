Helpers to get up me/report
============================

Create the base for the website and see it work.

```
composer create-project symfony/skeleton me/report

cp example/symfony/.htaccess me/report/public/

dbwebb publishpure report
```

Try it locally.

```
php -S localhost:8888 -t public
```

Prepare the installation as a website.

```
cd me/report
composer require annotations twig webapp
```

Add a controller with the routes.

```
# From me/report
cp ../../example/symfony/LuckyControllerTwig.php src/Controller/ReportController.php

cp ../../example/symfony/lucky_number.html.twig templates/about.html.twig
cp ../../example/symfony/lucky_number.html.twig templates/home.html.twig
cp ../../example/symfony/lucky_number.html.twig templates/report.html.twig
```



Twig extensions
----------------------------

[Twig Extensions Defined by Symfony](https://symfony.com/doc/current/reference/twig_reference.html)

```
<link rel="stylesheet" href="css/style.css"/>

<li><a href="{{ url("home") }}">Home</a></li>
<li><a href="{{ path("about") }}">About</a></li>

<p><a href="{{ absolute_url("img/mos.png") }}">View the image</p>
```



Favicon
----------------------------

```
wget https://dbwebb.se/favicon.ico -O public/favicon.ico
```

```
<link rel="icon" href="favicon.ico">
```



Markdown
----------------------------

[markdown_to_html](https://twig.symfony.com/doc/3.x/filters/markdown_to_html.html)

```
composer require twig/markdown-extra league/commonmark
```

```
{% apply markdown_to_html %}
Report
======

This is the reports from each kmom.
{% endapply %}


{{ include('report/kmom01.markdown.twig')|markdown_to_html }}
```



Git
----------------------------



With docker
----------------------------

docker-compose run php81 composer create-project symfony/skeleton me/report

cp example/symfony/docker-compose.yaml me/report/
cd me/report
docker-compose run php81 composer require annotations twig webapp twig/markdown-extra league/commonmark
