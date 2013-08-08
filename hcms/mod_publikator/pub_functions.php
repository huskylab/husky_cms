<?php
function pub_core_get ()
{
    global $path;              // ���������� ��������������� ���� (�������/����)
    global $publikator_conf;   // ���������� ������ ������������
    global $content;           // ������� ������ ���� ���������� �� ��
	
	 global $login;
	 global $dostup;
	 global $inf_data;
	 global $inf_org;
	 global $inf_gorod;
	 global $inf_fio;
	 global $inf_tel;
	 global $inf_mail;
	 global $auth;
	 
    
        
$content_file = file_get_contents($path.$publikator_conf["data_file"]);  // ������ ����� ��
if ($content_file)
{
	$content_mas_2 = explode ("\r\n", $content_file);  // ������������ �� �� ��������

foreach ($content_mas_2 as $key => $value)
  {
    if ($value)
	    {
            $content_mas_1 = explode ("[:::]", $value);  // ������������ ������� �� � ������
            $i++;
            $content[$i]["id"] = $content_mas_1[0];
            $content[$i]["title"] = $content_mas_1[1];
            $content[$i]["full_new"] = $content_mas_1[2];
            $content[$i]["short_new"] = $content_mas_1[3];
            $content[$i]["category"] = $content_mas_1[4];
            $content[$i]["label"] = $content_mas_1[5];
            $content[$i]["date_add"] = $content_mas_1[6];
            $content[$i]["date_edit"] = $content_mas_1[7];
            $content[$i]["editor"] = $content_mas_1[8];
            $content[$i]["autor"] = $content_mas_1[9];
            $content[$i]["rang"] = $content_mas_1[10];
            $content[$i]["views"] = $content_mas_1[11];
            $content[$i]["tip_posta"] = $content_mas_1[12];
			$content[$i]["komentarii"] = $content_mas_1[13];
			$content[$i]["dop"] = $content_mas_1[14];
        }
  }
}
else 
      {
	      echo "������ ������ �� �� �� �������";
	  } 
}

function pub_core_put ()
{
    global $path;             // ���������� ��������������� ���� (�������/����)
	global $publikator_conf;  // ���������� ������ ������������
	global $zaprosinfo;       // ���������� �������������� ��������� �� ����������� �������
    global $content;          // ���������� ������ ���� ���������� �� ��
	
	 global $login;
	 global $dostup;
	 global $inf_data;
	 global $inf_org;
	 global $inf_gorod;
	 global $inf_fio;
	 global $inf_tel;
	 global $inf_mail;
	 global $auth;
	 

    
    $count = count($content) + 1;
    for ($number = 1; $number < $count; $number++)
    {
        if ($content[$number]){
        $result .= $content[$number]['id'];
        $result .= "[:::]";
        $result .= $content[$number]['title'];
        $result .= "[:::]";
		$content[$number]['full_new'] = str_replace("\r\n", " ", $content[$number]['full_new']);
		
		//$content[$number]['full_new'] = str_replace("<", "&lt;", $content[$number]['full_new']);
		//$content[$number]['full_new'] = str_replace(">", "&gt;", $content[$number]['full_new']);
		
        $result .= $content[$number]['full_new'];
        $result .= "[:::]";
		
		$content[$number]['short_new'] = str_replace("\r\n", " ", $content[$number]['short_new']);
		//$content[$number]['short_new'] = str_replace("<", "&lt;", $content[$number]['short_new']);
		//$content[$number]['short_new'] = str_replace(">", "&gt;", $content[$number]['short_new']);
		
        $result .= $content[$number]['short_new']; // todo: ������� �������� ������ �� ���������
        $result .= "[:::]";
        $result .= $content[$number]['category'];
        $result .= "[:::]";
        $result .= $content[$number]['label'];
        $result .= "[:::]";
        $result .= $content[$number]['date_add'];
        $result .= "[:::]";
        $result .= $content[$number]['date_edit'];
        $result .= "[:::]";
        $result .= $content[$number]['editor'];
        $result .= "[:::]";
        $result .= $content[$number]['autor'];
        $result .= "[:::]";
        $result .= $content[$number]['rang'];
        $result .= "[:::]";
        $result .= $content[$number]['views'];
        $result .= "[:::]";
        $result .= $content[$number]['tip_posta'];
		$result .= "[:::]";
        $result .= $content[$number]['komentarii'];
		$result .= "[:::]";
        $result .= $content[$number]['dop'];
        
             if ($number !== $count - 1)
             {
                  $result .= "\r\n";
             }
                      }     
    }
     
    // ���������� BB ����� // todo: ���������� BB �����
    //$result = str_replace("[url]", "<a href=\"", $result);
    //$result = str_replace("[/url]", "</pre>", $result);
     
    if (file_put_contents($path.$publikator_conf["data_file"], $result))
    {
        echo $zaprosinfo; // "������ ��������, ��������� <a href=index.php>�����</a>";
    }
    else
    {
        echo "������ ������ � �� �� �������";
    }

}

