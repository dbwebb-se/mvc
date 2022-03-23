# mvc

Hmm. retake.

Jobba i grupp?

* objektorientering? räcker moduler?
* mvc
* databas med ORM (relation eller objektdatabas?)
* REST API med JSON
* web hook?
* enhetstestning
* utvecklingsmiljö, validatorer, build, travis, kodkvalitet
* PHP, Typescript, JavaScript?
* webapp med ramverk och inloggning?
* owasp och säkerhet.
* (azure eller studserver)

---


Course repo for the mvc course - mvc.


    *     * https://martinfowler.com/eaaCatalog/

Fokus objektorientering och klasser. Bygg många klasser och lär ut alla objektorienterade konstruktioner som finns i manualen.

get, post, session, cookie, files
    * drag & drop upload? (som imgur tool)?

(itsec, secure programming)
    * authentication, register account, login, cookie
    * Inloggning med oauth och extern login.
    * Security CSRF, SQL injection, XSS

docker?
    * utvecklingsmiljö extra, via egen dockerfile och build
    * kan vara bra för att bygga testmiljön inkl coverage


Tärningsspel som extra övning och träning på klasser? Med färdiga enhetstester?

    * Dice
    * GraphicDice
    * Histogram
    * DiceHand
    * Guess my game
    * Dice 100 (stats i databas)
    * Yatzy (highscore i databas)

Hmmm, kan man börja bygga bloggen från start? Del för del.

    * Inloggning, gravatar, profile, registrera, flash
    * Eget textfilter (bra klass)
    * Skapa egna sidor
    * Skapa egen blogg
    * Authenticering
    * Admin del

Skriv papper i latex (pdf), istället för me-sida.
Besvara/undersök frågor om oo koncept och clean code.

OAuth

Huvudpunkter
    * OO PHP
    * Kodvalidering
    * MVC
    * Ramverk controller, vyer
    * Enhetstestning
    * Inlogg/oauth
    * Projekt blogg/adventure
    * Skriva latex

rita psuedocode och flowcharts
reverse engineering med phpdoc


## kmom01

Kunskapsinventering, skapa issue på GitHub med läromål för kursen.

Skapa eget repo.

MVC pattern
Prata om cohesion and coupling

Börja direkt med att jobba i ramverk med controller-klass och namespace.
eller gör ett skal först (inkl frontcontroller and supporting views), och avvakta med ramverk till kmom02.

Undvik att börja med ett komplett ramverk, låt dem bygga vyer, layout och kanske använda en extern templatemotor.

composer
namespace
composer autoloader
vanlig autoloader

enkel makefile, bygg själv

Validator:
phpcs
phpstan
phpmd
make lint

Föreläsning:
oo php, klasser
L10 - Algorithms, representation and development


Uppgift, skapa klasser:
* Dice
* GraphicDice
* Histogram
* DiceHand

(Guess my number)
(Yatzy)



## kmom02

Enhetstester, code coverage

Validator:
make test

Tools:
Travis

Föreläsning:
L01_Introduction-to-software-testing/    
L02_Software-unit-testing/               

Uppgift:
* Guess my number
* unit test all classes in kmom01 & kmom02



## kmom03

TDD

Tools:
Code coverage

Föreläsning:
L03_Test-driven-development/             

Uppgift:
* 100/Pig



## kmom04

Databas.
    * anax/database (introducera i ett kmom)

Validator:
make doc
phpdoc, dox

Föreläsning:
L04-Software-documentation/              
Add a framework?

Uppgift:
* Move game to framework


## kmom05

Tools:
Scrutinizer

Querybuilder databas
    * anax/databasequerybuilder (lägg till i nästa kmom)

Kodfilosofi

Föreläsning:
L05_What-about-good-and-clean-code/      
L06_Software-philosophies/               


## kmom06

Enhetstester databas

Tools:
Scrutinizer

Validator:
phploc
make loc
phpmetrics

Föreläsning:
L07_Static-code-analysis-and-metrics/    


## kmom10

Stäm av läromålen.

Bygg ett CMS, en WordPress, och använd för att bygga en webbplats.

Kanske bygga en webbtjänst, typ bilder och delning, man måste logg ain och kan droppa bilder med kommentar.

Viss nivå av enhetstester

Projekt CMS eller Adventure spel

Skriv papper (delvis kodkvalitet)


# Bort

(Spel Gris/100 (bygg med controller klass))
(Spel "Guess my number")


# IGEN

# PART 1

OO, (M)VC och enhetstestning samt intro till kodkvalitet

## Kmom0X Objektorientering

Composer Autoloader
Namespace
Enkel frontcontroller med htaccess
Vyer (View engine)

Använd formulär, sessioner

Makefile med validatorer
Nytt Git repo.

Föreläs:
Bra kod i allmänhet och hur man skriver applikationer i PHP
OO i PHP
View i MVC

Uppgift:
Tärning
Grafisk tärning
Tärningshand med stats
Sida som kan kasta godtyckligt antal tärning, om och om igen, spara resultatet, visa histogram och statistik.

Överkurs:
Spela 21 med två tärningar mot datorn.

Redovisning:
Reflektera över OO i PHP och allmänt om OO
Reflektera över V i MVC
Tankar om kodkvalitet

## Kmom0X Controller

Koda mer OO.
Med en GameController

Lecture:
L10 - Algorithms, representation and development
PHP Komposition, Arv
Controller i MVC
Separation of concerns
Coherence and Coupling

Uppgift:
Rita pseudocode och flowchart
Histogram (med grafik via js...)
Visa sannolikheten att man når ett visst värde. (egen klass)
Spela 21 med två tärningar mot datorn. Lägg till betting.
Spela Yatsy mot datorn

Redovisning:
Reflektera över C i MVC
Påverkar OO/MVC kodkvalitet

## Kmom0X Enhetstestning

phpunit med coverage

Lecture:
L01_Introduction-to-software-testing/    
L02_Software-unit-testing/               

Labbmiljö:
Xdebug
Travis
Scrutinizer

Uppgift:
Skriv enhetstester för spelet 21 och Yatsy

Redovisning:
Reflektera över enhetstestning och kodens kvalitet


#PART 2

## Kmom0X Ramverk

Kursintro
Börja med ramverk och deras struktur
Prata MVC

Layered architecture kontra MVC.

Labbmiljö:
Git
GitHub/GitLab
PHP i path
Composer

Uppgift:
Undersök vilket ramverk du vill välja för kursen.
Ladda hem och prova ett ramverk (Symfony/Laravel).
Nytt Git repo.
Flytta ditt spel (21 + Yatzy) till ramverket.

Redovisa:
Färdig Latex-mall
Urvalet kring ramverket och hur det gick att komma igång.
Hur påverkar ett ramverk kodkvaliteten

## Kmom0X Inloggning

Skapa klasser för inloggning.
Inkludera databasen.
Fixa OAuth

Labbmiljö:

Uppgift:
Gör inloggning med klasser
Enhetstestning

Redovisa:

## Kmom0X Drop & drag images

Litet instagram webbplats med inloggning.
Comments
(websockets?
webstorage?)

Eller enbart skriva rapport?

ALT. Kodkvalitet.
Föreläsning 3xkodkvalitet?
Scrutinizer
Rapport kodkvalitet?
Verktyg för att visualiser kodstatistik (php)

## Kmom0X Projekt

Adventurespel
Blog ala Wordpress
Instagram
inklusive rapport



# pattern course

* Add a layer of Services to the MVC/Framework patterns
