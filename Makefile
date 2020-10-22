check: phplint phpcs phpinsight psalm phpstan test
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

phplint:
	docker-compose exec app ./vendor/bin/phplint -v

phpcs:
	docker-compose exec app ./vendor/bin/phpcs -v
phpcbf:
	docker-compose exec app ./vendor/bin/phpcbf -v

phpinsight:
	docker-compose exec app ./vendor/bin/phpinsights -v

psalm:
	docker-compose exec app ./vendor/bin/psalm

phpstan:
	docker-compose exec app ./vendor/bin/phpstan analyse

fix-permission:
	docker-compose exec app chown -R 1000:1000 .