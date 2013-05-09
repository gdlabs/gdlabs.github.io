#!/bin/bash

puppet apply config/manifest.pp

cp -Rv application/* /srv/www/www.gdlabs.it/application/
rm /srv/www/www.gdlabs.it/application/index.php

chown www-data:www-data /srv/www/www.gdlabs.it/application/* -R