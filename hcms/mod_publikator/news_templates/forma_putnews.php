<form action="http://hcms.ru/index.php" method=post >
<input type=hidden name=do value=addnews></input>
<table width=100% border=0 cellspacing=0 cellpadding=4>
        </tr>
    <tr>
      <td valign="top" width="130px">���������</td>
      <td><textarea name=title cols=50 rows=1 >��������</textarea> </td>
    </tr>
           <tr>
      <td valign="top">��� ������� </td>
      <td >
                 <input type="radio" name="tip_posta" value="text"> �����<br>
                 <input type="radio" name="tip_posta" value="code"> ���<br>
      </td>
    </tr>
      <td valign="top">�������� �������</td>
      <td><textarea class="forred" name=short_new></textarea></td>
    </tr>
    <tr>
      <td valign="top">������ �������</td>
      <td ><textarea class="forred" name=full_new></textarea></td>
    </tr>
     <tr>
      <td valign="top">���������</td>
      <td><textarea name=category cols=50 rows=5 >category</textarea></td>
    </tr>
    <tr>
      <td valign="top">������</td>
      <td><textarea name=label cols=50 rows=5 >label</textarea></td>
    </tr>
    <tr>
      <td valign="top">���� ����������</td>
      <td><textarea name=date_add cols=50 rows=1 ><?php echo date($publikator_conf['format_data']); ?></textarea></td>
    </tr>
    <tr>
      <td valign="top">���� ��������������</td>
      <td><textarea name=date_edit cols=50 rows=1 ></textarea></td>
    </tr>
    <tr>
     <td valign="top">�����</td>
     <td><textarea name=autor cols=50 rows=1 ><?php echo $inf_fio." (".$login.")"; ?></textarea></td>
    </tr>
     <tr>
     <td valign="top">��������</td>
     <td><textarea name=editor cols=50 rows=1 ></textarea></td>
    </tr>
        <tr>
      <td valign="top">����</td>
      <td><textarea name=rang cols=50 rows=1 >0</textarea></td>
    </tr>
        <tr>
      <td valign="top">����� ����������</td>
      <td><textarea name=views cols=50 rows=1 >0</textarea></td>
    </tr>
    <tr>
      <td valign="top">�������������� ����</td>
      <td><textarea name=dop cols=50 rows=1 >dop</textarea></td>
    </tr>
  <tr>
    <td><input type=submit value=��������� ></td>
    <td><input type=reset value=��������></td>
  </tr>
</table>
</form>