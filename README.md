# Laravel IPTV Customers - FelipeMateus\IPTVCustomers

  
  
This package controls all customers and plans integrated with [iptv-channels](https://github.com/eufelipemateus/laravel-iptv-channels)  generates a list of channels for each customer.
 
  

## Instaling

  

Tested in Laravel 8.54.

  

### Run the command below in root to install the package in your project.

  

```bash
composer require felipemateus/iptv-customers
```

  
  

### Verify this file 'config/app.php'

```php

<?php

...

'providers' => [

...

FelipeMateus\IPTVCustomers\IPTVProvider::class
...

];

```

  

### Migrate the database

  
  

```bash

php artisan migrate

```

  

## License

  

[![License](http://poser.pugx.org/felipemateus/iptv-customers/license)](https://packagist.org/packages/felipemateus/iptv-customers)

  

## Author

  

[Felipe Mateus](https://felipemateus.com)
