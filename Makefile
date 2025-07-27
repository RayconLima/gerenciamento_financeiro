DOCKER_COMPOSE := $(shell if docker compose version >/dev/null 2>&1; then echo "docker compose"; else echo "docker-compose"; fi)

bash:
	$(DOCKER_COMPOSE) exec app bash

build:
	$(DOCKER_COMPOSE) up -d --build

dev:
	$(DOCKER_COMPOSE) up -d

stop:
	$(DOCKER_COMPOSE) down

erase-all-logs:
	rm -R storage/logs/*.log