### _Map_

#### Создание и наполнение карты.

```php
$map = new \Maris\Collection\Maps\Map();

$key1 = new stdClass();
$key2 = "Ключ 2";
$key3 = 21;

$map[$key1] = new stdClass();
$map[$key2] = new class(){};
$map[$key3] = 33;

print_r( $map );
```

#### Результат

```
Maris\Collection\Map Object
(
    [0] => Array
        (
            [key] => stdClass Object
                (
                )

            [value] => stdClass Object
                (
                )

        )

    [1] => Array
        (
            [key] => Ключ 2
            [value] => class@anonymous Object
                (
                )

        )

    [2] => Array
        (
            [key] => 21
            [value] => 33
        )

)
```

#### Проверка наличия элемента в карте

```php
echo "\n\n";
echo "Проверка по ключу\n\n";
echo "Элемент с клюем есть в карте\n";
var_dump($map->has($key1));

echo "Элемента с клюем нет в карте\n";
var_dump($map->has("notItem"));
echo "Проверка по значению\n";

echo "\n\n";
echo "Проверка по значению\n\n";
echo "Элемент со значением есть в карте\n";
var_dump($map->exists(33));

echo "Элемента со значением нет в карте\n";
var_dump($map->exists("notValue"));
echo "Проверка по значению\n";

```
#### Результат

```
Проверка по ключу

Элемент с клюем есть в карте
bool(true)
Элемента с клюем нет в карте
bool(false)
Проверка по значению


Проверка по значению

Элемент со значением есть в карте
bool(true)
Элемента со значением нет в карте
bool(false)
Проверка по значению
```

#### Удаление элементов

```php
echo "\n\n";
echo "Удаление по ключу\n";
$map->remove($key1);
print_r($map);

echo "Удаление по значению\n";
$map->delete(33);
print_r($map);

```
#### Результат

```php
Удаление по ключу
Maris\Collection\Map Object
(
    [0] => Array
        (
            [key] => Ключ 2
            [value] => class@anonymous Object
                (
                )

        )

    [1] => Array
        (
            [key] => 21
            [value] => 33
        )

)
Удаление по значению
Maris\Collection\Map Object
(
    [0] => Array
        (
            [key] => Ключ 2
            [value] => class@anonymous Object
                (
                )

        )

)
```

#### Изменение элементов

```php
echo "\n\n";
echo "Добавляем элементы\n";
$map->set("test_key","test_value");
$map->set(new stdClass(),123);
print_r($map);

echo "Изменяем элемент\n";
$map->set("test_key",new class(){});
print_r($map);
```

#### Результат

```php
Добавляем элементы
Maris\Collection\Map Object
(
    [0] => Array
        (
            [key] => Ключ 2
            [value] => class@anonymous Object
                (
                )

        )

    [1] => Array
        (
            [key] => test_key
            [value] => test_value
        )

    [2] => Array
        (
            [key] => stdClass Object
                (
                )

            [value] => 123
        )

)

Изменяем элемент
Maris\Collection\Map Object
(
    [0] => Array
        (
            [key] => Ключ 2
            [value] => class@anonymous Object
                (
                )

        )

    [1] => Array
        (
            [key] => test_key
            [value] => test_value
        )

    [2] => Array
        (
            [key] => stdClass Object
                (
                )

            [value] => 123
        )

    [3] => Array
        (
            [key] => test_key
            [value] => class@anonymous Object
                (
                )

        )

)
```

#### Конвертация в другие списки

```php
echo "\n\n";
echo "Получаем массив со всеми ключами\n";
print_r( $map->keys() );

echo "Получаем массив со всеми значениями\n";
print_r( $map->values() );

echo "\n\n";
echo "Получаем лист со всеми ключами\n";
print_r( $map->toKeysList() );

echo "Получаем лист со всеми значениями\n";
print_r( $map->toList() );

echo "\n\n";
echo "Получаем Set со всеми ключами\n";
print_r( $map->toKeysSet() );

echo "Получаем Set со всеми значениями\n";
print_r( $map->toSet() );
```

#### Результат

```php
Получаем массив со всеми ключами
Array
(
    [0] => Ключ 2
    [1] => test_key
    [2] => stdClass Object
        (
        )

    [3] => test_key
)
Получаем массив со всеми значениями
Array
(
    [0] => class@anonymous Object
        (
        )

    [1] => test_value
    [2] => 123
    [3] => class@anonymous Object
        (
        )

)


Получаем лист со всеми ключами
Maris\Collection\MutableList Object
(
    [0] => Ключ 2
    [1] => test_key
    [2] => stdClass Object
        (
        )

    [3] => test_key
)
Получаем лист со всеми значениями
Maris\Collection\MutableList Object
(
    [0] => class@anonymous Object
        (
        )

    [1] => test_value
    [2] => 123
    [3] => class@anonymous Object
        (
        )

)


Получаем Set со всеми ключами
Maris\Collection\Set Object
(
    [0] => Ключ 2
    [1] => test_key
    [2] => stdClass Object
        (
        )

)
Получаем Set со всеми значениями
Maris\Collection\Set Object
(
    [0] => class@anonymous Object
        (
        )

    [1] => test_value
    [2] => 123
    [3] => class@anonymous Object
        (
        )

)
```