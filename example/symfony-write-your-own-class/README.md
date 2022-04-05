Write your own class in Symfony
==========================

This exercise will show you how to create and use your own classes in a Symfony controller. The exampla code is built around [the dice game 100](https://en.wikipedia.org/wiki/Pig_(dice_game)).

There is working code for controllers and template files which you can copy to your own website and see how it works. Use the code examples to understand how you could write your own code.



Prepare
--------------------------

You should have worked through the exercise "[Symfony with GET, POST, SESSION](https://github.com/dbwebb-se/mvc/tree/main/example/symfony-get-post-session)".



Make a landing page
--------------------------

It is a good suggestion to create a landing page for this exercise. Create a page which holds all the links to each part of the exercise.



A class Dice and a DiceController
--------------------------

This part shows a DiceController that uses your Dice class to roll a dice.

The routes are `dice` and `dice/roll/{numRolls}`.

* `Controller/DiceController.php`
* `Dice/Dice.php`
* `dice/home.html.twig`
* `dice/roll.html.twig`



Extending Dice to a GraphicDice
--------------------------

This part shows how to implement a DiceGraphic by extending the Dice. The template files can be reused.

The routes are `dice/graphic` and `dice/graphic/roll/{numRolls}`.

* `Controller/DiceGraphicController.php`
* `Dice/DiceGraphic.php`



Composition DiceHand holds Dice
--------------------------

This part shows how composition works together with inheritance. The Dice and the DiceGraphic can be sent to the DiceHand which holds several dices.

This is an example on how to inject dependencies and work on abstractions though inheritance.

The routes are `GET|POST dice/hand`.

* `Controller/DiceHandController.php`
* `Dice/DiceHand.php`
* `dice/hand.html.twig`
* `block/flash-message.html.twig`


<!--
Composition DiceHand enhanced to work with an interface
--------------------------


A class for the game using DiceInterface
--------------------------

Next kmom.
-->
