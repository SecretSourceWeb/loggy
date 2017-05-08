# loggy
Log messages as custom posts in WordPress.
# README #

THIS REQUIRES PHP 5.3 MINIMUM AND THAT YOU HAVE COMPOSER INSTALLED

This is the foundation of a customized WordPress installation that includes a wide variety of plugins for development and production environments. The installation varies from the default WordPress installation in the following ways:

1. All WordPress core files are stored in the "wp" directory in the project root (created when running `composer install` )
2. wp-content is stored outside the wp directory (because wp is now a module managed by composer)
3. wp-config.php requires a few modifications to get this configuration to work (see the wp-config-sample.php file for an example)

This installation was created based on [this article](https://roots.io/using-composer-with-wordpress/) on roots.io

To use this code for your own, new WordPress project, download the files into your new project and follow the instructions below.

To contribute, clone this repository to your local machine, make your changes, commit and push.

### What is this repository for? ###

* Contains the default composer.json and composer.lock files required to initialize the installation
* All new Secret Source WordPress projects should start with this template to facilitate development and standardize our installations. 

### How do I get set up? ###

From the command line, once you've downloaded this project to a new folder, execute the following commands:

```
#!bash

cd mynewproject
composer install
mv wp-config-sample.php wp-config.php
# Optionally, depends on the requirements of the project
mkdir -p wp-content/uploads
```

Be sure to update the WordPress keys in wp-config.php. You can get new keys by following this link:
[https://api.wordpress.org/secret-key/1.1/salt/](https://api.wordpress.org/secret-key/1.1/salt/)

You'll also need to add an .htaccess file like the following. Be sure to update the path to match your installation:

```
#!bash

RewriteEngine On
RewriteBase /pathtomyproject     # (if not just /)
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_URI} !^/wp-content/.*$
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# Be sure the line below has the correct path as well. Given your 
# project path is /pathtomyproject it would be as follows:
RewriteRule ^(.+)$ /pathtomyproject/wp/$1 [L]
```

### Additional Resources ###

In addition to managing plugins via composer, we really ought to use standard "unit" tests. You can find excellent WordPress test data at any of the links below. When working on a new site, we suggest you populate the site with the data below before starting as it will help you see immediately where you need to improve.

https://codex.wordpress.org/Theme_Unit_Test
http://wptest.io/
https://github.com/poststatus/wptest

### Contribution guidelines ###

All themes and plugins come from [https://wpackagist.org](WPackagist). If you are having trouble finding your theme or plugin there, then search for it on wordpress.org and try entering the file name of the .zip file. For example, for the WP crontrol plugin, enter wp-crontrol into wpackagist.

* Include a very good reason why you are including a plugin or theme in your commit message
* Make sure the plugin or theme is in use by more than 10,000 users
* Make sure the plugin or theme has a predominately positive rating
* Try not to add themes and plugins to the production section unless it is really required in production

### Who do I talk to? ###

* Ted is the owner of this repo