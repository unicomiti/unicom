#!/usr/local/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

#Variable
name=$1
password=$2
phoneNumber=$3
#context=$4

if [ $? == 2 ]
then
  #Script
  /bin/echo " Ajout de l'utilisateur:"
  /bin/echo "
  [$name](sipUser)
  username = $name
  secret= $password
  " >> /usr/local/etc/asterisk/sip.conf
  /usr/sbin/service asterisk restart"
else
  echo "./add_user.sh [nom] [password]"
fi

exit 0
