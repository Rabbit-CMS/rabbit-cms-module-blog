install:
	docker-compose run app composer i --no-interaction
update:
	docker-compose run app composer u --no-interaction
exec:
	docker-compose run app bash
test:
	docker-compose run app ./vendor/bin/phpunit --colors --bootstrap tests/bootstrap.php tests/

#phplint
phplint:
	docker-compose run app ./vendor/bin/phplint -v

#codesniffer
phpcs:
	docker-compose run app ./vendor/bin/phpcs -v
phpcbf:
	docker-compose run app ./vendor/bin/phpcbf -v

fix-permission:
	docker-compose run app chown -R 1000:1000 .