function pub_core_sort ($argument = FALSE, $inc_sort = FALSE)
{
    global $path;              // ���������� ��������������� ���� (�������/����)
    global $publikator_conf;   // ���������� ������ ������������
    global $content;           // ���������� ������ ���� ���������� �� ��
	// global $template;          // ���������� ������ �������
    global $post;              // ������� ��������������� ������ ���������� � ���������� ���������
    global $for_edit;          // ������� ����� ������� ��� ��������������
	global $number;            // ������� ����� ����� �������, ���������� ������� (��� ������ �� id)
	global $for_func;                     
    
	 global $login;
	 global $dostup;
	 global $inf_data;
	 global $inf_org;
	 global $inf_gorod;
	 global $inf_fio;
	 global $inf_tel;
	 global $inf_mail;
	 global $auth;
	 
    
	 if ($inc_sort) {$request = $inc_sort;}
	 elseif ($_REQUEST['id']) {$request = $_REQUEST['id'];}
     elseif ($_REQUEST['category']) {$request = $_REQUEST['category'];}
	 elseif ($_REQUEST['label']) {$request = $_REQUEST['label'];}
	
    if ($argument == "id")     // ����� ������� �� �� id (������������ ��� ������� $_REQUEST['id'])
     {
       $count = count($content) + 1;
       for ($i = "0"; $i < $count; $i++)
         {
             if ($content[$i]['id'] == $request)
             {
                $for_edit = $i; // ����� ������� ��� �������������� ������� � ���������� ���������
                $number = "1";  // ����������� 1-� ����� ������������� ����� �������, ����������� ������ �������
                $post[$number] = $content[$i]; // ��������� ������ $post �� ������ �������
              }
         }
      }

     elseif ($argument == "category" or $argument == "label") // ����� �� ���������/������ (��� ������� $_REQUEST['category'] ��� $_REQUEST['label'])
    
	 {
        // echo "<p><b>/!\ ����� ����� ������� �� $argument ����������������: $request</b></p>";
        
		$count = count($content) + 1;
        for ($i = "1"; $i < $count; $i++)
           {
             /**
              * ������� ������ �� �������� �������, ����������� ������� � ���������� ��� 
              * � �������� ������� $content[$i][$argument] ��� [$argument] ������� �� $_REQUEST
              */
             
             $sort = explode(", ", $content[$i][$argument]); // ������ � ������ �������� �������, ����������� �������
             $content[$i][$argument] = $sort;                // ��������������
             
             $countsort = count($sort) + 1;                  // ��������� ������
             for ($ii = "0"; $ii < $countsort; $ii++)
             {
                if ($content[$i][$argument][$ii] === $request) // ��������� ����� �� ������������ $_REQUEST[$argument]
                {
                    $iii++;
                    $post[$iii]["id"] = $content[$i]['id'];
                    $post[$iii]["title"] = $content[$i]['title'];
                    $post[$iii]["full_new"] = $content[$i]['full_new'];
                    $post[$iii]["short_new"] = $content[$i]['short_new'];
                    $post[$iii]["category"] = $content[$i]['category'];
                    $post[$iii]["label"] = $content[$i]['label'];
                    $post[$iii]["date_add"] = $content[$i]['date_add'];
                    $post[$iii]["date_edit"] = $content[$i]['date_edit'];
                    $post[$iii]["editor"] = $content[$i]['editor'];
                    $post[$iii]["autor"] = $content[$i]['autor'];
                    $post[$iii]["rang"] = $content[$i]['rang'];
                    $post[$iii]["views"] = $content[$i]['views'];
                    $post[$iii]["tip_posta"] = $content[$i]['tip_posta'];
					$post[$iii]["komentarii"] = $content[$i]['komentarii'];
					$post[$iii]["dop"] = $content[$i]['dop'];
					
					$for_func = $iii; // ������� ������ ������� ��������� ��� ������� �������
					
					//echo "<p><b>/?\ ���� ����������: $iii </b>".$post[$iii]['full_new']."</p>";
					
					//massivinfo($post);
                }
             }                  
                               
           }
                    //massivinfo($content);
     }
     else 
     {
         // echo "<p><b>/?\ ������� ��� ������� ��� ����������</b></p>";
		 
		 $count = count($content) + 1;
         for ($i = "1"; $i < $count; $i++)
         {
            $ii++;
            $post[$ii]["id"] = $content[$i]['id'];
            $post[$ii]["title"] = $content[$i]['title'];
            $post[$ii]["full_new"] = $content[$i]['full_new'];
            $post[$ii]["short_new"] = $content[$i]['short_new'];
            $post[$ii]["category"] = $content[$i]['category'];
            $post[$ii]["label"] = $content[$i]['label'];
            $post[$ii]["date_add"] = $content[$i]['date_add'];
            $post[$ii]["date_edit"] = $content[$i]['date_edit'];
            $post[$ii]["editor"] = $content[$i]['editor'];
            $post[$ii]["autor"] = $content[$i]['autor'];
            $post[$ii]["rang"] = $content[$i]['rang'];
            $post[$ii]["views"] = $content[$i]['views'];
            $post[$ii]["tip_posta"] = $content[$i]['tip_posta'];
			$post[$ii]["komentarii"] = $content[$i]['komentarii'];
			$post[$ii]["dop"] = $content[$i]['dop'];
         }
	
	 }

}

