# Feature Flags or Feature Switcher

Компонент для внедрения фича флагов
## Options
### environments
В `environments` указываем список сред, в анонимных функция можно будет указывать 
соответсвующие правила проверки для определенных environments

### repository
Предпологается сделать логику истории фича флагов.
Например задать правила для оповещения если определеный флаг находится слишком долго выключен 
или наоборот слишком долго включен.

### defaultEnvironments
Environments который будет использоватся по умолчанию

### features
Непосредственно все существующие влаги включенные или выключенные

## Classes
### OptionsInterface
Предпологается что на вход `Feature::init(OptionsInterface)` мы передаем класс который должен быть `OptionsInterface`
В данном примере мы передаем опции в виде массива `ArrayOptions`
но на практике предполокается что опции будут братся из базы или из xml, json, yml 

```php
$options = [
    'environments' => [
        'dev'  => static function() {
            return true;
        },
        'test' => static function() {
            return true;
        },
        'prod' => static function() {
            return true;
        }
    ],
    'repository' => new FileRepository(
        ['path' => __DIR__.'/tmp']
    ),
    'defaultEnvironments' => 'dev',
    'features' => [
        'test_feature' => true,
        'new_popup'    => true,
        'logs'         => false
    ]
];

Feature::init(new ArrayOptions($options));

if (Feature::isEnabled('test_feature')) {
    echo "test_feature";
}

if (Feature::isEnabled('new_popup')) {
    echo "new_popup";
}

if (Feature::isEnabled('logs')) {
    echo "logs";
}
```