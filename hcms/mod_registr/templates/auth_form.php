<?PHP
if ($auth)
{echo "
<form action=".$_SERVER['PHP_SELF']." name='clearform' method='get'>
<table border='0'>
<tr><td>
<input type='hidden' name='input_seans' value='1' />
<input type='hidden' name='input_pass' value='1' />";}
else{
echo"
<form action=".$_SERVER['PHP_SELF']." name='myform' method='get'>
<table border='0'  cellspacing='6'>
<tr>
<td>�����: </td>
<td><input type='text' name='input_seans' placeholder='�����' /></td>
</tr>
<tr>
<td>������: </td>
<td><input type='password' name='input_pass' placeholder='������' /></td>
</tr>
<tr>
<td><input name='msg' type='submit' value='�����' class='mybut' /></td> ";} 

if ($auth){//echo "<p>� ��� ���������� ����� ������ ������</p>";
           echo "<p>������������, <a href='http://pro-baget.ru/user.php'>".$inf_fio." (".$login.")</a></p>
		   <p>".$inf_org." (".$inf_gorod.")</p></td></tr><tr><td>";
	       echo "<input type='submit' value='�����' class='mybut' /> </form></td></tr></table>";
		   }
else
        {
            echo "<td> <a href='http://pro-baget.ru/registration.php'>�����������</a>
			</td></tr></table>";
		}		   
?>