function pub_core_content ($arg_sort = false, $znach_sort = false, $template = false)
{

     pub_core_get ();
     
     global $path;               // ���������� ��������������� ���� (�������/����)
     global $publikator_conf;    // ���������� ������ ������������
     global $content;            // ���������� ������ ���� ���������� �� ��
     global $post;               // ���������� ��������������� ������ $post �� ���������� �������
     //global $template;           // ���������� ������ �������
     global $number;             // ���������� ����� ����� �������, ���������� ������� (��� ������ �� id)
	 global $for_func;
	 
	 global $login;
	 global $dostup;
	 global $inf_data;
	 global $inf_org;
	 global $inf_gorod;
	 global $inf_fio;
	 global $inf_tel;
	 global $inf_mail;
	 global $auth;
	 
	 
	   if ($_REQUEST['id'] && !$_REQUEST['do'] && !$arg_sort && !$znach_sort) // hcms.ru/index.php?id=1 (hcms.ru/id/1)
            
			{    
                  pub_core_sort ("id"); // ��������� ������� �� id
                  pub_dop_addview ();     // ��������� �������� �������
                  include 'hcms/mod_publikator/news_templates/show_full.php';
                  //massivinfo($post);
			}
			 
	    elseif ($arg_sort == 'id' && $znach_sort) // pub_core_content ($arg_sort = id, $znach_sort = 5, $template = FALSE)
            {
                  pub_core_sort ($arg_sort, $znach_sort);
				  include 'hcms/mod_publikator/news_templates/'.$template.'.php';
			}
			
		elseif ($arg_sort == 'label' or $arg_sort == 'category' && $znach_sort) // pub_core_content ($arg_sort = id, $znach_sort = 5, $template = FALSE)
            {
                  pub_core_sort ($arg_sort, $znach_sort);
				  
				  for ($number = 0; $number < $for_func + 1; $number++)
				  {
				      if ($number > 0) // ������� ������� � �������������� ��������
                      {
                           include 'hcms/mod_publikator/news_templates/'.$template.'.php';
				           //massivinfo($post);
                      }
				  }
			}
			
		elseif (!$_REQUEST['page'] && $_REQUEST['category'] && !$_REQUEST['label']) // hcms.ru/index.php?category=1 (hcms.ru/category/1)
             {    
                pub_core_sort ("category");
                //massivinfo($post);
                
                for ($number = count ($post); 
                     $number > count ($post) - $publikator_conf["news_to_page"];
                     $number--)
                {
                    if ($number > 0) // ������� ������� � �������������� ��������
                    {
                        include 'hcms/mod_publikator/news_templates/'.$template.'.php';
                    }
                }
             }
             
        elseif (!$_REQUEST['page'] && !$_REQUEST['category'] && $_REQUEST['label']) // hcms.ru/index.php?label=1 (hcms.ru/label/1)
            {    
                pub_core_sort ("label");
                //massivinfo($post);
                
                for ($number = count ($post); 
                     $number > count ($post) - $publikator_conf["news_to_page"];
                     $number--)
                {
                    if ($number > 0)
                    {
                        include 'hcms/mod_publikator/news_templates/'.$template.'.php';
                    }
                }
             }
             
        elseif ($_REQUEST['page'] && $_REQUEST['category'] && !$_REQUEST['label']) // hcms.ru/index.php?page=1&category=1 (hcms.ru/page/1/category/1)
            {    
                pub_core_sort ("category");
                //massivinfo($post);
                
                for ($number = count ($post) - ($publikator_conf["news_to_page"] * $_REQUEST['page']) + $publikator_conf["news_to_page"]; 
                     $number > count ($post) - ($publikator_conf["news_to_page"] * $_REQUEST['page']); 
                     $number--)
                {
                    if ($number > 0)
                    {
                        include 'hcms/mod_publikator/news_templates/'.$template.'.php';
                    }
                }
             }
             
        elseif ($_REQUEST['page'] && !$_REQUEST['category'] && $_REQUEST['label']) // hcms.ru/index.php?page=1&label=1 (hcms.ru/page/1/label/1)
            {    
                pub_core_sort ("label");
                //massivinfo($post);
                
                for ($number = count ($post) - ($publikator_conf["news_to_page"] * $_REQUEST['page']) + $publikator_conf["news_to_page"]; 
                     $number > count ($post) - ($publikator_conf["news_to_page"] * $_REQUEST['page']); 
                     $number--)
                {
                    if ($number > 0)
                    {
                        include 'hcms/mod_publikator/news_templates/'.$template.'.php';
                    }
                }
             }
             
        elseif ($_REQUEST['page'] && !$_REQUEST['category'] && !$_REQUEST['label']) // hcms.ru/index.php?page=1 (hcms.ru/page/1)
            {
                pub_core_sort ();
                //massivinfo($post);
                
                for ($number = count ($post) - ($publikator_conf["news_to_page"] * $_REQUEST['page']) + $publikator_conf["news_to_page"]; 
                     $number > count ($post) - ($publikator_conf["news_to_page"] * $_REQUEST['page']); 
                     $number--)
                    
                    if ($number > 0)
                    {
                        include 'hcms/mod_publikator/news_templates/'.$template.'.php';
                    }
            }
			
        else  // �� ��, ��� � ����������, �� ��� ���������� $_REQUEST
           {
                pub_core_sort ();
                //massivinfo($post);
				
				for ($number = count ($post); 
                     $number > count ($post) - $publikator_conf["news_to_page"];
                     $number--)
                
                     {  
                         if ($number > 0) {include 'hcms/mod_publikator/news_templates/'.$template.'.php';}
                     }
					 
			}

}

