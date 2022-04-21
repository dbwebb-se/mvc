Symfony with GET, POST, SESSION
==========================

This exercise will show you how to work with GET, POST and SESSION in Symfony. The exercise will walk you through a few examples.

* A search form (GET)
* A login form (POST)
* Flash message
* Increment the number (SESSION)

There is working code for controllers and template files which you can copy to your own website and see how it works. Use the code examples to understand how you could write your own code.

<!--

Todo

How to invalidate the session.
https://symfony.com/doc/current/components/http_foundation/sessions.html#session-workflow

-->



Prepare
--------------------------

You should prepare by reading the article on "[Symfony and HTTP Fundamentals](https://symfony.com/doc/current/introduction/http_fundamentals.html)" to understand the basic on requests and responses in Symfony.

You should also be aware on how to [write code with a controller](https://symfony.com/doc/current/controller.html).



A note on Symfony forms
--------------------------

Symfony has a [module supporting building forms](https://symfony.com/doc/current/forms.html). The examples in this exercise will however use ordinary HTML forms built by hand. Feel free to update the examples with the Symfony form module as an extra exercise.



A search form (GET)
--------------------------

To create a search form we will need a controller with a route and a Twig template rendering the search form.

* `FormSearchController.php`
* `form/search.html.twig`

The code uses the request object to read the incoming GET variables.



A login form (POST)
--------------------------

The login form is created by a controller and a Twig template.

* `FormLoginController.php`
* `form/login.html.twig`

This example uses POST to post the form to a processing route. The route will redirect to a result page. The route will also use flash messages to store a message to be displayed in the result page.



Increment the number (SESSION)
--------------------------

This example is a small dice game called the "100 game". You can throw a dice and accumulate the sum until you roll a 1 and then you looses all your points. You can however save the accumulated points when you want. The game can be reset. All details are stored in the session.

* `FormSessionController.php`
* `form/session.html.twig`
* `form/flash-message.html.twig`

The example is built with a result page with a POST form and a processing route. The processing route will roll, save or clear the game and save the data to the session and use flash messages to show to the user the state of the game.
