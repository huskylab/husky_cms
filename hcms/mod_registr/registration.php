<?PHP 
include 'index_auth.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>�������� ������ - ��������� ������������ ������</title>
<meta name='keywords' content='�����, ����������� �����, ����������� �����, ���������� �����, ������ ����������, ��������� �������, ������� �������, �������������� �������, ����������� �������, �������, ������ ���������, ������ ����������, ������, ������, �������, ������������ ������� �������, ������������ ������� ����������, ������������ ������� ����, ������������ ������� ��������, ������� ������, �������� ������, ��� ������'>
<meta name='description' content='�������� ������ ������������ �� ����� ����� ���������� �������� � ����� �������� ����������, ��������� � ������� ���������������� ������������ ������'>
</head>
<body>
<link rel="icon" href="http://www.pro-baget.ru/favicon.ico" type="image/x-icon" />
<link rel='stylesheet' href='http://www.pro-baget.ru/style.css' type='text/css'>
<link rel="stylesheet" href="http://pro-baget.ru/css/feature-carousel.css" charset="utf-8" />
<script src="http://pro-baget.ru/js/jquery-1.5.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://pro-baget.ru/js/jquery.featureCarousel.min.js" type="text/javascript" charset="utf-8"></script>
		
<script type="text/javascript" src="http://www.pro-baget.ru/js/hoverIntent.js"></script>
		<script type="text/javascript" src="http://www.pro-baget.ru/js/superfish.js"></script>
		<script type="text/javascript">
        jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});
        </script>
        
<div id="header">
<div id="logo"><img src="http://pro-baget.ru/bg/logo_3.png" /></div>
<div id="menu">
<ul class="sf-menu">

<li class="current"><a href="http://pro-baget.ru">�� �������</a></li>

<li class="current"><a href="/produkt/">���������</a>
<ul>
		<li><a href="/produkt/potolok/">������ ����������</a></li>
        <li><a href="/produkt/stena/">��������� �������</a></li>
        <li><a href="/produkt/plintus/">�������</a></li>
        <li><a href="/produkt/ugol/">������� �������</a></li>
</ul>
</li>	
<li class="current"><a href="/contakt/">��������</a></li>
<?PHP if($auth){echo "<li class='current'><a href='http://pro-baget.ru/Doc/Price_Baget.xls' >�����-����</a></li>";}?>
<li class="current"><a href="http://pro-baget.ru/sendmail_page.php">��� �����</a></li>

</ul>	             

</div>
</div>
<div id="slider_bg" style="color:#CCC">

<!--[if IE]>
<style>
#navmenu ul a{
background:#CCC; 
}
#navmenu ul li{
	float:none;
	padding-top:0px; 
    border: double #093 1px;
    width:204px;
}
</style>
<![endif]-->

<div id="slider_compname_about">����� ���������� �� ���� �������� ��� &quot;������&quot;</div>
<div id="slider_compname_adres">probaget@gmail.com | (495) 502-205-9</div>
<div id="slider">

<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="20%">&nbsp;</td>
    <td>
    <a id="but_prev" style="color:#FFF; font-size:14px;" href="#">�����</a> <font style="color:#FFF; font-size:12px;">| </font>
<a id="but_pause" style="color:#FFF; font-size:14px;" href="#">�����</a> <font style="color:#FFF; font-size:12px;">| </font> 
<a id="but_start" style="color:#FFF; font-size:14px;" href="#">�����</a> <font style="color:#FFF; font-size:12px;">| </font> 
<a id="but_next" style="color:#FFF; font-size:14px;" href="#">������</a>
    <script type="text/javascript">
      $(document).ready(function() {
        var carousel = $("#carousel").featureCarousel({
          // include options like this:
          // (use quotes only for string values, and no trailing comma after last option)
          // option: value,
          // option: value
        });

        $("#but_prev").click(function () {
          carousel.prev();
        });
        $("#but_pause").click(function () {
          carousel.pause();
        });
        $("#but_start").click(function () {
          carousel.start();
        });
        $("#but_next").click(function () {
          carousel.next();
        });
      });
    </script>

  
    <div class="carousel-container">
    
      <div id="carousel">

        <div class="carousel-feature">
          <a href="#"><img class="carousel-image" alt="Image Caption" src="http://pro-baget.ru/bg/pic_1.jpg"></a>
          
        </div>

        <div class="carousel-feature">
          <a href="#"><img class="carousel-image" alt="Image Caption" src="http://pro-baget.ru/bg/pic_2.jpg"></a>
          
        </div>

        <div class="carousel-feature">
          <a href="#"><img class="carousel-image" alt="Image Caption" src="http://pro-baget.ru/bg/pic_3.jpg"></a>
          
        </div>

        <div class="carousel-feature">
          <a href="#"><img class="carousel-image" alt="Image Caption" src="http://pro-baget.ru/bg/pic_4.jpg"></a>
          
        </div>

      </div>
    
      <div id="carousel-left"><img src="http://pro-baget.ru/images/arrow-left.png" /></div>
      <div id="carousel-right"><img src="http://pro-baget.ru/images/arrow-right.png" /></div>
    </div>