function pub_core_total ($act = false)
{
    global $path;                // ���������� ��������������� ���� (�������/����)
    global $publikator_conf;     // ���������� ������ ������������
    global $total_news;          // ������� ����������� �������� � ���������� ���������
    
       $total_stat_file = file_get_contents($path.$publikator_conf["total_stat"]); // ������ �� ����� ���������� ���������
       if ($total_stat_file)
       {
          $total_stat = explode ("\r\n", $total_stat_file); // ����� � ������ �������� �������
         
          /**
           * ������ ������ - ����� �������� ���������, ����� ��������� ���� +1
           * �����: ����� ����������� ����������, ������������������ ������������ � �.�.
           */
       }
    
       $total_news = $total_stat[0]; // ������� ���� ������� - ����� �������� ���������
    
    if ($act) // ��������, ������� �� ������� ��������
    {
        $result = $total_news + 1;
        file_put_contents($path.$publikator_conf["total_stat"], $result);
        
        /**
         * $act - �������� ������� ��� ���������� �������:
         * - ������ ����
         * - ���������� �������
         */
    }
}

function pub_func_addnews ()

/**
 * ������� ���������� ��������
 */

{
    pub_core_get ();      // ���������� ������ $content
    pub_core_total ();            // ���������� ���� ����������

    global $path;            // ���������� ��������������� ���� (�������/����)
    global $publikator_conf; // ������ � ������� ������������
    global $content;         // ������ � ������� ������������������� ��������
    global $zaprosinfo;      // ������ �� ���������� ������� ��������� � ����������� ��������
    global $total_news;      // ���������� ������� ����������� id
	
	 global $login;
	 global $dostup;
	 global $inf_data;
	 global $inf_org;
	 global $inf_gorod;
	 global $inf_fio;
	 global $inf_tel;
	 global $inf_mail;
	 global $auth;
	 
    
if ($_REQUEST['title'])
{
    $last_element = count($content);
    
    //$content[$last_element + 1]["id"] = $content[$last_element]['id'] + 1;
    $content[$last_element + 1]["id"] = $total_news + 1;
    $content[$last_element + 1]["title"] = $_REQUEST['title'];
    $content[$last_element + 1]["full_new"] = $_REQUEST['full_new'];
    $content[$last_element + 1]["short_new"] = $_REQUEST['short_new'];
    $content[$last_element + 1]["category"] = $_REQUEST['category'];
    $content[$last_element + 1]["label"] = $_REQUEST['label'];
    $content[$last_element + 1]["date_add"] = $_REQUEST['date_add'];
    $content[$last_element + 1]["date_edit"] = $_REQUEST['date_edit'];
    $content[$last_element + 1]["editor"] = $_REQUEST['editor'];
    $content[$last_element + 1]["autor"] = $_REQUEST['autor'];
    $content[$last_element + 1]["rang"] = $_REQUEST['rang'];
    $content[$last_element + 1]["views"] = $_REQUEST['views'];
    $content[$last_element + 1]["tip_posta"] = $_REQUEST['tip_posta'];
	$content[$last_element + 1]["komentarii"] = $_REQUEST['komentarii'];
	$content[$last_element + 1]["dop"] = $_REQUEST['dop'];
    
    //massivinfo($content);
    
    pub_core_total("add"); // ���������� � ���� ���������� ���������� id
    
    $zaprosinfo = "������ �� ���������� ��������, ��������� <a href=index.php>�����</a>";
    
    pub_core_put (); // ���������� �������

}
   else
{
    include $path.$publikator_conf['forma_putnews'];  // ����� ����� ���������� ��������
}

}

