<?php

use app\assets\AppAsset;

AppAsset::register($this);
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
