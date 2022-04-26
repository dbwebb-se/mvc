Game 21

Requirements
* A dealer and a player, closest to 21 wins.
* Player starts.
* 3 dices, rolls, add the sum, and stop.

UML diagram from the lecture
See src/Game21/UML.png

Assumptions:
Interface with one method play() that returns a string with the winner.

Preconditions:
You have done the installation step in the Guess exercise, see phpunit/README.txt.
composer install or make install
change namespace in composer.json to your own and activate it with composer dump.
It is recommended to do the Guess exercise first.

Work order:
1. UML and discussions about the classes
2. Create src/Game21/Game21InterfaceTest.php with a test case create a Game21 object.
3. Run the phpunit tests (make phpunit test/Game21)
4. Create src/Game21/Game21Interface.php and src/Game21/Game21.php
5. Run the phpunit tests and the test case works.
6. Add 2 test cases in src/Game21/Game21InterfaceTest.php testing a dealer win and
a player win. Problably more tests are needed but this is a start. We started by
(see src/Game21/Game21Stubb.php.txt) with just return the string "Empty" from the play
method. Both test cases goes wrong.
7. Create the test class for the Dice class and then implement the Dice class.
8. Create the test class for the Player and then implement the Player class.
9. Implement the Game21 class and try to get the tests to pass.
Good luck!
