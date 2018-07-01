<?php

echo form_open('consume/create');
?>

<table border="0" cellpadding="3" cellspacing="0">
    <tr bgcolor="#66cc44">
        <td><label for="date">消費日期</label></td>
        <td><label for="category">類別</label></td>
        <td><label for="money">金額</label></td>
        <td><label for="memo">備註</label></td>
    </tr>
    <tr bgcolor="#dddddd">
        <td><input type="input" name="date" /></td>
        <td><input type="input" name="category" /></td>
        <td><input type="input" name="money" /></td>
        <td><input type="input" name="memo" /></textarea></td>
    </tr>
</table>

<?php
// not setting the value attribute omits the submit from the $_POST array
echo form_submit('', 'Add');

echo form_close();