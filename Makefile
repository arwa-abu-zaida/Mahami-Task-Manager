.PHONY: build run stop logs status clean

build:
	docker compose build

run:
	docker compose up -d

stop:
	docker compose down

logs:
	docker compose logs -f

status:
	docker compose ps

clean:
	docker compose down -v
