include base
include nginx
include php5-fpm

php5-fpm::addvhost_nginx { 'www-gdlabs-it':
	website_host => "www.gdlabs.it",
}