function pub_func_editnews ()

/**
 * ������� �������������� ��������
 */

{
    pub_core_get ();
 
    global $path;             // ���������� ��������������� ���� (�������/����)
    global $publikator_conf;  // ������ � ������� ������������
    global $content;          // ������ � ������� ������������������� ��������
    global $zaprosinfo;       // ������ �� ���������� ������� ��������� � ����������� ��������
    global $number;           // 
    global $post;             // ������ � ������� ��������������� ���������
    global $for_edit;         // ����� ��������� ������� ��� �������������� ����� �� ���������� ��������� 
	
	 global $login;
	 global $dostup;
	 global $inf_data;
	 global $inf_org;
	 global $inf_gorod;
	 global $inf_fio;
	 global $inf_tel;
	 global $inf_mail;
	 global $auth;
	 


           pub_core_sort ("id");  //  ��������� ������� �� id
           
           if ($_REQUEST['do'] == 'editnews') {include $path.$publikator_conf['forma_editnews'];}
          
          //echo "\$for_edit = ", $for_edit;
          //massivinfo($post);
          
                $content[$_REQUEST['for_edit']]["id"] = $_REQUEST['post_id'];
                $content[$_REQUEST['for_edit']]["title"] = $_REQUEST['title'];
                $content[$_REQUEST['for_edit']]["full_new"] = $_REQUEST['full_new'];
                $content[$_REQUEST['for_edit']]["short_new"] = $_REQUEST['short_new'];
                $content[$_REQUEST['for_edit']]["category"] = $_REQUEST['category'];
                $content[$_REQUEST['for_edit']]["label"] = $_REQUEST['label'];
                $content[$_REQUEST['for_edit']]["date_add"] = $_REQUEST['date_add'];
                $content[$_REQUEST['for_edit']]["date_edit"] = $_REQUEST['date_edit'];
                $content[$_REQUEST['for_edit']]["editor"] = $_REQUEST['editor'];
                $content[$_REQUEST['for_edit']]["autor"] = $_REQUEST['autor'];
                $content[$_REQUEST['for_edit']]["rang"] = $_REQUEST['rang'];
                $content[$_REQUEST['for_edit']]["views"] = $_REQUEST['views'];
                $content[$_REQUEST['for_edit']]["tip_posta"] = $_REQUEST['tip_posta'];
				$content[$_REQUEST['for_edit']]["komentarii"] = $_REQUEST['komentarii'];
				$content[$_REQUEST['for_edit']]["dop"] = $_REQUEST['dop'];
         
        if ($_REQUEST['post_id'])
         {
            $zaprosinfo = "������ �� �������������� ��������, ��������� <a href=index.php?mod=publikator>�����</a>";
            //massivinfo($content);
            
            pub_core_put (); // ���������� ����������������� �������
         }
        
}

