# tz-leads

## Installation

- `composer install`
- `cp ./config/db.php.dist ./config/db.php`
- `cp ./config/mail.php.dist ./config/mail.php`
- `cp ./public/index.php.dist ./public/index.php`


## PHP_CodeSniffer

Example: `./vendor/bin/phpcs -s --colors --extensions=php --standard=PSR2 ./folder-name`

Using the composer for the "app" folder: `composer phpcs`


## PHP Code fixer

For folder: `./vendor/bin/php-cs-fixer fix ./folder-name --config .php_cs`

For project: `./vendor/bin/php-cs-fixer fix --config .php_cs`

Using the composer for the "app" folder: `composer phpcs-fixer`


## Api withdrawal money

`POST /api/money/withdrawal?token={your_token}&amount={amount}`
