<?php
/**
 * Шаблон вывода новостей zagolovok
 * --------------------------------
 * Стандартные переменные, определенные в pub_core_functions.php
 * 
 * $post[$number]["id"]         идентификатор для доступа к новости
 * $post[$number]["title"]      название новости
 * $post[$number]["short_new"]  краткое содержание новости
 * $post[$number]["full_new"]   полное содержание новости
 * $post[$number]["category"]   категория новости
 * $post[$number]["label"]      ключевые слова новости
 * $post[$number]["date_edit"]  дата редактирования новости
 * $post[$number]["editor"]     редактор новости
 * $post[$number]["autor"]      автор новости
 * $post[$number]["rang"]       карма новости
 * $post[$number]["views"]      колличество просмотров новости
 * $post[$number]["dop"]        дополнительная ячейка хранения информации новости
 * ------------------------------------------------------------------------------
 * Конструкции для доступа к новости
 * 
 * mod=$_GET['mod']          идентификатор модуля (в данном случае publikator)
 * 
 * Если обработка идет НЕ через mod/index.php - подключаем дополнительный файл:
 * mod_menu=editnews         подменю (подключение файлов в директории mod/) в данном случае: editnews.php
 * edit=$post[$number]["id"] передача скрипту идентификатора новости (edit, delete)  
 * 
 * Если обработка идет ЧЕРЕЗ mod/index.php - через него и обрабатываем:
 * mod=$_GET['mod']&rang=plus&edit=$post[$number]["id"]   плюсуем карму через mod/index.php
 * mod=$_GET['mod']&rang=minus&edit=$post[$number]["id"]  минусуем карму через mod/index.php
 */

echo "<p><font color='#999999'>#", $post[$number]["id"], " </font>";
echo "<b><a href=/id/", $post[$number]["id"], ">", $post[$number]["title"], "</a></b><br>";
echo "<div align='right' style='color:#999999'>".$post[$number]["label"].", ".$post[$number]["category"]."</div>";

if ($post[$number]["short_new"] && $post[$number]["tip_posta"] == 'code') 
{echo str_replace("<br />", "\r\n", $post[$number]["short_new"])."<br>";};

if ($post[$number]["full_new"] && $post[$number]["tip_posta"] == 'text') 
{echo $post[$number]["full_new"], "<br>";};

if ($post[$number]["full_new"] && $post[$number]["tip_posta"] == 'code') 
{echo str_replace("<br />", "\r\n", $post[$number]["full_new"]), "<br>";};

echo "<div align='right' style='color:#999999'>Редактировалась: ".$post[$number]["date_edit"].", ".$post[$number]["editor"]."<br>";
echo $post[$number]["date_add"];
echo " / ", $post[$number]["autor"];
echo " / популярность ", $post[$number]["views"]." / ";
echo "<a href=/editnews/", $post[$number]["id"], ">редактировать</a> ";
echo " / <a href=?mod=".$_GET['mod']."&mod_menu=allnews&rang=plus&edit=", $post[$number]["id"], ">+</a> ";
echo ": <a href=?mod=".$_GET['mod']."&mod_menu=allnews&rang=minus&edit=", $post[$number]["id"], ">-</a>";
echo " / <a href=/dellnews/", $post[$number]["id"], ">удалить</a></div></p>";

?>