function pub_func_delnews ()

/**
 * �������� �������
 */

{
    pub_core_get ();      // ���������� ������ $content

    global $path;            // ���������� ��������������� ���� (�������/����)
    global $publikator_conf; // ������ � ������������
    global $content;         // ������ � ������� ������������������� ��������
    global $zaprosinfo;      // ������ �� ���������� ������� ��������� � ����������� ��������
    global $number;          //
    global $post;            // ������ � ������� ��������������� ���������
    global $for_edit;        // ����� ��������� ������� ��� �������������� ����� �� ���������� ���������
	
	 global $login;
	 global $dostup;
	 global $inf_data;
	 global $inf_org;
	 global $inf_gorod;
	 global $inf_fio;
	 global $inf_tel;
	 global $inf_mail;
	 global $auth;
	 
       
    pub_core_sort ("id");        // ��������� �� id
    
    $content[$for_edit] = false; // ����������� ���������� ����� �������� false
    
    $zaprosinfo = "������ �� �������� ��������, ��������� <a href=index.php>�����</a>";
    
    pub_core_put ();     // ���������� ���� data

}

function pub_dop_addview ()

/**
 * ������� ���������� ��������� ��� ������� �� id
 */

{
    pub_core_get ();      // ���������� ������ $content

    global $path;            // ���������� ��������������� ���� (�������/����)
    global $publikator_conf; // ������ � ������������
    global $content;         // ������ � ������� ������������������� ��������
    global $zaprosinfo;      // ������ �� ���������� ������� ��������� � ����������� ��������
    global $number;          //
    global $post;            // ������ � ������� ��������������� ���������
    global $for_edit;        // ����� ��������� ������� ��� �������������� ����� �� ���������� ���������
                
    $content[$for_edit]["views"] = $content[$for_edit]["views"] + 1;
    
    $zaprosinfo = "";       // ������ ��������� � ���������� �������
                 
    pub_core_put ();     // ���������� ���� data
}

