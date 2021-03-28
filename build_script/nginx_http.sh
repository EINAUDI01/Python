#!/bin/bash

#demarrage du conteneur
sudo docker run -t -d --name serveurHTTP -p 8080:80 nginx

#verification de l'etat des conteneurs
sudo docker ps

exit