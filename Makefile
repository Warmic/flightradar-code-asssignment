composer:
	docker run -it --rm -v `pwd`:/var/www/html \
	  -w /var/www/html \
	  laravelsail/php82-composer:latest \
	  composer install

setup:
	docker run -it --rm -v `pwd`:/var/www/html \
	  -w /var/www/html \
	  laravelsail/php82-composer:latest \
	  composer install
	./vendor/bin/sail up -d
	./vendor/bin/sail artisan migrate

seed:
	./vendor/bin/sail artisan db:seed

test:
	./vendor/bin/sail test