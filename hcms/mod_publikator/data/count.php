<?php
/**
 * ������ ������������ �����������
 * ���������� � ���� �� ������� ��������, ������� ��� ������ ���������� �����
 * 
 */
for ($i = 1; $i < 10000; $i++)
{$cont .= "$i;;;;��������;;;;full_new;;;;short_new;;;;category;;;;label;;;;date_add;;;;date_edit;;;;editor;;;;autor;;;;rang;;;;1;;;;dop\r\n";}

if (file_put_contents("data.txt", $cont))
    {
        echo "������ ��������, ��������� <a href=index.php>�����</a>";
    }
    else
    {
        echo "������ �������";
    }

?>