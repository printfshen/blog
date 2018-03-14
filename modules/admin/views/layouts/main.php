<?php

use app\assets\AdminAsset;

AdminAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!--head-->
admin头部
<?php $this->head(); ?>
<!--head-->

<?php $this->beginBody(); ?>
<!--body-->
<?= $content; ?>
<!--body-->
<?php $this->endBody(); ?>


<?php $this->endPage(); ?>
