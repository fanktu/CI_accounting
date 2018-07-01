<?php

echo form_open('consume/update');

echo form_hidden('id', $row[0]->id);
?>

<table border="0" cellpadding="3" cellspacing="0">
    <tr bgcolor="#66cc44">
        <td><label for="date">消費日期</label></td>
        <td><label for="category">類別</label></td>
        <td><label for="money">金額</label></td>
        <td><label for="memo">備註</label></td>
    </tr>
    <tr bgcolor="#dddddd">
        <td><input type="text" name="date" value="<?php echo $row[0]->date ?>" /></td>
        <td><input type="text" name="category" value="<?php echo $row[0]->category ?>" /></td>
        <td><input type="text" name="money" value="<?php echo $row[0]->money ?>" /></td>
        <td><input type="text" name="memo" value="<?php echo $row[0]->memo ?>" /></td>
    </tr>
</table>

<?php
// not setting the value attribute omits the submit from the $_POST array
echo form_submit('', 'Update');

echo form_close();