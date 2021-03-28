#!/bin/bash

#ajout du droit d'execution aux scripts
sudo chmod +x docker.sh
sudo chmod +x installation_ssh.sh
sudo chmod +x nginx_http.sh

#lancement des scripts
./docker.sh
./installation_ssh.sh
./nginx_http.sh

exit