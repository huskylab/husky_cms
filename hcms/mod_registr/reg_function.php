<?PHP
function user_info (){  // ������� ����������� �������������
global $id;
global $login;
global $seans;
global $pass;
global $dostup;
global $inf_data;
global $inf_org;
global $inf_gorod;
global $inf_fio;
global $inf_tel;
global $inf_mail;
global $salt;
global $auth;

echo "<h1>��������� ������������ ".$login." (".$inf_fio.")</h1>";
//echo "<br>��� id: ".$id;
echo "<br>��� �����: ".$login;
//echo "��� id: ".$seans;
//echo "��� id: ".$pass;
//echo "<br>��� ������� �������: ".$dostup;
echo "<br>���� �����������: ".$inf_data;
echo "<br>�����������: ".$inf_org;
echo "<br>�����: ".$inf_gorod;
echo "<br>���: ".$inf_fio;
echo "<br>�������: ".$inf_tel;
echo "<br>E-mail: ".$inf_mail;
						  
}

function user_auth (){  // ������� ����������� �������������
global $id;
global $login;
global $seans;
global $pass;
global $dostup;
global $inf_data;
global $inf_org;
global $inf_gorod;
global $inf_fio;
global $inf_tel;
global $inf_mail;
global $salt;
global $auth;

$salt = "salt";

//echo md5(md5("moderatorsalt"));

 if ($_GET['input_seans'] && $_GET['input_pass'] && !$_COOKIE['seans'] && !$_COOKIE['pass'])
			{//echo "��� ���";
			$user_table = file_get_contents("http://hcms.ru/hcms/mod_registr/BD/BD_users.txt");
            $user_table_str = explode ("\r\n", $user_table);
            foreach ($user_table_str as $key => $val)
            {
               $user_param = explode ("|", $val);
               foreach ($user_param as $k => $v)
               {
                   if ($user_param['2'] == md5(md5($_GET['input_seans'].$salt)) && $user_param['3'] == md5(md5($_GET['input_pass'].$salt)))
	                   
					   {
						   $id        = $user_param['0'];
						   $login     = $user_param['1'];
						   $seans     = $user_param['2'];
						   $pass      = $user_param['3'];
						   $dostup    = $user_param['4'];
						   $inf_data  = $user_param['5'];
						   $inf_org   = $user_param['6'];
						   $inf_gorod = $user_param['7'];
						   $inf_fio   = $user_param['8'];
						   $inf_tel   = $user_param['9'];
						   $inf_mail  = $user_param['10'];
						   
					   }
			   }
			}
 			}
 elseif (!$_GET['input_seans'] && !$_GET['input_pass'] && $_COOKIE['seans'] && $_COOKIE['pass'])
            {//echo "���� ����";
			$user_table = file_get_contents("http://hcms.ru/hcms/mod_registr/BD/BD_users.txt");
            $user_table_str = explode ("\r\n", $user_table);
            foreach ($user_table_str as $key => $val)
            {
               $user_param = explode ("|", $val);
               foreach ($user_param as $k => $v)
               {
                   if ($user_param['2'] == $_COOKIE['seans'] && $user_param['3'] == $_COOKIE['pass'])
	                   
					   {
						   $id        = $user_param['0'];
						   $login     = $user_param['1'];
						   $seans     = $user_param['2'];
						   $pass      = $user_param['3'];
						   $dostup    = $user_param['4'];
						   $inf_data  = $user_param['5'];
						   $inf_org   = $user_param['6'];
						   $inf_gorod = $user_param['7'];
						   $inf_fio   = $user_param['8'];
						   $inf_tel   = $user_param['9'];
						   $inf_mail  = $user_param['10'];
						 }
			   }
			}
 			}
 else{}

if (!$_GET['input_seans'] && !$_GET['input_pass'] && $_COOKIE['seans'] && $_COOKIE['pass'] && $_COOKIE['seans'] == $seans && $_COOKIE['pass'] == $pass)
{
     $auth = "1";
	 //echo "���� ����������";
	 //echo "<br>�� ��������� �������: ".$dostup;
}

else
{
     if ($_GET['input_seans'] && $_GET['input_pass'] && $_GET['input_seans'] == "1" && $_GET['input_pass'] == "1")
    {
       setcookie("login","",time() - 3600);
	   setcookie("seans","",time() - 3600);
       setcookie("pass","",time() - 3600);
       
	   header('Location: '.$_SERVER['PHP_SELF']);
	   //echo "����� ���";
    }
	
	elseif(md5(md5($_GET['input_seans'].$salt)) == $seans && md5(md5($_GET['input_pass'].$salt)) == $pass)
        {
            		
			$get_seans = md5(md5($_GET['input_seans'].$salt));
            $get_pass  = md5(md5($_GET['input_pass'].$salt));
			
			setcookie("login",$login,time()+3600);
			setcookie("seans",$get_seans,time()+3600);
            setcookie("pass",$get_pass,time()+3600);
			
			//unset($_GET['input_seans']);
			//unset($_GET['input_pass']);
			
			header('Location: '.$_SERVER['PHP_SELF']);
			echo "�� �����";
		}
        else
        {
            //echo "���������������";
		}
}
//echo "<br>input ".md5(md5($_GET['input_seans'].$salt));
//echo "<br>seans ".$seans;
}

