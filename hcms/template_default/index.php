<?php include "hcms/core_header.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Стартовая страничка</title>
<?php echo "<link rel='stylesheet' type='text/css' href='http://hcms.ru/hcms/".$core_config['template']."/style.css'>"; ?>

	<script type="text/javascript" src="http://hcms.ru/hcms/template_default/syntaxhighlighter/scripts/shCore.js"></script>
    <script type="text/javascript" src="http://hcms.ru/hcms/template_default/syntaxhighlighter/scripts/shBrushCss.js"></script>
    <script type="text/javascript" src="http://hcms.ru/hcms/template_default/syntaxhighlighter/scripts/shBrushXml.js"></script>
    <script type="text/javascript" src="http://hcms.ru/hcms/template_default/syntaxhighlighter/scripts/shBrushPhp.js"></script>
    <script type="text/javascript" src="http://hcms.ru/hcms/template_default/syntaxhighlighter/scripts/shBrushSql.js"></script>
    <script type="text/javascript" src="http://hcms.ru/hcms/template_default/syntaxhighlighter/scripts/shBrushJScript.js"></script>
    
	<link type="text/css" rel="stylesheet" href="http://hcms.ru/hcms/template_default/syntaxhighlighter/styles/shCoreDefault.css"/>
	<script type="text/javascript">
	        // SyntaxHighlighter.config.stripBrs = true;
	        SyntaxHighlighter.all();
    </script>

<script type="text/javascript" src="http://hcms.ru/hcms/template_default/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea.forred",
	language : 'ru',
	
	forced_root_block : false,
    force_br_newlines : true,
    force_p_newlines : false,
		
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste textcolor"
        ],
		
		toolbar1: "undo redo | bold italic underline strikethrough | bullist numlist | blockquote link unlink image media",
		toolbar2: "styleselect fontsizeselect hr removeformat visualchars visualblocks searchreplace print | code preview",

       // toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
       // toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
       // toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [
		        {title: 'абзац', inline: 'p'},
				{title: 'xml код', inline: 'pre', classes: 'brush: xml'},
				{title: 'css код', inline: 'pre', classes: 'brush: css'},
				{title: 'JScript код', inline: 'pre', classes: 'brush: js'},
				{title: 'php код', inline: 'pre', classes: 'brush: php'},
				{title: 'sql код', inline: 'pre', classes: 'brush: sql'},
		        {title: 'php + html', inline: 'pre', classes: 'brush: php; html-script: true'},
				{title: 'css + html', inline: 'pre', classes: 'brush: css; html-script: true'},
				{title: 'JScript + html', inline: 'pre', classes: 'brush: js; html-script: true'},
				// {title: 'Bold text', inline: 'b'},
                // {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                // {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                // {title: 'Example 1', inline: 'span', classes: 'example1'},
                // {title: 'Example 2', inline: 'span', classes: 'example2'},
                // {title: 'Table styles'},
                // {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
        ]

});</script>



</head>
<body>

<div class="main_header">
<?php pub_core_content ('id', '9', 'content'); ?>
</div>

<div class="main_content">
<?php 

if ($_REQUEST['do'] == 'addnews')  {pub_func_addnews ();}       // добавление новостей
elseif ($_REQUEST['do'] == 'editnews') {pub_func_editnews ();}  // редактирование новостей
elseif ($_REQUEST['do'] == 'dellnews') {pub_func_delnews ();}   // удаление новостей
else {pub_core_content (false, false, 'default');}              // вывод новостей 
pub_dop_pageinc ();                                             // вывод страниц                                         

?>

</div>

<div class="main_sider">
<?php

include 'hcms/mod_registr/templates/auth_form.php';
echo "<hr>";

pub_core_content ('id', '1', 'content'); // выводим новость с id=1
echo "<b>Ключевые слова</b><br>";
pub_dop_labels ('label');
echo "<br><b>Категории</b><br>";
pub_dop_labels ('category');

// pub_core_content ('label', 'mylabel', 'content');               // вывод по label
// pub_core_content ('category', 'mycat', 'content');              // вывод по category

if ($_REQUEST['p'] == 'test') {pub_core_content ('id', '1', 'content');} 
?>
</div>

<div class="main_bottom">
<?php echo $core_config['name']; 
?>
</div>

</body>
</html>