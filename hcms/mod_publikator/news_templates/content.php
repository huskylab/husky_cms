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

echo $post[$number]["full_new"]."<p align='center'><a href=/editnews/".$post[$number]["id"].">[�������������]</a> <a href=/dellnews/", $post[$number]["id"], ">[�������]</a></p>";
?>