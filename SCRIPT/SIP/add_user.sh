#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

#Variable
name=$1
#context=$2
#secret=$3

#Script
/bin/echo " Ajout de l'utilisateur:"
/bin/echo "
  [$name](sipUser)
  username = $name
  secret= $name
  context = etudiant
  "
#/bin/echo "" >> /usr/local/etc/asterisk/sip.conf

exit 0
