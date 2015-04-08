# Laravel Framework 5  Bootstrap 3 Starter Site

Demo is here http://l5start.mrakodol.info/

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
## Starter Site Features:
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
	* Datatables Bundle

-----
<a name="feature2"></a>
##Requirements

	PHP >= 5.5.0
	MCrypt PHP Extension
	Enable creating triger in database
	SQL server(for example MySQL)

-----
<a name="feature3"></a>
##How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Configure Mailer](#step3)
* [Step 4: Create database](#step4)
* [Step 5: Install](#step5)
* [Step 6: Start Page](#step6)

-----
<a name="step1"></a>
### Step 1: Get the code - Download the repository

    https://github.com/mrakodol/Laravel-5-Bootstrap-3-Starter-Site/archive/master.zip

Extract it in www(or htdocs if you using XAMPP) folder and put it for example in laravel5startersite folder.

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies

Laravel utilizes [Composer](http://getcomposer.org/) to manage its dependencies. First, download a copy of the composer.phar.
Once you have the PHAR archive, you can either keep it in your local project directory or move to
usr/local/bin to use it globally on your system. 
On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).

Then run:

    composer install
to install dependencies Laravel and other packages.

-----
<a name="step3"></a>
### Step 3: Configure Mailer

In the same fashion, copy the ***config/mail.php*** configuration file in ***config/local/mail.php***. Now set the `address` and `name` from the `from` array in ***config/mail.php***. Those will be used to send account confirmation and password reset emails to the users.
If you don't set that registration will fail because it cannot send the confirmation email.

-----
<a name="step4"></a>
### Step 4: Create database

If you finished first three steps, now you can create database on your database server(MySQL). You must create database
with utf-8 collation(uft8_general_ci), to install and application work perfectly.
After that, copy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.

-----
<a name="step5"></a>
### Step 5: Install

This project makes use of Bower and Laravel Elixir. Before triggering Elixir, you must first ensure that Node.js (included in homestead) is installed on your machine.

    node -v

Install dependencies listed in package.json with:

    npm install

Retrieve frontend dependencies with Bower, compile SASS, and move frontend files into place:

    gulp

Now that you have the environment configured, you need to create a database configuration for it. For create database tables use this command:

    php artisan migrate

And to initial populate database use this:

    php artisan db:seed

If you install on your localhost in folder laravel5startersite, you can type on web browser:

	http://localhost/laravel5startersite/public
-----
<a name="step6"></a>
### Step 6: Start Page

You can now login to admin part of Laravel Framework 5  Bootstrap 3 Starter Site:

    username: admin@admin.com
    password: admin
OR user

    username: user@user.com
    password: user

-----
<a name="feature5"></a>
## Troubleshooting

### Site loading very slow

	composer dump-autoload --optimize
OR

    php artisan dump-autoload

-----
<a name="feature6"></a>
## License

This is free software distributed under the terms of the MIT license

-----
<a name="feature7"></a>
## Additional information

Inspired by and based on [andrew13's Laravel-4-Bootstrap-Starter-Site](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site)

###Disable gulp-notify
If you are running on a system that handles notifications poorly or you simply do not wish to use gulp-notify but your project does? You can disable gulp-notify by using enviroment variable DISABLE_NOTIFIER.

    export DISABLE_NOTIFIER=true;

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
