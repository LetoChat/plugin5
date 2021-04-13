# LetoChat - Generic Plugin 5

!!! THIS REPO IS UNDER CONSTRUCTION !!!

Use this plugin if your project supports only PHP 5.6. For projects running with PHP 7+, use [this plugin instead](https://github.com/letochat/plugin7).

If you have a custom web application and want to integrate advance features of LetoChat platform, we strongly recommend use of this.
This is an official connector for LetoChat platform.

## Dedicated plugins

In case your project is based on a known platform, take a look and check if you have luck to have a dedicated plugin for it:

| Platform | Plugin Link |
| ----------- | ----------- |
| Magento 2 | [https://github.com/letochat/magento2-plugin](https://github.com/letochat/magento2-plugin) |
| Prestashop | [https://github.com/letochat/prestashop-plugin](https://github.com/letochat/prestashop-plugin) |
| OpenCart | [https://github.com/letochat/opencart-plugin](https://github.com/letochat/opencart-plugin) |
| WordPress<br />(supports WooCommerce) | [https://github.com/letochat/wp-plugin](https://github.com/letochat/wp-plugin) |

If you didn't find it in the upper table, now let's get started with the basics.

## Getting started

Using composer

`composer require letochat/plugin5`

Without composer

Take a look in /src folder and grab what you need.

## LetoChat Widget

If you want to generate an advance script for chat that integrates more details about visitor, see the example below:

```php
require "vendor/autoload.php";

$channelId = 'your-channel-id';
$channelSecret = 'your-channel-secret';

try{

    $chat = (new LetoChat\Widget($channelId, $channelSecret))->infoValues([
        'name' => 'Ion Popescu',
        'email' => 'ion.popescu@gmail.com',
    ])->customValues([
        'Client type' => 'Silver',
        'Client code' => '0456785',
    ]);

    $chat->event('cart-add', [
        'id' 		=> 1,
        'name' 		=> 'Dell Ispiron',
        'image' 	=> 'https://dell.com/image',
        'quantity' 	=> 1,
        'price' 	=> 1534,
        'currency' 	=> 'EUR',
        'link'		=> 'https://dell.com/product-description-link',
    ]);
    
    echo $chat->build();

} catch ( Exception $e ){

    echo 'Error generating script: ' . $e->getMessage();;

}
```

## Connect website with LetoChat platform

```php
require "vendor/autoload.php";
	
$channelId 		= 'your-channel-id';
$channelSecret 	= 'your-channel-secret';
$authSecret 	= 'your-auth-secret';

$api = new LetoChat\Connector($channelId, $channelSecret, $authSecret, [
    'get-order' 	=> 'https://example.com/api/letochat/get-order',
    'get-orders' 	=> 'https://example.com/api/letochat/get-orders',
    'get-user-cart' => 'https://example.com/api/letochat/get-user-cart',
    'get-users-cart'=> 'https://example.com/api/letochat/get-users-cart',
]);

if( $api->check() ){
    echo 'Valid channel data';
} else {
    echo 'Error: ' . $api->getError();
}

echo '<hr>';

if( $api->connect() ){
    echo 'Connected';
} else {
    echo 'Error connecting: ' . $api->getError();
}
```

## Documentation

Like others sections, this is under construct. Please check our documentation from here:
- Widget Documentation
- Connector Documentation