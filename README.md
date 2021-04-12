# LetoChat - Generic Plugin 5
---
!!! THIS REPO IS UNDER CONSTRUCTION !!!
Use this plugin if your project supports only PHP 5.6. For projects running with PHP 7+, use [this plugin instead](https://github.com/letochat/plugin7).
If you have a custom web application and want to integrate advance features of LetoChat platform, we strongly recommend use of this.
This is an official connector for LetoChat platform.

### Dedicated plugins

In case your project is based on a known platform, take a look and check if you have luck to have a dedicated plugin for it:

| Platform | Plugin Link |
| ----------- | ----------- |
| Magento 2 | [https://github.com/letochat/magento2-plugin](https://github.com/letochat/magento2-plugin) |
| Prestashop | [https://github.com/letochat/prestashop-plugin](https://github.com/letochat/prestashop-plugin) |
| OpenCart | [https://github.com/letochat/opencart-plugin](https://github.com/letochat/opencart-plugin) |
| WordPress<br />(supports WooCommerce) | [https://github.com/letochat/wp-plugin](https://github.com/letochat/wp-plugin) |

If you didn't find it in the upper table, now let's get started with the basics.

### Getting started

Using composer

`composer require letochat/plugin5`

Without composer

Take a look in /src folder and grab what you need.


```
$channelId = 'your channel id';
$channelSecret = 'your channel secret';

$widget = new LetoChat\Widget($channelId, $channelSecret);

$widget->info('id', 1)->info('name', 'Ion Popescu');
echo $widget->build();

// or

echo $widget->infos([
    'id'    => 1,
    'name'  => 'Ion Popescu'
])->build();
```

Please check our documentation from here:
- Widget Documentation
- Connector Documentation