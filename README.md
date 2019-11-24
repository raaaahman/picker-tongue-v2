# Picker & Tongue

This is a demo for integrating PHPUnit tests into the development of a WordPress plugin. This demo has been explained during my workshop for WordCamp Marseille 2019. You can find the slides [here](https://slides.com/raaaahman/des-tests-automatises-pour-vos-developpements-wordpress)

## Context

The Picker & Tongue detective agency wants to build a WordPress site for its world class employees, but the content need to be coded so only Picker & Tongue detectives can understand it. 

We're going to build a plugin that allow this, but we need to be sure that it is working properly, because we don't want some misunderstanding escalates to a global war scenario!

## Installation & getting started

1. Download the [PHPUnit 7 PHAR](https://phpunit.de/getting-started/phpunit-7.html)[^1](#note-1), and place it in your `tools` subfolder (you will need to create it).
2. Download a copy of [wordpress development repository](https://github.com/WordPress/wordpress-develop), and extract it wherever you want.
3. Open the `tests/bootstrap.php` file, and change the `$_tests_dir` variable to the path where you extracted the WordPress development repository.
3. Start your MySQL server and create an empty database[^2](#note-2)
4. Create a `wp-tests-config.php` by copy/pasting the `wp-tests-config-sample.php` file. Then change the database's name and credentials. We're looking at the following lines: 

```php
	/** The name of the database for WordPress */
	define( 'DB_NAME', 'picker-tongue' );

	/** MySQL database username */
	define( 'DB_USER', 'root' );

	/** MySQL database password */
	define( 'DB_PASSWORD', '' );
```

5. You can now get into your plugin folder, and launch PHP Unit from the Command Line Interface:[^3](#note-3)

```
	tools/phpunit/phpunit-7.5.*.phar
```

<p id="note-1">Because WordPress provides compatibility with PHP 5.6, we can't use PHPUnit 8 or higher.</p>
<p id="note-2">Beware, this database's tables will be dropped and created again each time you run these tests, do not use a production database!</p>
<p id="note-3">Remember to replace `*` with your PHPUnit sub-version number.</p>

**Warning**: This way of manually installing PHPUnit is hacky and not recommended for production code, use it for practice only!

## Troubleshooting

### PHP directory not found

You may get the following error message:

	/usr/bin/env: « php »: No such file or directory

You then need to tell to your Operating System where the PHP executable is located. For example, after installing XAMPP on Windows 10 on my `E:` drive, it is located under this path: `E:\xampp\php`.

You then need to add the PHP folder to your `PATH`environment variable (see below).

### Running Unix CLI commands on Windows

1. Install [Cygwin](https://cygwin.com/)
2. Launch the Cygwin executable, it will open a console.
3. Navigate to Cygwin directory (`cd /cygdrive/`)
4. There will be links towards your different drives (C:, D:, etc.) and you now can navigate into them Unix style.

### Adding environment variables to your path

#### On Windows 10

1. Right click on 'Start menu' (window icon, bottom left)
2. Select 'Search' and type 'environment variable'
3. Select 'Environment variables for my account'
4. Left click on 'Path', then click on 'Modify' button at the bottom of the list
5. Click on 'New', then type the path to the folder where you've installed PHP (e.g.: 'E:\xampp\php')
6. Click on 'OK', close and close the window.
7. Restart your terminal session (close and open it again)

#### On Ubuntu 18.04

1. Open your terminal
2. Open your `.profile`file with a text editor (e.g.: `nano ~/.profile`)
3. Go to the end of the file, and add the following line :
```
PATH=$PATH:/path/to/php/bin/	
```
4. Save and close the file
5. Restart your terminal session (close and opn it again)