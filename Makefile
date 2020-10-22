check: phplint phpcs phpinsight psalm test
up:
	docker-compose up -d
down:
	docker-compose down
install:
	docker-compose exec app composer i --no-interaction
update:
	docker-compose exec app composer u --no-interaction
exec:
	docker-compose exec app bash
test:
	docker-compose exec app ./vendor/bin/phpunit --colors --bootstrap tests/bootstrap.php tests/

#phplint
phplint:
	docker-compose exec app ./vendor/bin/phplint -v

#codesniffer
phpcs:
	docker-compose exec app ./vendor/bin/phpcs -v
phpcbf:
	docker-compose exec app ./vendor/bin/phpcbf -v

#phpinsight
phpinsight:
	docker-compose exec app ./vendor/bin/phpinsights -v

psalm:
	docker-compose exec app ./vendor/bin/psalm

fix-permission:
	docker-compose exec app chown -R 1000:1000 .