</div>
  
    </td>
    <td width="20%">&nbsp;</td>
  </tr>
</table>

</div>

<div id="content_bg">

<div id="osnovnoy_text">

<!--[if lt IE 13]><div style="float:left; width:63%; margin-right:1%;"><![endif]-->
<!--[if !IE]>--> <div style="float:left; width:69%; margin-right:1%;"><!--<![endif]-->
<div id="content_kolonka" >
  <h1>�����������</h1>
<?PHP 
user_reg();
?>
</div>
</div>

<!--[if lt IE 13]><div style="float:left; width:25%"><![endif]-->
<!--[if !IE]>--> <div style="float:left; width:28%"><!--<![endif]-->

<div id="content_kolonka" ><h1>�������</h1>

<?PHP
include "js/for_jquery.cookie.php"; 
echo "<div id='sum'>������ � �������: ".$tot_sum."</div>";
?>
<div id=vybor></div>                                <!--�� �������� ������: -->
<div id='0'></div>                                  <!--������ ��� ���������� ������ -->
<div id='1'></div>
<div id='2'></div>
<div id='3'></div>
<div id='4'></div>
<div id='5'></div>
</div>

<div id="content_kolonka" ><h1>����������� �����</h1>
<p>������������ ������ �������� ����������� �������. ����� �����������, ������������ ��������, ������������� �� ������������� ����������� � ����������� ���� ������� ���������. </p>
<p>������� �������������� ������� � ��������� ������� ��� ���, ��� ����� � ��������� �������, ���, ������������ � ������������. � ������� ������������ �������� ����� ������� ������������ �����������, ��������� ������� ��������� ���������� ������������ � ������������.</p>
</div>
</div>

<div style="clear:both;"> <!--style="clear:both;" - ������ ������� div'� (����� float) -->

</div>

<div style="text-align:center; clear:both;"> <!--style="clear:both;" - ������ ������� div'� (����� float) -->
<div id="content_button_left"></div><div id="content_button_right"></div>
</div>

</div>

</div>


<div id="futer_bg">
<div id="futer_col" style="float:left; margin-right:0.5%" >
<div id="aero"><a href="#" ><img src="http://pro-baget.ru/images/dit.png" width="80" height="58" style="float:left;padding-right:10px; border:0px;" /></a></div>
<p id="futer_p">�������� ��� &laquo;������&raquo; - ������������� �������� &laquo;������-�����-�����&raquo; �� ������������ �������.</p>
</div>

<div id="futer_col" style="float:left; margin-right:0.5%" >
<div id="aero" style="margin-left:50%;">

<div style="float:left;">
<!-- MyCounter v.2.0 -->
<script type="text/javascript"><!--
my_id = 111947;
my_width = 88;
my_height = 41;
my_alt = "MyCounter - ������� � ����������";
//--></script>
<script type="text/javascript"
  src="http://scripts.mycounter.ua/counter2.0.js">
</script><noscript>
<a target="_blank" href="http://mycounter.ua/"><img
src="http://get.mycounter.ua/counter.php?id=111947"
title="MyCounter - ������� � ����������"
alt="MyCounter - ������� � ����������"
width="88" height="41" border="0" /></a></noscript>
<!--/ MyCounter -->
<!--��� ��������� -->
</div>

<div style="float:none;">
<!-- begin of Top100 code -->
<script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?2620332"></script>
<noscript>
<a href="http://top100.rambler.ru/navi/2620332/">
<img src="http://counter.rambler.ru/top100.cnt?2620332" alt="Rambler's Top100" border="0" />
</a>
</noscript>
<!-- end of Top100 code -->
</div>

</div>
</div>

<div id="futer_col" style="float:right; margin-right:0.5%; text-align:right;" >
<p id="futer_p">���.: +7 (495) 502-205-9<br> 
(910) 913-33-00<br> (4842) 72-36-05</p>
</div>


<div id="copyright" style="clear:both;"> <!--style="clear:both;" - ������ ������� div'� (����� float) -->
   <div id="aero" style="float:left">
     <a href="#" >
        <img style="float:left; padding-top:8px; padding-right:10px; border:0px;" src="http://pro-baget.ru/bg/HWL.png" width="137" height="43" />
     </a>
   </div>

  <div style="float:left; text-align:left;">
      <p>��� &quot;������&quot; &copy; 2011<br>���������� �����: HuskyLAB<br>������������� ���������� ����� �������� ������ ��� �������� ��������.</p>
  </div>
  
    <div style="float:right; text-align:right; font-size:15px; color:#FFF;">
<a style="color:#2f6e39;" href="http://pro-baget.ru" >�� �������</a> | 
<a style="color:#498052;" href="/produkt/"  >���������</a> | 
<a style="color:#83a989;" href="http://pro-baget.ru/Doc/Price_Baget.xls" >�����-����</a> | 
<a style="color:#c0d3c3;" href="/contakt/" >��������</a> | 
<a style="color:#f9fbf9;" href="/sendmail_page/" >�������� �����</a> 
  </div>

  </div>
</div>

</body>
</html>
