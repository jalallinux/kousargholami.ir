#!/bin/bash

docker-compose up -d --build --force-recreate --remove-orphans

docker exec -t drsamiraronaghi.com php artisan migrate:fresh --seed --force
docker exec -t drsamiraronaghi.com php artisan storage:link --force
