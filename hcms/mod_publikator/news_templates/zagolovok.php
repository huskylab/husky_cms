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

echo "<p>[", $post[$number]["id"], "] ";
echo "<b><a href=/id/", $post[$number]["id"], ">", $post[$number]["title"], "</a></b>";
echo " | <a href=/editnews/", $post[$number]["id"], ">�������������</a> ";
echo " | <a href=?mod=".$_GET['mod']."&mod_menu=allnews&rang=plus&edit=", $post[$number]["id"], "> [+]</a> ";
echo " / <a href=?mod=".$_GET['mod']."&mod_menu=allnews&rang=minus&edit=", $post[$number]["id"], "> [-]</a> ";
echo " | <a href=/dellnews/", $post[$number]["id"], ">�������</a><br>";
echo "�������� �������: ", $post[$number]["short_new"], "<br>";
echo "������ �������: ", $post[$number]["full_new"], "<br>";
echo "���������: ", $post[$number]["category"], "<br>";
echo "������: ", $post[$number]["label"], "<br>";
echo "���� ��������������: ", $post[$number]["date_edit"], "<br>";
echo "��������: ", $post[$number]["editor"], "<br>";
echo "�����: ", $post[$number]["autor"], "<br>";
echo "�����: ", $post[$number]["rang"], "<br>";
echo "����������: ", $post[$number]["views"], "<br>";
echo "�������������� ����: ", $post[$number]["dop"], "<br>";
echo "<hr><br>";
?>