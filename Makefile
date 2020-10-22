install: down up composer-install fix-permission
check: phplint phpcs phpinsight psalm phpstan phpmd test fix-permission
restart: down up

up:
	docker-compose up -d
down:
	docker-compose down
exec:
	docker-compose exec app bash
fix-permission:
	docker-compose exec app chown -R 1000:1000 .

composer-install:
	docker-compose exec app composer i --no-interaction
composer-update:
	docker-compose exec app composer u --no-interaction

test:
	docker-compose exec app ./vendor/bin/phpunit

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

phpmd:
	docker-compose exec app ./vendor/bin/phpmd src/ ansi phpmd.xml