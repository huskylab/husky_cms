<?php
/**
 * ������ ������ �������� zagolovok
 * --------------------------------
 * ����������� ����������, ������������ � pub_core_functions.php
 * 
 * $post[$number]["id"]         ������������� ��� ������� � �������
 * $post[$number]["title"]      �������� �������
 * $post[$number]["short_new"]  ������� ���������� �������
 * $post[$number]["full_new"]   ������ ���������� �������
 * $post[$number]["category"]   ��������� �������
 * $post[$number]["label"]      �������� ����� �������
 * $post[$number]["date_edit"]  ���� �������������� �������
 * $post[$number]["editor"]     �������� �������
 * $post[$number]["autor"]      ����� �������
 * $post[$number]["rang"]       ����� �������
 * $post[$number]["views"]      ����������� ���������� �������
 * $post[$number]["dop"]        �������������� ������ �������� ���������� �������
 * ------------------------------------------------------------------------------
 * ����������� ��� ������� � �������
 * 
 * mod=$_GET['mod']          ������������� ������ (� ������ ������ publikator)
 * 
 * ���� ��������� ���� �� ����� mod/index.php - ���������� �������������� ����:
 * mod_menu=editnews         ������� (����������� ������ � ���������� mod/) � ������ ������: editnews.php
 * edit=$post[$number]["id"] �������� ������� �������������� ������� (edit, delete)  
 * 
 * ���� ��������� ���� ����� mod/index.php - ����� ���� � ������������:
 * mod=$_GET['mod']&rang=plus&edit=$post[$number]["id"]   ������� ����� ����� mod/index.php
 * mod=$_GET['mod']&rang=minus&edit=$post[$number]["id"]  �������� ����� ����� mod/index.php
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

echo "<div align='right' style='color:#999999'>���������������: ".$post[$number]["date_edit"].", ".$post[$number]["editor"]."<br>";
echo $post[$number]["date_add"];
echo " / ", $post[$number]["autor"];
echo " / ������������ ", $post[$number]["views"]." / ";
echo "<a href=/editnews/", $post[$number]["id"], ">�������������</a> ";
echo " / <a href=?mod=".$_GET['mod']."&mod_menu=allnews&rang=plus&edit=", $post[$number]["id"], ">+</a> ";
echo ": <a href=?mod=".$_GET['mod']."&mod_menu=allnews&rang=minus&edit=", $post[$number]["id"], ">-</a>";
echo " / <a href=/dellnews/", $post[$number]["id"], ">�������</a></div></p>";

?>