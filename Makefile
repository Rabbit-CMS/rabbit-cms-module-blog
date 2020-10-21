install:
	docker-compose run app composer i --no-interaction

update:
	docker-compose run app composer u --no-interaction

exec:
	docker-compose run app bash

test:
	docker-compose run app ./vendor/bin/phpunit --colors --bootstrap tests/bootstrap.php tests/

fix-permission:
	docker-compose run app chown -R 1000:1000 .