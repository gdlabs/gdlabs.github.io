#!/bin/bash

cp -Rv application/* /srv/www/www.gdlabs.it/application/
chown www-data:www-data /srv/www/www.gdlabs.it/application/* -R