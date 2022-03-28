ReactLogic LiqPay Module
========================
ReactLogic LiqPay Module Desc

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist reactlogic/yii2-reactlogic-liqpay "*"
```

or add

```
"reactlogic/yii2-reactlogic-liqpay": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, add to config  :
```php
'modules' => [
    'liqpay' => [
        'class' => 'reactlogic\liqpay\Module',
        'public_key' => '',
        'private_key' => '',
        'action' => 'paydonate',
        'amount' =>  null,
        'currency' => 'USD',
        'description' => 'Help People (SOS) WAR!',
        'language' => 'en',
    ],
    ...
]
```

Then simply use it in your code by  :

```php
<?= \reactlogic\liqpay\LiqPayWidget::widget(); ?>
