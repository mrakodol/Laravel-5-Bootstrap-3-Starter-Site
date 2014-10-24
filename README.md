# Laravel Framework 5  Bootstrap 3 Starter Site
## Starter Site based on on Laravel 5.0 and Boostrap 3
* [Features](#feature1)
* [Requirements](#feature2)
* [How to install](#feature3)
* [Application Structure](#feature4)
* [Troubleshooting](#feature5)
* [License](#feature6)
* [Additional information](#feature7)
* [How Starter site is look like](#feature8)

<a name="feature1"></a>
## A2Z CMS Features:
* Laravel 5.0
* Twitter Bootstrap 3.2.0
* Back-end
	* Automatic install and settup website.
	* User and Role management.
	* Manage languages.
	* Manage photos and photo albums.
	* Manage videos and video albums.
	* Manage news and news categories.
    * DataTables dynamic table sorting and filtering.
    * Colorbox Lightbox jQuery modal popup.
    * Add Summernote WYSIWYG in textareas.
* Front-end
	* User login, registration
	* View Video,Photos,News
	* soon will be more...
* Packages included:
	* JeffreyWay Laravel 4 Generators
	* Datatables Bundle

-----
<a name="feature2"></a>
##Requirements

	PHP >= 5.4.0 (Entrust requires 5.4, this is an increase over Laravel's 5.3.7 requirement)
	MCrypt PHP Extension
	Enable creating triger in database
	SQL server(for example MySQL)

-----
<a name="feature3"></a>
##How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Configure Mailer](#step4)
* [Step 4: Create database and create Encryption Key](#step4)
* [Step 5: Install](#step5)
* [Step 6: Start Page](#step6)

-----
<a name="step1"></a>
### Step 1: Get the code - Download the repository

    https://github.com/mrakodol/Laravel-5-Bootstrap-3-Starter-Site/archive/master.zip

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies

Laravel utilizes [Composer](http://getcomposer.org/) to manage its dependencies. First, download a copy of the composer.phar.
Once you have the PHAR archive, you can either keep it in your local project directory or move to
usr/local/bin to use it globally on your system. On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).

#### Option 1: Composer is not installed globally

    cd laravel4startersite
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --dev
#### Option 2: Composer is installed globally

    cd laravel4startersite
	composer install --dev

Please note the use of the `--dev` flag.

Some packages used to preprocess and minify assests are required on the development environment.

When you deploy your project on a production environment you will want to upload the ***composer.lock*** file used on the development environment and only run `php composer.phar install` on the production server.

This will skip the development packages and ensure the version of the packages installed on the production server match those you developped on.

NEVER RUN `php composer.phar update` ON YOUR PRODUCTION SERVER.

If you haven't already, you might want to make composer be installed globally:

    $ curl -s http://getcomposer.org/installer | php
    $ sudo mv composer.phar /usr/local/bin/composer

Now I can use composer by invoking just the composer command.

Optional way to do it, is to set up an alias:
    alias composer='/location/of/the/composer.phar'

-----
<a name="step3"></a>
### Step 3: Configure Mailer

In the same fashion, copy the ***app/config/mail.php*** configuration file in ***app/config/local/mail.php***. Now set the `address` and `name` from the `from` array in ***config/mail.php***. Those will be used to send account confirmation and password reset emails to the users.
If you don't set that registration will fail because it cannot send the confirmation email.

-----
<a name="step4"></a>
### Step 4: Create database and create Encryption Key

If you finished first four steps, now you can create database on your database server(MySQL). You must create database
with utf-8 collation(uft8_general_ci), to install and application work perfectly.

The configuration option that we need is create the encryption key that is used within the framework.
To do this, all we need to do is to run:

    php artisan key:generate

-----
<a name="step5"></a>
### Step 5: Install

Now that you have the environment configured, you need to create a database configuration for it.
If you install on your localhost in folder laravel4startersite, you can type on web browser:
	http://localhost/laravel4startersite
And than finish the installation. Instalation would populate a database with tables and start-up data(you can delete that data later).

Now inside ***app/config*** that corresponds to the environment the code is deployed in. This will most likely be ***local***  or ***production***  when you first start a project.

You may setup your timezone:

    <?php
		/*
		|--------------------------------------------------------------------------
		| Application Timezone
		|--------------------------------------------------------------------------
		|
		| Here you may specify the default timezone for your application, which
		| will be used by the PHP date and date-time functions. We have gone
		| ahead and set this to a sensible default for you out of the box.
		|
		*/

		'timezone' => 'UTC',
    );

-----
<a name="step6"></a>
### Step 6: Start Page

####Admin login
You can login to admin part of Laravel Framework 5  Bootstrap 3 Starter Site:

    username: admin@admin.com
    password: admin
OR
    username: user@user.com
    password: user

-----
<a name="feature5"></a>
## Troubleshooting

### Site loading very slow

		composer dump-autoload --optimize

-----
<a name="feature6"></a>
## License

This is free software distributed under the terms of the MIT license

-----
<a name="feature7"></a>
## Additional information

Inspired by and based on [andrew13's Laravel-4-Bootstrap-Starter-Site](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site)

<a name="feature8"></a>
##How Starter Site is look like

![Index](http://i58.tinypic.com/m5y07.png)
![Index continue](http://i58.tinypic.com/2z65jyv.png)
![Register new user](http://i59.tinypic.com/2n9i0cj.png)
![User login page](http://i59.tinypic.com/2n9i0cj.png)
![Site photo album](http://i59.tinypic.com/2n9i0cj.png)
![Site video album](http://i57.tinypic.com/1ggkug.png)
![Admin dashboard](http://i57.tinypic.com/2r478l5.png)
![Admin languages](http://i62.tinypic.com/2j4py7l.png)
![Admin photo albums](http://i57.tinypic.com/346u9as.png)
![Admin photos](http://i59.tinypic.com/55nody.png)
![Admin list users](http://i60.tinypic.com/1zen3n.png)