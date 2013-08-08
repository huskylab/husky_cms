<?php
// echo "тест подключения pager_functions.php<br>";
function content_input()
{
	global $hpost;
	global $parametr;
	global $key;
	global $pager_config;
	global $post_template;
	
	if (isset ($post_template))
	{
		$pager_config['template'] = $post_template;
	}
	
	$data_0 = file_get_contents("hcms/mod_pager/data/content.txt");
	$data_1 = explode("\r\n", $data_0);
	
	$count_data_1 = count($data_1);
	
	for ($i = 0; $i <= $count_data_1-1; $i++) 
	{
        $data_2 = explode("/:::/", $data_1[$i]);
		
			     $hpost    [$data_2['0']]['content']            = $data_2['0'];  
		         $hpost    [$data_2['0']]['content_date']       = $data_2['1']; 
		         $hpost    [$data_2['0']]['content_autor']      = $data_2['2']; 
		         $hpost    [$data_2['0']]['tema']               = $data_2['3'];   
		         $hpost    [$data_2['0']]['tip']                = $data_2['4'];   
		         $hpost    [$data_2['0']]['content_title']      = $data_2['5'];   
		         $hpost    [$data_2['0']]['content_shortpost']  = $data_2['6'];   
		         $hpost    [$data_2['0']]['content_fullpost']   = $data_2['7'];
				 
				 $hpost_id[$i] = $data_2['0'];
			
    }
	
	$count_hpost_id = count($hpost_id);
	
	for ($i = 0; $i <= $count_hpost_id-1; $i++)
	    {
		      
			if (isset ($parametr) && isset ($key) && $hpost[$hpost_id[$i]][$parametr] == $key) 
			  {
		      $j = $j + 1;
			  include 'hcms/mod_pager/'.$pager_config['template'];
			  }
			  if (!isset ($parametr) && !isset ($key)) 
			  {
			  $j = $j + 1;
			  include 'hcms/mod_pager/'.$pager_config['template'];
			  }
			  else
			  {}
		}
	if ($j == 0)
	{
	    echo $pager_config['no_res'];
	}
	// echo "<pre>";
	// print_r ($hpost);
	// echo "</pre>";
}
?>