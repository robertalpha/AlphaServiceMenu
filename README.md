# AlphaServiceMenu
Displays a list of services presented in the form of a menu. Also does periodic background calls to check if services are running.

The script which looks at the status of a service currently only works with systemd, but it's easily adapted to another platform.

Installation:
- Download or clone
 and move the content of subdirectory app to your Apache root or a subdirectory e.g. menu
- Edit app/sources/servies.json to include the services you want to reference and monitor. 
- Add any new service names to the whitelist in app/serverside/index.php
- Add icons for new services to the app/img directory.
- browse to the location which you specified e.g. http://localhost/menu

If your system does not use systemd or systemctl for service daemon management then you will need to edit both app/serverside/index.php and app/js/controllers.js to be compatible with your daemon management system.

Powered by: Jquery, AngularJS, Twitter Bootstrap / Bootswatch