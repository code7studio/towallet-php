# ToWallet-PHP

## Installation

### Using Composer

You can install the library via [Composer](https://getcomposer.org/). If you don't already have Composer installed, first install it by following one of these instructions depends on your OS of choice:

* [Composer installation instruction for Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)
* [Composer installation instruction for Mac OS X and Linux](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

1. After composer is installed, you can declare ToWallet-PHP as a project dependency by creating a `composer.json` at the root of your project directory with the following content:
    ```json
    {
      "require": {
        "towallet/towallet-php": "dev-master"
      }
    }
    ```

2. Then run the following command to install the ToWallet-PHP library:
    ```
    composer install
    ```

3. Once you run the `composer install` command, the Composer will generate a `vendor` folder at the same directory as `composer.json`.
    Now you can then add the following line to PHP script to load the library:

    ```php
    require_once dirname(__FILE__).'/vendor/autoload.php';
    ```
    
### Manually

If you're not using Composer, you can also download [ToWallet-PHP](https://github.com/towallet/towallet-php/archive/master.zip).
Then, follows the instruction below to install **ToWallet-PHP** to the project.

1. Extract the library to your project.

2. Then, include the following line into your PHP file, 
    ```php
    require_once dirname(__FILE__).'/towallet-php/lib/Towallet.php';
    ```

3. Now you are ready to start using the library

## Quick Start

Now from the above sections, your code will looks similar like the below.

```php
require_once dirname(__FILE__).'/vendor/autoload.php';

define('TOWALLET_PUBLIC_KEY', 'pkey-xxxxxxxxxx');
define('TOWALLET_SECRET_KEY', 'skey-xxxxxxxxxx');
```

```php
$transaction = TowalletTransaction::get(array(
    'invoice_id'   => 'M12345678'
));
```
