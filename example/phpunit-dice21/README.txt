Lösning så långt vi kom på tisdagszoomen. Filerna kommer att kompletteras!

Arbetsordning, steg för steg:
1. Gå igenom kraven, se nedan
2. Diskutera en lösning, se nedan
3. Gör strukturen, dvs
    - src
    - src/Dice21
    - test
    - test/Dice21
    - kopiera composer.json, Makefile, phpunit.xml samt test/config.php från example/phpunit
    Glöm inte att uppdatera composer.json till ditt namespace undera autoload, där det nu står
    Grm skriver du dit din akronym. Om du använder namespace Grm\Dice21 i dina klasser så byter
    du <Akronym> till Grm. Står det Mos som i phpunitexemplet så byter du ut det.
    - installera med composer install
4. Gör tomma klasser Dice21, Dice21Test, Player, PlayerTest och DiceTest. Dice kopierar vi från 
övningen vi gjorde eller från example/symfony-write-your-own-class/src/Dice/Dice.php
Lägg till extends TestCase på testklasserna samt use PHPUnit\Framework\TestCase
5. Gör ett testfall i Dice21Test så att vi kan se att testerna funkar. Ni byter ut Grm mot er akronym
public function testCreate()
    {
        $game = new Dice21();
        $this->assertInstanceOf("\Grm\Dice21\Dice21", $game);
    }
Kör composer phpunit eller make phpunit eller make test. Testet ska gå ok, annars har du missat
något steg. 
Om fel, så kolla namespace i klasser och composer.json, gör composer validate.
6. Gör testfallen i DiceTest, där känner vi till koden eftersom vi tog en färdig klass.
    - testCreate, asserta ett värde mellan 1 och 6
    - testRollAndReturn, skapa en tärning, kolla värdet mellan 1 och 6, gör rollAndReturn
    och kolla igen att värdet är ok
    - testGetAsString, kolla att det är en sträng som returneras
7. Nu har vi tränat på att göra testfall på en klass vi känner till. Då kör vi igång och gör
testfall på Dice21.
Vi utökar testCreate till:
public function testCreate()
{
    $game = new Dice21();
    $this->assertInstanceOf("\Grm\Dice21\Dice21", $game);
    $this->assertNotEmpty($game->getPlayer()->getName());
    $this->assertEquals("Player 1", $game->getPlayer()->getName());
}
Här vill vi nu testa att spelet skapas som det ska med en spelare och en bank och vad du nu mer
är som ska skapas ifrån början.
Fler testfall, till exempel:
    - testPlayerWins som kollar om spelaren vinner om den har mer poäng än banken då 
    båda har under 21
    - testBankWins som kollar om banken vinner om den har mer poäng än spelaren då 
    båda har under 21
    - testBankWinsWHenEqual som kollar om banken vinner om den har samma poäng än spelaren då 
    båda har under 21
8. Sen är det PlayerTest som ska få testfall, till exempel dessa:
    - testCreate som kollar att spelaren skapas med rätt namn och score 0 och att
    arrayen med tärningar är tom
    - testOver21 som kollar om spelarens poängsumma är mer än 21
    - testSetScore som kollar att pängsumman sätts till rätt värde. Hämta värdet
    med getScore så testas den funktionen med.
    - testPlayRound som kollar om tärningarna slagits och har värden samt att score
    har värdet av tärningarna
    - testPlayerContent som kollar om spelaren är nöjd om poängsumman är över 17

Krav:
en spelare och en bank
närmast 21 vinner
över 21 har man förlorat
spelaren börjar
3 tärningar var
slå om tärningar och addera till summan och 
stoppa/vara nöjd (om vi börjar utan input från spelare så kan den vara nöjd vid 17 och uppåt)
banken vinner om lika
restart

Lösning
Klass Dice21, tar hand om spelet
variabler
    spelare av typen Player
    bank troligen av typen Player
funktioner, eventuellt en funktion som gör dessa steg
    initiera spelet
    spela spelare
    spela bank
    visa resultat

Klass Player, en spelare, ev bank också
variabler
    namn
    dice, 3 tärningar av Dice 
    score
funktioner
    play, slå tärningarna och addera till score
    over21, om score är över 21

Klass Dice, tärning
variabler
    värde
funktioner
    getValue, returnera värdet
    rollAndReturn, slå tärning och returna värdet
    getAsString, returna värdet som sträng
