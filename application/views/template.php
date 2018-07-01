<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title><?php echo $title;?></title>
</head>
<body>

    <div class="navigation">
        <?php
            // nav bar
            echo anchor('consume/index', '主頁');
            echo (' | ');
            echo anchor('consume/add', '新增消費');
            echo (' | ');
            echo anchor('consume/listing', '消費明細');
        ?>
    </div>

    <h1><?php echo $headline;?></h1>

    <?php $this->load->view($include);?>

</body>
</html>