# Country Search Server
This is the server-side code that provides the API endpoint used by the country search client app, which can be found here: https://github.com/adederich12/country-search-client. 

## Important Note
This application has already been hosted on Microsoft Azure for demonstration purposes. The API can be found at:
https://countrysearchtest.azurewebsites.net

## Requirements
This application will require several components to run properly on your server:
- Apache Server (v2.4)
- PHP 7.2 or greater
  1. libapache2-mod-php7.2 extension
  2. php-curl

## Running Application
Once Apache is installed, you will need to clone this repository into the `/var/www` by using `git clone https://github.com/adederich12/country-search-server.git`. 
Update your Apache configurations by running `sudo nano /etc/apache2/sites-enabled/000-default.conf` and updating the document root to point to the new `/var/www/country-search-server` directory.
After this file has been updated, reload the config by running `service apache2 reload`. Once this is done, you should be able to access the application by visiting `localhost:80` in your browser.
