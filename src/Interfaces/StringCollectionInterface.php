<?php

namespace Maris\Collection\Interfaces;

/**
 * Определяет коллекции со строковыми значение
 */
interface StringCollectionInterface
{
    public function toLower():static;
    public function toUpper():static;

    public function lcfirst():static;
    public function ucfirst():static;

    public function ucwords():static;

    public function trim():static;

    public function rtrim():static;

    public function ltrim():static;

    public function addcslashes():static;

    public function stripcslashes():static;
    public function addslashes():static;

    public function stripslashes():static;
    public function quoteeta():static;


    public function crypt():static;
    public function md5():static;

    public function sha1():static;
    public function lquoted_printable_decode():static;
    public function quoted_printable_encode():static;

    public function sprintf():static;

    public function join():string;
}

/*
bin2hex — Преобразует бинарные данные в шестнадцатеричное представление
chr — Генерирует односимвольную строку по заданному числу
chunk_split — Разбивает строку на фрагменты
convert_cyr_string — Преобразует строку из одной кириллической кодировки в другую
convert_uudecode — Декодирует строку из формата uuencode в обычный вид
convert_uuencode — Кодирует строку в формат uuencode
count_chars — Возвращает информацию о символах, входящих в строку
crc32 — Вычисляет полином CRC32 для строки

explode — Разбивает строку с помощью разделителя
fprintf — Записывает отформатированную строку в поток
get_html_translation_table — Возвращает таблицу преобразований, используемую функциями htmlspecialchars и htmlentities
hebrev — Преобразует текст на иврите из логической кодировки в визуальную
hebrevc — Преобразует текст на иврите из логической кодировки в визуальную с преобразованием перевода строки
hex2bin — Преобразует шестнадцатеричные данные в двоичные
html_entity_decode — Преобразует HTML-сущности в соответствующие им символы
htmlentities — Преобразует все возможные символы в соответствующие HTML-сущности
htmlspecialchars_decode — Преобразует специальные HTML-сущности обратно в соответствующие символы
htmlspecialchars — Преобразует специальные символы в HTML-сущности
implode — Объединяет элементы массива в строку

levenshtein — Вычисляет расстояние Левенштейна между двумя строками
localeconv — Возвращает информацию о форматировании чисел

metaphone — Возвращает ключ metaphone для строки
money_format — Форматирует число как денежную величину
nl_langinfo — Возвращает информацию о языке и локали
nl2br — Вставляет HTML-код разрыва строки перед каждым переводом строки
number_format — Форматирует число с разделением групп
ord — Конвертирует первый байт строки в число от 0 до 255

similar_text — Вычисляет степень похожести двух строк
soundex — Возвращает ключ soundex для строки

sscanf — Разбирает строку в соответствии с заданным форматом
str_contains — Определяет, содержит ли строка заданную подстроку
str_ends_with — Проверяет, заканчивается ли строка заданной подстрокой
str_getcsv — Выполняет разбор CSV-строки в массив
str_ireplace — Регистронезависимый вариант функции str_replace
str_pad — Дополняет строку другой строкой до заданной длины
str_repeat — Возвращает повторяющуюся строку
str_replace — Заменяет все вхождения строки поиска на строку замены
str_rot13 — Выполняет преобразование ROT13 над строкой
str_shuffle — Переставляет символы в строке случайным образом
str_split — Преобразует строку в массив
str_starts_with — Проверяет, начинается ли строка с заданной подстроки
str_word_count — Возвращает информацию о словах, входящих в строку
strcasecmp — Бинарно-безопасное сравнение строк без учёта регистра

strcmp — Бинарно-безопасное сравнение строк
strcoll — Сравнение строк с учётом текущей локали
strcspn — Возвращает длину участка в начале строки, не соответствующего маске
strip_tags — Удаляет теги HTML и PHP из строки

stripos — Возвращает позицию первого вхождения подстроки без учёта регистра

stristr — Регистронезависимый вариант функции strstr
strlen — Возвращает длину строки
strnatcasecmp — Сравнение строк без учёта регистра с использованием алгоритма "natural order"
strnatcmp — Сравнение строк с использованием алгоритма "natural order"
strncasecmp — Бинарно-безопасное сравнение первых n символов строк без учёта регистра
strncmp — Бинарно-безопасное сравнение первых n символов строк
strpbrk — Ищет в строке любой символ из заданного набора
strpos — Возвращает позицию первого вхождения подстроки
strrchr — Находит последнее вхождение символа в строке
strrev — Переворачивает строку задом наперёд
strripos — Возвращает позицию последнего вхождения подстроки без учёта регистра
strrpos — Возвращает позицию последнего вхождения подстроки в строке
strspn — Возвращает длину участка в начале строки, полностью соответствующего маске
strstr — Находит первое вхождение подстроки
strtok — Разбивает строку на токены

strtr — Преобразует заданные символы или заменяет подстроки
substr_compare — Бинарно-безопасное сравнение 2 строк со смещением, с учётом или без учёта регистра
substr_count — Возвращает число вхождений подстроки
substr_replace — Заменяет часть строки
substr — Возвращает подстроку
trim — Удаляет пробелы (или другие символы) из начала и конца строки

utf8_decode — Преобразует строку из UTF-8 в ISO-8859-1, заменяя недопустимые или непредставимые символы
utf8_encode — Преобразует строку из ISO-8859-1 в UTF-8
vfprintf — Записывает отформатированную строку в поток
vprintf — Выводит отформатированную строку
vsprintf — Возвращает отформатированную строку
wordwrap — Переносит строку по указанному количеству символов
 */