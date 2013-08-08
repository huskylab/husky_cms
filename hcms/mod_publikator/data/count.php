<?php
/**
 * Скрипт тестирования публикатора
 * Записывает в файл БД столько новостей, сколько раз задано повторение цикла
 * 
 */
for ($i = 1; $i < 10000; $i++)
{$cont .= "$i;;;;название;;;;full_new;;;;short_new;;;;category;;;;label;;;;date_add;;;;date_edit;;;;editor;;;;autor;;;;rang;;;;1;;;;dop\r\n";}

if (file_put_contents("data.txt", $cont))
    {
        echo "запрос выполнен, вернитесь <a href=index.php>назад</a>";
    }
    else
    {
        echo "ошибка запроса";
    }

?>