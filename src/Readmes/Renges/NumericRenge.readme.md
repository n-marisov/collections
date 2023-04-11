# Числовой диапазон

```php
\Maris\Collection\Ranges\NumericRange::class;
```

### Описание :
_Экземпляр класса представляет собой диапазон между двумя 
числами с определенным шагом. Итерируемый и не изменяемый объект._

### Свойства :

1. _protected int|float $first_ - Начальное значение диапазона (включительно).
2. _protected int|float $last_ - Конечное значение диапазона (включительно).
3. _protected bool $positive_ - Направление переборки диапазона (если true то от меньшего к большему).
4. _protected int|float $step_ - Шаг диапазона (не может быть отрицательным, по умолчанию 1)
5. _protected int $count_ - Количество итераций диапазона при переборке.


### Методы :

1. _\_\_construct( float|int $first, float|int $last, float|int $step = 1)_ - Создает новый диапазон.
2. _public function in( mixed $value ): bool_ - Определяет входит ли значение в диапазон.
3. _public function contains( mixed $value ): bool_ - Определяет входит ли значение в диапазон и кратно шагу. 

### Примеры :

#### Создание диапазона

```php
$instancePositive = new NumericRange(-22 , 34, 2.5);
$instanceNegative = new NumericRange(22 , -34, 2.5);
```

#### Проверка входит ли число в диапазон

```php
print_r($instanceNegative->in(-29)); // true
print_r($instanceNegative->in(-35)); // false
```

#### Проверка входит ли число в диапазон, c учетом шага.

```php
print_r($instanceNegative->contains(-28));// true
print_r($instanceNegative->contains(-30));// false
```

#### Проверка направления переборки.

```php
print_r($instancePositive->isPositive()); // true
print_r($instanceNegative->isPositive()); // false
```

#### Получение значения на определенной позиции.

```php
print_r($instancePositive[1]); // -19.5
print_r($instanceNegative->[2]); // 17
```