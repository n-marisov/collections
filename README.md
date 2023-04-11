
# Collections

### Библиотек с удобным коллекциями которые отсутствуют в php по умолчания.


## Типы данных:

### _ArrayList_ - Предназначен для хранения списков.
### _Map_ - Масиво-подобный объект в качестве ключей которого может выступать любой тип данных.
### _Set_ - Список, который может хранить только уникальные значения.

### _ArrayList_ и _Set_ всегда строго нумерованные списки с последовательными цело-численными ключами, и не гарантируют точность сохранения ключей.

## Примеры :

### _ArrayList_

#### Создание и наполнение листа.
```php
<?php
use Maris\Collection\ArrayList;
$list = new ArrayList()

$list[4] = new stdClass();
$list[] = 21;
$list["test"] = "test_string";

echo "<pre>";
print_r( $list );
```
#### Результат
```
Maris\Collection\ArrayList Object
(
    [0] => stdClass Object
        (
        )
    [1] => 21
    [2] => test_string
)
```

#### Добавление, извлечение и удаление элементов

```php
    echo "Извлекаем первый элемент. \n";
    echo '//$list->shift();' ."\n";
    $element = $list->shift();
    
    print_r($element);
    echo "\n\n";
    print_r($list);
    echo "\n\n";

    echo "Удаляем элемент с позицией 0. \n";
    echo '//unset($list[0]);' ."\n";
    unset($list[0]);
    print_r($list);
    echo "\n\n";
    
    echo "Добавили 2 элемента в начало листа. \n";
    $list->unshift( "test_unshift_1","test_unshift_2" );
    echo '//$list->unshift( "test_unshift_1","test_unshift_2" );' ."\n";
    print_r($list);
    echo "\n\n";

    echo "Добавили 3 элемента в конец листа. \n";
    echo '//$list->push( "test_push_1","test_push_2","test_push_3");' ."\n";
    $list->push( "test_push_1","test_push_2","test_push_3");
    print_r($list);
    echo "\n\n";
```

#### Результат
```
Извлекаем первый элемент.
//$list->shift();
stdClass Object
     (
     )
Maris\Collection\ArrayList Object
(
    [0] => 21
    [1] => test_string
)     
     
Удаляем элемент с позицией 0.
//unset($list[0]);     
Maris\Collection\ArrayList Object
(
    [0] => test_string
)     

Добавили 2 элемента в начало листа.
//$list->unshift( "test_unshift_1","test_unshift_2" );
Maris\Collection\ArrayList Object
(
    [0] => test_unshift_1
    [1] => test_unshift_2
    [2] => test_string
)  

Добавили 3 элемента в конец листа.
//$list->push( "test_push_1","test_push_2","test_push_3");
Maris\Collection\ArrayList Object
(
    [0] => test_unshift_1
    [1] => test_unshift_2
    [2] => test_string
    [3] => test_push_1
    [4] => test_push_2
    [5] => test_push_3
) 
```
### Проверка наличия элемента в списке.

```php
echo "Элемент который присутствует в листе. \n";
var_dump($list->exist("test_unshift_2"));
echo "\n\n";

echo "Элемент в листе отсутствует. \n";
var_dump($list->exist("not_element"));
echo "\n\n";

```

#### Результат

```
Элемент который присутствует в листе.
bool(true)

Элемент в листе отсутствует.
bool(false)

```

#### Не управляемая переборка листа.

```php
foreach ($list as $key => $value)
    echo "$key : $value \n";
```

#### Результат
```
    0 : test_unshift_1
    1 : test_unshift_2
    2 : test_string
    3 : test_push_1
    4 : test_push_2
    5 : test_push_3
```

#### Управляемая переборка листа.

```php

$prevInit = false;
/** @var ListIterator $iterator **/
$iterator = $list->getIterator();
foreach ($iterator as $key => $value){
    if(!$prevInit && $key == 2){
        // Возвращает внутренний указатель на позицию назад
        $iterator->prev();
        $prevInit = true;
    }

    if($key == 3){
        $iterator->end();
    }
    echo "$key : $value \n";
}
```

#### Результат

```
    0 : test_unshift_1 
    1 : test_unshift_2 
    2 : test_string 
    2 : test_string 
    3 : test_push_1 
```


### _Set_

#### Создание и наполнение листа с уникальными значениями.

```php

$set = new \Maris\Collection\Set();

$set[333] = "Элемент 1";
$set[null] = "Элемент 1";

$set[] = "Элемент 2";
$set[] = "Элемент 2";

$set[] = "Элемент 3";

print_r($set);
```

#### Результат

```
Maris\Collection\Set Object
(
    [0] => Элемент 1
    [1] => Элемент 2
    [2] => Элемент 3
)

```

#### Проверка наличия элемента в коллекции

```php
echo "Элемент который присутствует в коллекции. \n";
var_dump($set->has("Элемент 2"));
echo "\n\n";

echo "Элемент в коллекции отсутствует. \n";
var_dump($set->has("Элемент 5 которого не существует"));
echo "\n\n";

```

#### Результат

```
Элемент который присутствует в коллекции.
bool(true)

Элемент в коллекции отсутствует.
bool(false)

```

#### Удаление элементов из коллекции

```php
    $set->delete("Элемент 1","Элемент 2");
```
#### Результат

```
Maris\Collection\Set Object
(
    [0] => Элемент 3
)
```

#### _Переборка коллекции соответствует листу_


### _Map_

#### Создание и наполнение карты.
```php
$map = new \Maris\Collection\Map();

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
Maris\Collection\ArrayList Object
(
    [0] => Ключ 2
    [1] => test_key
    [2] => stdClass Object
        (
        )

    [3] => test_key
)
Получаем лист со всеми значениями
Maris\Collection\ArrayList Object
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