function pub_dop_addrating ()

/**
 * ��������� ����� ������
 */

{
    pub_core_get ();      // ���������� ������ $content

    global $path;            // ���������� ��������������� ���� (�������/����)
    global $publikator_conf; // ������ � ������������
    global $content;         // ������ � ������� ������������������� ��������
    global $zaprosinfo;      // ������ �� ���������� ������� ��������� � ����������� ��������
    global $number;          //
    global $post;            // ������ � ������� ��������������� ���������
    global $for_edit;        // ����� ��������� ������� ��� �������������� ����� �� ���������� ���������
    
    pub_core_sort ("id");         // ��������� �� id
                
    if ($_REQUEST['rang'] == "plus")  // ���� ����, ��...
    {
        $content[$for_edit]["rang"] = $content[$for_edit]["rang"] + 1;
    }
    else
    {
        $content[$for_edit]["rang"] = $content[$for_edit]["rang"] - 1;
    }
    
    $zaprosinfo = "";       // ������ ��������� � ���������� �������
               
    pub_core_put ();     // ���������� ���� data
}

function pub_dop_pageinc ()
{
    global $publikator_conf;  // ������ ������������
    global $content;          // ������� ������ ���� ���������� � ���������� ���������
    global $post;             // ��������� ���������������� ������� $post �� ���������� �������
    
    if (count ($post) > $publikator_conf["news_to_page"])
    {
         if ($_REQUEST['category']) // todo: ������� ������������� ��� ������
         {
            $pages = ceil(count ($post) / $publikator_conf["news_to_page"]);
           
            /**
             * ceil - ���������� ��������� ������� ����� �� value
             */
            
            for ($i = 1; $i < $pages + 1; $i++)
            {
                echo ": "."<a href=?page=".$i."&category=".$_REQUEST['category'].">".$i."</a>"." :";
            }
         }
         elseif ($_REQUEST['label']) // todo: ������� ������������� ��� ������
         {
            $pages = ceil(count ($post) / $publikator_conf["news_to_page"]);
            for ($i = 1; $i < $pages + 1; $i++)
            {
                echo ": "."<a href=?page=".$i."&label=".$_REQUEST['label'].">".$i."</a>"." :";
            }
         }
         else 
         {
            $pages = ceil(count ($post) / $publikator_conf['news_to_page']);
            for ($i = 1; $i < $pages + 1; $i++)
            {
                echo ": "."<a href=?page=".$i.">".$i."</a>"." :";
            }
         }
    }
    else
    {
         //echo "�� ����� ���������";
    }
    
}

function pub_dop_labels ($label = false)
{
    global $publikator_conf;    // ������ ������������
    global $content;            // ������� ������ ���� ���������� � ���������� ���������
    global $post;               // ��������� ���������������� ������� $post �� ���������� �������
    
    pub_core_get ();  // ���������� ������ $content
    
    $count = count($content) + 1;
    for ($i = "1"; $i < $count; $i++)
           {
             $sort = explode(", ", $content[$i][$label]);
             
             $countsort = count($sort);
             for ($ii = "0"; $ii < $countsort; $ii++)
             {
                 $labels[$sort[$ii]] = $sort[$ii]; 
                 /**
                  * �������� ������� ����������� ���� ������ ��� ��������
                  * � ���������� ������ ����������� ������ �� ������ �������� 
                  */
             }
           } 
    foreach ($labels as $key => $val)
    {
        echo " <a href=?$label=".urlencode($val).">".$val."</a> ";
        /**
         * ���������� ������, � ������� ��� �� ���������-�������� ������� 
         * (�� ����������� ������ "-" � ����� ������������� "_" � ����� ".") �������� ��������������������: 
         * ���� �������� (%), �� ������� ������� ��� ����������������� ����� (������������ ��� �������), 
         * � ������ ������� ������� �� ���� "+". 
         * 
         * ������ ����� ������� ���������� ��� ������, ���������� HTML-�������.
         */
    }
    // massivinfo ($labels);  
}

