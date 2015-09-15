# Laravel Framework 5.1  Bootstrap 3 Starter Site

Demo is here http://l5start.mrakodol.info/

## Starter Site based on on Laravel 5.1 and Boostrap 3
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
* Laravel 5.1.x
* Twitter Bootstrap 3.x
* Back-end
	* Automatic install and setup website.
	* User management.
	* Manage languages.
	* Manage photos and photo albums.
	* Manage article and article categories.
    * DataTables dynamic table sorting and filtering.
    * Colorbox jQuery modal popup.
    * Add Summernote WYSIWYG in textareas.
* Front-end
	* User login, registration
	* View Photos,Articles, Languages and Users
	* soon will be more...
* Packages included:
	* Datatables Bundle

-----
<a name="feature2"></a>
##Requirements

	PHP >= 5.5.9
	OpenSSL PHP Extension
	Mbstring PHP Extension
	Tokenizer PHP Extension
	SQL server(for example MySQL)
	Composer
	Node JS

-----
<a name="feature3"></a>
##How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Create database](#step3)
* [Step 4: Install](#step4)
* [Step 5: Start Page](#step5)

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
### Step 3: Create database

If you finished first three steps, now you can create database on your database server(MySQL). You must create database
with utf-8 collation(uft8_general_ci), to install and application work perfectly.
After that, copy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.

-----
<a name="step4"></a>
### Step 4: Install

Firstable need to uncomment this line "extension=php_fileinfo.dll" in php.info file.

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
<a name="step5"></a>
### Step 5: Start Page

You can now login to admin part of Laravel Framework 5  Bootstrap 3 Starter Site:

    username: admin@admin.com
    password: admin
OR user

    username: user@user.com
    password: user

-----
<a name="feature5"></a>
## Troubleshooting

### RuntimeException : No supported encrypter found. The cipher and / or key length are invalid.

    php artisan key:generate

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

----
<a name="feature8"></a>
##How Starter Site is look like

![Index](http://i57.tinypic.com/2yug28x.jpg)
![Login](http://i58.tinypic.com/r7p4et.jpg)
![Register new user](http://i61.tinypic.com/fvcz5x.jpg)
![Admin dashboard](http://i58.tinypic.com/b9g2g1.jpg)
![Admin users](http://i60.tinypic.com/301hemp.jpg)
![Admin list users](http://i58.tinypic.com/2ujl5dh.jpg)


## More advanced one
If you need more advanced starter template with 70+ admin pages please check [Josh on CodeCanyon](http://goo.gl/Mnhunr)
