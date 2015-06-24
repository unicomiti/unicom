#!/usr/local/bin/bash
# LAURET Maxime
# Adding users to the Prosody server


# TEMP : À terme, les variables seront composées des champs du site.  Pour l'instant, c'est un prompt.
echo ("Username ?");
read $username;
echo ("Password ?");
read $password;

prosodyctl adduser $username"@unicom.itinet.fr"
prosody reload