function pub_dop_allcontent () // todo: ���������� �������

/**
 * ���������� �������
 * ����� ����� ��������
 */

{
     pub_core_get ();
     
     global $content;
     
     if ($content)
     {
           $content_reserve = array_reverse($content); // $content � �������� ������� 

           foreach ($content_reserve as $key => $value)
           {
                echo $key, "<br>";
                foreach ($value as $k => $v)
                {
                     echo $k, " - ";
                     echo $v, "<br>";
                }
           echo "<hr>";
           
           }
      }else {echo "�������� ���";}
}

function massivinfo ($arrname = false)
{
    //echo "������ $arrname";
    echo "<pre>";
    print_r ($arrname);
    echo "</pre>";
}

/**
 * �������� ������� 
 * -------------------------------------------------------------------------------------------------------------------
 * pub_core_get ()                       ������� � ������� � ������ ������ �� ��
 * pub_core_put ()                       ������ ����������/����������� ������ � ��
 * pub_core_sort ($argument = false)     ��������� (������������) ���������� ������� � �������� ������� ��������� ��������
 * pub_core_content ($arg_sort = FALSE, $znach_sort = FALSE, $template = FALSE)   ������� ������������ �������
 * pub_core_total ($act = false)         ������� ����� ���������� ������� ������� � ��
 * 
 * ����������� �������
 * -------------------------------------------------------------------------------------------------------------------
 * pub_func_addnews ()                    ���������� �������
 * pub_func_editnews ()                   �������������� �������
 * pub_func_delnews ()                    �������� �������
 * 
 * �������������� �������
 * -------------------------------------------------------------------------------------------------------------------
 * pub_dop_addview ()                     ���������� "���������" ������ ��� �� ��������
 * pub_dop_addrating ()                   ���������� �������� �������
 * pub_dop_pageinc ()                     ����������� ����������� �������
 * pub_dop_labels ($label = false)        ����������� ����������� �������� ����
 * pub_dop_allcontent ()                  ������� ������������ ���� ������� (���������� �� �������������)
 * 
 * massivinfo ($arrname = false)          ������� ������� �������� (�������� var_dump)
 *
 * ���������� ���������� ������
 * -------------------------------------------------------------------------------------------------------------------
 * global $path;              // ���������� ��������������� ���� (�������/����)
 * global $publikator_conf;   // ���������� ������ ������������
 * global $content;           // ������� ������ ���� ���������� �� ��
 * global $zaprosinfo;        // ���������� �������������� ��������� �� ����������� �������
 * global $post;              // ��������� ���������������� ������� $post �� ���������� �������
 * global $template;          // ���������� ������ �������
 * global $for_edit;          // ������� ����� ������� ��� ��������������
 * global $number;            // ������� ����� ����� �������, ���������� ������� (��� ������ �� id)
 *
 * $arg_sort                  // FALSE
 * $znach_sort                // FALSE 
 * $template                  // FALSE
 *
 * $_REQUEST['do']
 * $_REQUEST['id']
 * $_REQUEST['page']
 * $_REQUEST['category']
 * $_REQUEST['label']
 *
 * $_REQUEST['title']
 * $_REQUEST['full_new']
 * $_REQUEST['short_new']
 * $_REQUEST['category']
 * $_REQUEST['label']
 * $_REQUEST['date_add']
 * $_REQUEST['date_edit']
 * $_REQUEST['editor']
 * $_REQUEST['autor']
 * $_REQUEST['rang']
 * $_REQUEST['views']
 * $_REQUEST['dop']
 *
 * $_REQUEST['post_id']
 * $_REQUEST['for_edit']
 *
 */

?>
