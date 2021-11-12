start-server:
	docker run -p 8080:80 -d --rm --name php-citation -v "$PWD":/var/www/html php:8.1.0RC5-apache-buster
	
deploy-quotes-app:
	docker-compose  -p quote-app  -f ./docker-compose.yml up -d