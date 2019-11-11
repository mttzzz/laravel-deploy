
# Laravel Deploy from GitHub


### Install
    composer require mttzzz/laravel-deploy

### Publish config
    php artisan vendor:publish --provider Mttzzz\laravelDeploy\LaravelDeployServiceProvider
    
Edit app/config/deploy.php and fill your webhook secret or add env variables.
```php
return [
// Webhook deploy secret 
    'sercet' => env('DEPLOY_SECRET', '1234567'),
];
```

### Usage
   - Create GitHub Webhook in repository settings
   - Fill payload URL https://yourdomain.com/deploy
   - Choose contentType - application/json
   - Fill secret from your deploy.php

