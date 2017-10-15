# tz-leads

## Installation

- `composer install`
- `cp ./protected/config/db.php.dist ./protected/config/db.php`
- `cp ./public/index.php.dist ./public/index.php`


## PHP_CodeSniffer

Example: `./vendor/bin/phpcs -s --colors --extensions=php --standard=PSR2 ./folder-name`


## PHP Code fixer

For folder: `./vendor/bin/php-cs-fixer fix ./folder-name --config .php_cs`

For project: `./vendor/bin/php-cs-fixer fix --config .php_cs`