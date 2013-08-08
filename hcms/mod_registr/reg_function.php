<?PHP
function user_info (){  // функция авторизации пользователей
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

echo "<h1>Страничка пользователя ".$login." (".$inf_fio.")</h1>";
//echo "<br>Ваш id: ".$id;
echo "<br>Ваш логин: ".$login;
//echo "Ваш id: ".$seans;
//echo "Ваш id: ".$pass;
//echo "<br>Ваш уровень доступа: ".$dostup;
echo "<br>Дата регистрации: ".$inf_data;
echo "<br>Организация: ".$inf_org;
echo "<br>Город: ".$inf_gorod;
echo "<br>ФИО: ".$inf_fio;
echo "<br>Телефон: ".$inf_tel;
echo "<br>E-mail: ".$inf_mail;
						  
}

function user_auth (){  // функция авторизации пользователей
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
			{//echo "нет кук";
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
            {//echo "есть куки";
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
	 //echo "вход произведен";
	 //echo "<br>вы обладаете правами: ".$dostup;
}

else
{
     if ($_GET['input_seans'] && $_GET['input_pass'] && $_GET['input_seans'] == "1" && $_GET['input_pass'] == "1")
    {
       setcookie("login","",time() - 3600);
	   setcookie("seans","",time() - 3600);
       setcookie("pass","",time() - 3600);
       
	   header('Location: '.$_SERVER['PHP_SELF']);
	   //echo "сброс кук";
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
			echo "вы вошли";
		}
        else
        {
            //echo "авторизируйтесь";
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
			
			echo "<h2>Поздравляем, регистрация прошла успешно! Запишите свои регистрационные данные для входа:</h2>";
			echo "<h2>Регистрационная информация</h2>Логин: ".$_GET['reg_input_seans']."<br>";
			echo "Пароль: ".$_GET['reg_input_pass']."<br>";
			echo "<h2>Дополнительная информация</h2>Уровень доступа: ".$_GET['dostup']."<br>";
			echo "Дата регистрации: ".$_GET['time_reg']."<br>";
			echo "Название организации: ".$_GET['reg_input_org']."<br>";
			echo "Город: ".$_GET['reg_input_gorod']."<br>";
			echo "ФИО: ".$_GET['reg_input_fio']."<br>";
			echo "Телефон: ".$_GET['reg_input_tel']."<br>";
			echo "E-mail: ".$_GET['reg_input_mail']."<br>";
    
          }
		  else
		  {
			  if ($_GET['new_reg'] == '1' and $login == $_GET['reg_input_seans'])
			  {
			  echo "<br>К сожалению, введенный вами логин уже занят, придумайте другой, например: ";
			  echo $_GET['reg_input_seans'].rand(5, 15)." или ".$_GET['reg_input_seans'].rand(5, 15);
			  }
			  echo "
<form action=".$_SERVER['PHP_SELF']." name='myformreg' method='get'>
<table border='0'>
<tr><td colspan='2' height='50'><h2>Регистрационная информация</h2></td></tr>
<tr>
<td>Логин</td>
<td><input size='50' type='text' name='reg_input_seans' placeholder='Логин' /></td>
</tr>
<tr>
<td>Пароль</td>
<td><input size='50' type='password' name='reg_input_pass' placeholder='Пароль' value='".$_GET['reg_input_pass']."' /></td>
</tr><tr><td colspan='2' height='50'><h2>Дополнительная информация</h2></td></tr>
<tr>
<td>Название организации *</td>
<td><input size='50' type='text' name='reg_input_org' placeholder='Название организации' value='".$_GET['reg_input_org']."' /></td>
</tr>
<tr>
<td>Город</td>
<td><input size='50' type='text' name='reg_input_gorod' placeholder='Город' value='".$_GET['reg_input_gorod']."' /></td>
</tr>
<tr>
<td>ФИО</td>
<td><input size='50' type='text' name='reg_input_fio' placeholder='ФИО' value='".$_GET['reg_input_fio']."' /></td>
</tr>
<tr>
<td>Телефон *</td>
<td><input size='50' type='text' name='reg_input_tel' placeholder='Телефон' value='".$_GET['reg_input_tel']."' /></td>
</tr>
<tr>
<td>E-mail *</td>
<td><input size='50' type='text' name='reg_input_mail' placeholder='E-mail' value='".$_GET['reg_input_mail']."' /></td>
</tr>
<tr>
<td>* - поле обязательное для заполнения</td>
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
<td colspan='2'><input name='msg_reg' type='submit' value='Регистрироваться' class='mybut' /></td>
</tr>
</table>
";
		  }
}

?>