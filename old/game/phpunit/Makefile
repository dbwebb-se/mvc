BIN        := .bin
VENDORBIN  := vendor/bin
PHPLOC     := $(BIN)/phploc
PHPCS      := $(BIN)/phpcs
PHPCBF     := $(BIN)/phpcbf
PHPCPD     := $(BIN)/phpcpd
PHPMD      := $(BIN)/phpmd
PHPSTAN    := $(VENDORBIN)/phpstan
PHPUNIT    := $(VENDORBIN)/phpunit

all:
	@echo "Review the file 'Makefile' to see what targets are supported."

clean:
	rm -rf build .phpunit.result.cache

clean-all: clean
	rm -rf .bin vendor composer.lock

install: install-php-tools
	composer install

install-php-tools:
	install -d .bin

	# phploc
	curl -Lso $(PHPLOC) https://phar.phpunit.de/phploc.phar && chmod 755 $(PHPLOC)

	# phpcs
	curl -Lso $(PHPCS) https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && chmod 755 $(PHPCS)

	# phpcbf
	curl -Lso $(PHPCBF) https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar && chmod 755 $(PHPCBF)

	# phpcpd
	curl -Lso $(PHPCPD) https://phar.phpunit.de/phpcpd.phar && chmod 755 $(PHPCPD)

	# phpmd
	curl -Lso $(PHPMD) https://github.com/phpmd/phpmd/releases/download/2.9.1/phpmd.phar && chmod 755 $(PHPMD)

check-version:
	uname -a
	@which make
	make --version
	@which php
	php --version
	@which composer
	composer --version
	$(PHPLOC) --version
	$(PHPCS) --version
	$(PHPCBF) --version
	$(PHPCPD) --version
	$(PHPMD) --version
	$(PHPSTAN) --version
	$(PHPUNIT) --version

prepare:
	[ -d build ] || mkdir build
	rm -rf build/*

phploc: prepare
	[ ! -d src ] || $(PHPLOC) src | tee build/phploc

phpcs: prepare
	[ ! -f .phpcs.xml ] || $(PHPCS) --standard=.phpcs.xml | tee build/phpcs

phpcbf:
ifneq ($(wildcard test),)
	- [ ! -f .phpcs.xml ] || $(PHPCBF) --standard=.phpcs.xml
else
	- [ ! -f .phpcs.xml ] || $(PHPCBF) --standard=.phpcs.xml src
endif

phpcpd: prepare
	$(PHPCPD) src | tee build/phpcpd

phpmd: prepare
	- [ ! -f .phpmd.xml ] || [ ! -d src ] || $(PHPMD) . text .phpmd.xml | tee build/phpmd

phpstan: prepare
	- [ ! -f .phpstan.neon ] || $(PHPSTAN) analyse -c .phpstan.neon | tee build/phpstan

phpunit: prepare
	[ ! -d "test" ] || XDEBUG_MODE=coverage $(PHPUNIT) --configuration .phpunit.xml $(options) | tee build/phpunit

cs: phpcs

lint: cs phpcpd phpmd phpstan

test: lint phpunit
	composer validate

metric: phploc
