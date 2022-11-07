# Vaults - Saving Your Knowledge

## Powers [NatureVault](https://github.com/GiverofMemory/NatureVault)

### Vaults is a maintained fork of [PmWiki](https://www.pmwiki.org/) software

Vaults is a specially tuned version of PmWiki that enables you to easily save your knowledge, data, and links and keep it private on your own computer that can be used offline, or host it for the world to see and help you save it.  Vaults gives you that wikipedia-like experience to save your data in a very navigable form, all without requiring a database and thus making it much easier to backup.  Save your vault on a disk or usb drive and as long as computers are around, it will be able to be accessed.  Of course you can also back it up with Git as well.

## Instructions

### FOR OFFLINE USE: 

* Download and unzip folder.
* Navigate to vault->local and rename the config.php to onlineconfig.php; and rename offlineconfig.php to config.php.
* Navigate to vault->cookbook and unzip the server-php.zip file.
* Move the inner 'server' folder (not the server-php folder) to the main (root) folder (the one with all the favicons and things).  There should now be three folders in the main folder; server, vault, and vault.d.
* Inside the server folder double click runvaults.bat.  A black command window will open, you must leave it open while using Vaults.
* Open your browser and go to http://localhost/vault/vaults.php

for more info see https://www.pmwiki.org/wiki/Cookbook/Standalone

### FOR NORMAL ONLINE HOSTING:

* Download this and place these files and folders into the "htdocs" or "public" folder of your server.
  * To do this I like to use [SSH](https://www.chiark.greenend.org.uk/~sgtatham/putty/) if I am not personally hosting it, then when you are in the hosting directory (usually 'public') run (don't forget the period after):
  
      `git clone https://github.com/GiverofMemory/Vaults.git .`
* Make sure you check vault/local/config.php file and modify url's and directory references (like upload directory) to reflect your domain name and your host's folder structure.  Without doing this certain things like pictures and skins and cookbooks will not work.
* If you need to install HTTPS support yourself, using [SSH](https://www.chiark.greenend.org.uk/~sgtatham/putty/) enter the command:`tls-setup.sh` (or see [more options](https://manpages.ubuntu.com/manpages/xenial/man1/letsencrypt.1.html)).  This certificate is in the ".well-known" folder so don't delete it.  If you delete it you may have to wait until the certificate expires to renew, check here: https://crt.sh/.  You can only have [5 failed attempts per hour](https://community.letsencrypt.org/t/disaster-too-many-certificates-tried-on-one-domain/87856).
* If you need to remove everything from a folder to start again, use the command:`rm -rf *`
  * However if you want to use git clone again you may need to FTP into the folder and delete the ".git" folder which doesn't seem to get removed from the above command.
* [Set permissions](https://www.pmwiki.org/wiki/Cookbook/DirectoryAndFilePermissions). You need to FTP (or see below for SSH instructions) using filezilla to set permissions of the vault -> "vault.d" folder (not the original vault.d folder, the one inside the vault folder) by right clicking the folder and setting permissions, then check all boxes, and also check "recurse to subfolders", and "apply to all files and directories" to allow public write so people can login to the vault.  It should say permission 777.
* The same as above needs to be done for the vault -> "Uploads" folder.
* If you cannot use FTP, here are the SSH comands when you are logged into your server: (note that /home/public might be different for your folder structure)
  * chmod 777 /home/public/vault/uploads
  * chmod 777 /home/public/vault/vault.d
    * aside, the command: chmod 2777 /home/public/vault/uploads might be temporary?
### Notes
* For personal hosting Abyss Web server works well.
* after typing out a command always hit the 'enter' key to run it.
* the period after the 'git clone' statement means that these files and folders are placed into the directory you are in, instead of making a new folder (which won't work).
* Good websites to get new favicon's made is [favicon.io](https://favicon.io) or [realfavicongenerator.net](https://realfavicongenerator.net)
* For performing daily backups from a webhost like [nearlyfreespeech.net](https://nearlyfreespeech.net) and making a discord bot see [this page](https://www.naturevault.org/wiki/pmwiki.php/NatureVault/Github)
