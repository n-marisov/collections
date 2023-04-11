### _MutableList_

#### Создание и наполнение листа.

```php
<?php
use Maris\Collection\Lists\MutableList;
$list = new MutableList()

$list[4] = new stdClass();
$list[] = 21;
$list["test"] = "test_string";

echo "<pre>";
print_r( $list );
```
#### Результат
```
Maris\Collection\MutableList Object
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
Maris\Collection\MutableList Object
(
    [0] => 21
    [1] => test_string
)     
     
Удаляем элемент с позицией 0.
//unset($list[0]);     
Maris\Collection\MutableList Object
(
    [0] => test_string
)     

Добавили 2 элемента в начало листа.
//$list->unshift( "test_unshift_1","test_unshift_2" );
Maris\Collection\MutableList Object
(
    [0] => test_unshift_1
    [1] => test_unshift_2
    [2] => test_string
)  

Добавили 3 элемента в конец листа.
//$list->push( "test_push_1","test_push_2","test_push_3");
Maris\Collection\MutableList Object
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
var_dump($list->contains("test_unshift_2"));
echo "\n\n";

echo "Элемент в листе отсутствует. \n";
var_dump($list->contains("not_element"));
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