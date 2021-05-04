Integrera ditt repo med Travis och Scrutinizer
===============================

Detta är en kort förenklad guide till hur du integrerar ditt Git repo på GitHub/GitLab med byggtjänsterna Travis och Scrutinizer.

Syftet är främst att visa de konfigurationsfiler som fungerar för Travis respektive Scrutinizer.

I övningen "[Integrera din packagist modul med verktyg för automatisk test och validering](kunskap/integrera-din-packagist-modul-med-verktyg-for-automatisk-test-och-validering)" finns en mer komplett bild av hur du gör.



Förutsättning
-------------------------------

Du har ett Git repo som du huserar på GitHub/GitLab.

I ditt repo kan du installera en utvecklingsmiljö och köra tester mot repo. Detta kan du ha implementerat i tex i en Makefile.

```
# Installera en utvecklingsmiljö
make install

# Bra vid felsökning för att visa vilka versioner som är installerade
make check

# Köra enhetstesterna och generera kodtäckning till filen
# "build/coverage.clover" (eller liknande)
make phpunit

# Köra alla testerna
make test
```

Att integrera byggtjänsterna mot enhetstester som går mot en databas är ren överkurs och inget som hanteras.



Travis
-------------------------------

Tjänsten är [Travis CI](https://www.travis-ci.com/) (notera att det är .com och inte .org).

Du kan använda gitt konto från GitHub (eller liknande) för att logga in på Travis.

Länka ihop Travis med dina repon på GitHub/GitLab.

Glöm inte [dokumentationen](https://docs.travis-ci.com/).

Lägg till en konfigurationsfil `.travis.yml` (se [exempel på konfigurationsfil för Travis](https://github.com/dbwebb-se/mvc/blob/main/example/ci/.travis.yml)) i ditt repo.

Läs mer om [konfigurationsfilen för PHP](https://docs.travis-ci.com/user/languages/php/).

Justera vilka versioner av PHP du vill testa mot och hur du installerar utvecklingsmiljön och kör testerna.

Committa och pusha till GitHub/GitLab.

Travis kommer nu att bli notifierad och checkar ut ditt repo och utför instruktionerna enligt konfigurationsfilen.

Exempel på hur en badge kan se ut för ett repo som byggs på Travis.

[![Build Status](https://www.travis-ci.com/canax/router.svg?branch=master)](https://www.travis-ci.com/canax/router)



Scrutinizer
-------------------------------

Tjänsten är [Scrutinizer CI](https://scrutinizer-ci.com/).

Du kan använda gitt konto från GitHub (eller liknande) för att logga in på Scrutinizer.

Länka ihop Scrutinizer med ett av dina repon på GitHub/GitLab.

Glöm inte [dokumentationen](https://scrutinizer-ci.com/docs/).

Lägg till en konfigurationsfil `.scrutinizer.yml` (se [exempel på konfigurationsfil för Scrutinizer](https://github.com/dbwebb-se/mvc/blob/main/example/ci/.scrutinizer.yml)) i ditt repo.

Läs mer om [konfigurationsfilen för PHP](https://scrutinizer-ci.com/docs/guides/php/continuous-integration-deployment).

Justera vilken versioner av PHP du vill testa mot och hur du installerar utvecklingsmiljön och kör testerna. Dubbelkolla även vilka sökvägar som exkluderas från körningen.

Committa och pusha till GitHub/GitLab.

Scrutinizer kommer nu att bli notifierad och checkar ut ditt repo och utför instruktionerna enligt konfigurationsfilen.

Exempel på hur olika badges kan se ut för ett repo som byggs på Scrutinizer.

[![Build Status](https://scrutinizer-ci.com/g/canax/database/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/database/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/canax/router/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/router/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/database/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/database/?branch=master)



Övrigt och felsökning
-------------------------------

Varje tjänst jobbar mot de triggers de får av GitHub/GitLab.

Du kan manuellt trigga en build eller rebuild av en specifik commit.

Bekanta dig med de loggar som tjänsterna producerar, de kan hjälpa dig att förstå varför din build misslyckas.

Vissa tjänster tillåter att man kopplar upp sig med en ssh-inloggning till ett pågående bygge, det kan vara en bra möjlighet att felsöka och dubbelkolla hur miljön är på byggservern.

Formatet för konfigurationsfilerna är [YAML](https://en.wikipedia.org/wiki/YAML).
