#!/bin/bash

docker exec -t drsamiraronaghi.com php artisan db:seed --class FakeSeeder --force
