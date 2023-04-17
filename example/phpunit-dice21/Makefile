VENDORBIN  := vendor/bin
PHPUNIT    := $(VENDORBIN)/phpunit

all:
	@echo "Review the file 'Makefile' to see what targets are supported."

clean:
	rm -rf build .phpunit.result.cache

clean-all: clean
	rm -rf vendor composer.lock

install:
	composer install

check-version:
	uname -a
	@which make
	make --version
	@which php
	php --version
	@which composer
	composer --version
	$(PHPUNIT) --version

prepare:
	[ -d build ] || install -d build
	rm -rf build/*

phpunit: prepare
	[ ! -d "test" ] || XDEBUG_MODE=coverage $(PHPUNIT) $(options) | tee build/phpunit

test: phpunit
	composer validate