function user_reg()
{
   global $salt;
   
   $registr_user_table = file_get_contents("http://hcms.ru/hcms/mod_registr/BD/BD_users.txt");
            $registr_user_table_str = explode ("\r\n", $registr_user_table);
            foreach ($registr_user_table_str as $key => $val)
            {
               $registr_user_param = explode ("|", $val);
               foreach ($registr_user_param as $k => $v)
               {
                       if ($registr_user_param['1'] == $_GET['reg_input_seans'])
                          {
                                $login = $registr_user_param['1'];
						  }
               }
			}
			
			if($_GET['new_reg'] == '1' and $login !== $_GET['reg_input_seans'])
		{
            
			$old_data = file_get_contents("http://hcms.ru/hcms/mod_registr/BD/BD_users.txt");
            
            $new_data .= "\r\nn|";
			
			$new_data .= $_GET['reg_input_seans']."|";
			$new_data .= md5(md5($_GET['reg_input_seans'].$salt))."|";
			$new_data .= md5(md5($_GET['reg_input_pass'].$salt))."|";
                         
			$new_data .= $_GET['dostup']."|";
			$new_data .= $_GET['time_reg']."|";
            
            $new_data .= $_GET['reg_input_org']."|";             
            $new_data .= $_GET['reg_input_gorod']."|";
            $new_data .= $_GET['reg_input_fio']."|";
            $new_data .= $_GET['reg_input_tel']."|";
            $new_data .= $_GET['reg_input_mail'];
            
            $rec_new_data .= $old_data;
            $rec_new_data .= $new_data;
			
			file_put_contents("http://hcms.ru/hcms/mod_registr/BD/BD_users.txt", $rec_new_data);
			
			echo "<h2>�����������, ����������� ������ �������! �������� ���� ��������������� ������ ��� �����:</h2>";
			echo "<h2>��������������� ����������</h2>�����: ".$_GET['reg_input_seans']."<br>";
			echo "������: ".$_GET['reg_input_pass']."<br>";
			echo "<h2>�������������� ����������</h2>������� �������: ".$_GET['dostup']."<br>";
			echo "���� �����������: ".$_GET['time_reg']."<br>";
			echo "�������� �����������: ".$_GET['reg_input_org']."<br>";
			echo "�����: ".$_GET['reg_input_gorod']."<br>";
			echo "���: ".$_GET['reg_input_fio']."<br>";
			echo "�������: ".$_GET['reg_input_tel']."<br>";
			echo "E-mail: ".$_GET['reg_input_mail']."<br>";
    
          }
		  else
		  {
			  if ($_GET['new_reg'] == '1' and $login == $_GET['reg_input_seans'])
			  {
			  echo "<br>� ���������, ��������� ���� ����� ��� �����, ���������� ������, ��������: ";
			  echo $_GET['reg_input_seans'].rand(5, 15)." ��� ".$_GET['reg_input_seans'].rand(5, 15);
			  }
			  echo "
<form action=".$_SERVER['PHP_SELF']." name='myformreg' method='get'>
<table border='0'>
<tr><td colspan='2' height='50'><h2>��������������� ����������</h2></td></tr>
<tr>
<td>�����</td>
<td><input size='50' type='text' name='reg_input_seans' placeholder='�����' /></td>
</tr>
<tr>
<td>������</td>
<td><input size='50' type='password' name='reg_input_pass' placeholder='������' value='".$_GET['reg_input_pass']."' /></td>
</tr><tr><td colspan='2' height='50'><h2>�������������� ����������</h2></td></tr>
<tr>
<td>�������� ����������� *</td>
<td><input size='50' type='text' name='reg_input_org' placeholder='�������� �����������' value='".$_GET['reg_input_org']."' /></td>
</tr>
<tr>
<td>�����</td>
<td><input size='50' type='text' name='reg_input_gorod' placeholder='�����' value='".$_GET['reg_input_gorod']."' /></td>
</tr>
<tr>
<td>���</td>
<td><input size='50' type='text' name='reg_input_fio' placeholder='���' value='".$_GET['reg_input_fio']."' /></td>
</tr>
<tr>
<td>������� *</td>
<td><input size='50' type='text' name='reg_input_tel' placeholder='�������' value='".$_GET['reg_input_tel']."' /></td>
</tr>
<tr>
<td>E-mail *</td>
<td><input size='50' type='text' name='reg_input_mail' placeholder='E-mail' value='".$_GET['reg_input_mail']."' /></td>
</tr>
<tr>
<td>* - ���� ������������ ��� ����������</td>
<tr>
<td colspan='2'>
<input type='hidden' name='new_reg' value='1' /></td>
</tr>
<tr>
<td colspan='2'>
<input type='hidden' name='time_reg' value='".date ("G:i, j.n.Y")."' value='".$_GET['time_reg']."' /></td>
</tr>
<tr>
<td colspan='2'>
<input type='hidden' name='dostup' value='moderator' /></td>
</tr>
<tr>
<td colspan='2'><input name='msg_reg' type='submit' value='����������������' class='mybut' /></td>
</tr>
</table>
";
		  }
}

?>