<form action="http://hcms.ru/index.php" method=post >
<input type='hidden' name='do' value='editnews'></input>
<input type='hidden' name='for_edit' value='<?php echo $for_edit; ?>'></input>
<table width=100% border=0 cellspacing=0 cellpadding=4>
 <tr>
      <td width="130px">Номер новости</td>
      <td ><textarea name=post_id cols=1 rows=1 ><?php echo $post[$number]['id']; ?></textarea>
      </td>
    </tr>
   <tr>
      <td valign="top">Заголовок новости</td>
      <td ><textarea name=title cols=50 rows=1 ><?php echo $post[$number]['title']; ?></textarea> </td>
    </tr>
       <tr>
      <td valign="top">Тип новости </td>
      <td >
                 <?php
				 if ($post[$number]['tip_posta'] == 'text')
				    {
						 echo "<input checked='checked' type='radio' name='tip_posta' value='text'> Текст <br>";
						 echo "<input type='radio' name='tip_posta' value='code'> Код <br>";
					}
				 elseif ($post[$number]['tip_posta'] == 'code')
				    {
						 echo "<input type='radio' name='tip_posta' value='text'> Текст <br>";
						 echo "<input checked='checked' type='radio' name='tip_posta' value='code'> Код <br>";
					}
				 else
				    {
						 echo "<input checked='checked' type='radio' name='tip_posta' value='text'> Текст <br>";
						 echo "<input type='radio' name='tip_posta' value='code'> Код <br>";
					}
				 
				   ?>
       </td>
    </tr>
    <tr>
      <td valign="top"  >Короткая новость</td>
      <td ><textarea class="forred" name=short_new ><?php echo htmlspecialchars($post[$number]['short_new']); ?></textarea> </td>
    </tr>
    <tr>
      <td valign="top"  >Полная новость</td>
      <td ><textarea class="forred" name=full_new  ><?php echo htmlspecialchars($post[$number]['full_new']); ?></textarea></td>
    </tr>
        <tr>
      <td valign="top"  >Категория</td>
      <td ><textarea name=category cols=50 rows=1 ><?php echo $post[$number]['category']; ?></textarea></td>
    </tr>
        <tr>
      <td valign="top"  >Ярлыки</td>
      <td ><textarea name=label cols=50 rows=1 ><?php echo $post[$number]['label']; ?></textarea></td>
    </tr>
           <tr>
      <td valign="top"  >Количество просмотров</td>
      <td ><textarea name=views cols=50 rows=1 ><?php echo $post[$number]['views']; ?></textarea></td>
    </tr>

  <tr>
      <td valign="top"  >Дата размещения</td>
      <td ><textarea name=date_add cols=50 rows=1 ><?php echo $post[$number]['date_add']; ?></textarea> </td>
    </tr>
      <tr>
      <td valign="top"  >Дата редактирования</td>
      <td ><textarea name=date_edit cols=50 rows=1 ><?php echo date($publikator_conf['format_data']); ?></textarea></td>
    </tr>
  <tr>
    <td  valign="top" >Автор</td>
      <td ><textarea name=autor cols=50 rows=1 ><?php echo $post[$number]['autor']; ?></textarea></td>
    </tr>
    <tr>
    <td valign="top"  >Редактор</td>
      <td ><textarea name=editor cols=50 rows=1 ><?php echo $inf_fio." (".$login.")"; ?></textarea></td>
    </tr>
        <tr>
          <td valign="top"  >Рейтинг</td>
          <td ><textarea name=rang cols=50 rows=1 ><?php echo $post[$number]['rang']; ?></textarea> </td>
        </tr>
                <tr>
          <td valign="top"  > Дополнительное поле</td>
          <td ><textarea name=dop cols=50 rows=1 ><?php echo $post[$number]['dop']; ?></textarea></td>
        </tr>
  <tr>
    <td><input type=submit value=Отправить ></td>
    <td align='left'><input type=reset value=Сбросить></td>
  </tr>
</table></form>