#!make

init: docker-clear docker-build docker-up composer-install
up: docker-up
down: docker-down
rebuild: docker-down docker-build docker-up

docker-up:
	docker compose up -d

docker-down:
	docker compose down

docker-clear:
	docker compose down -v --remove-orphans

docker-build:
	docker compose build --pull

composer-install:
	docker compose run -T php composer install


composer-update:
	docker compose run -T php composer update

composer-du:
	docker compose run -T php composer du

