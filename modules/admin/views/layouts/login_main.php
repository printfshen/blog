<?php

use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>登陆</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php $this->head(); ?>
    </head>
    <?php $this->beginBody(); ?>
    <body>
    <?= $content; ?>
    </body>
    <?php $this->endBody(); ?>
</html>
<?php $this->endPage(); ?>

