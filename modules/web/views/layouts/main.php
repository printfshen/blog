<?php

use app\assets\WebAsset;

WebAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!--head-->
web头部
<?php $this->head(); ?>
<!--head-->

<?php $this->beginBody(); ?>
<!--body-->
<?= $content; ?>
<!--body-->
<?php $this->endBody(); ?>


<?php $this->endPage(); ?>
