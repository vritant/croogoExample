Croogo on OpenShift
====================

This git repository helps you get up and running quickly w/ a Croogo installation
on OpenShift.  The backend database can be created by adding a OpenShift cartridge 
or using a remote database. The installation page is automatically loaded with the
database host, user name and port ( but not the password, for security reasons ) as 
defaults if the MySQL cartridge is installed. If you have forgotten to install the 
cartridge and reach the installation page, add a white space to a file and push the 
code again after adding the cartridge.



Running on OpenShift
----------------------------

Create an account at http://openshift.redhat.com/

Create a php-5.3 application (you can call your application whatever you want)

    rhc app create -a croogo -t php-5.3

Add MySQL support to your application

    rhc app cartridge add -a croogo -c mysql-5.1

Add this upstream Croogo repo

    cd croogo
    git remote add upstream -m master git://github.com/openshift/croogo-example.git
    git pull -s recursive -X theirs upstream master
    # note that the git pull above can be used later to pull updates to Croogo
    
Then push the repo upstream

    git push

That's it, you can now install your application at (default database details are 
loaded on the installation page ):

    http://croogo-$yournamespace.rhcloud.com


NOTES:

Changes in OpenShift's croogo installation : 
1. The 'tmp' and 'vendors' folders were moved to the OpenShift data directory for persistant storage.
2. Added OpenShift security for salt and cipherseed.
3. Feel free to move folders that need to be persistant with every push in the OpenShift data directory.
4. Some config files are backed up and restored with every push because otherwise they are overwritten after installation.
