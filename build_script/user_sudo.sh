#!/bin/bash

#ajout du paquet sudo
apt-get install sudo

#ajout d'un nouvel user
useradd -m -g sudo -s /bin/bash ptutore
#ajout d'un mdp au nouvel user
passwd ptutore
#copie du script
cp ./build_script /home/ptutore
#connexion avec l'utilisateur créé
su ptutore

exit