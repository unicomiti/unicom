#!/usr/bin/env bash

#Pierrick VERAN
#Unicom -Script d'ajout d'utilisateur sip/asterisk

#Initialisation des variables (au cas ou il n'y ai pas de param)
name=NaN # Nom de l'utilisateur
password=NaN # Mot de passe de l'utilisateur
context=NaN # Groupe d'appel pour les plans d'appel
phonenumber=NaN # Numero de telephone
groupeAppel=NaN # Nom du groupe d'appel au quel il fait parti

#Initialisation des variables avec les parametre
name=$1
password=$2
context=$3
phonenumber=$4
groupeAppel=$5

if [ $# == 5 ]
then
  #Ajout de l'utilisateur dans le fichier sip.conf
  /bin/echo "
[$name](sipUser)
fullname = $name
username = $name
context = $context
secret = $password
mailbox = $phonenumber@default ; Messagerie vocale " >> /usr/local/etc/asterisk/sip.conf
  /usr/sbin/service asterisk restart
  /bin/echo "[$(/bin/date "+ %Y-%m-%d %H:%M:%S") - $0] add user: $name"
  
  #Ajout de l'utilisateur dans le fichier extension.conf
  /bin/echo "exten => $phonenumber,1,Macro(groupe,SIP/$name)">> /usr/local/etc/asterisk/dialplan_groupe/extensions.conf.$groupeAppel
  
else
  /bin/echo "[$(/bin/date "+ %Y-%m-%d %H:%M:%S") - $0] $name ERROR - $*"
  /bin/echo "[$(/bin/date "+ %Y-%m-%d %H:%M:%S") - $0] You should write: $0 [nom] [password] [context] [phonenumber] [groupeAppel]"
fi

exit 0
