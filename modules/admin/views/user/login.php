<?php

use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;

StaticService::includeAppJsStatic('js/admin/user/login.js', AdminAsset::className());
?>
<div id="container" class="cls-container">

    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay"></div>

    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h3 class="h4 mar-no">Account Login</h3>
                    <p class="text-muted">Sign In to your account</p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
            </div>
        </div>
    </div>
    <!--===================================================-->


    <!-- DEMO PURPOSE ONLY -->
    <!--===================================================-->
    <div class="demo-bg">
        <div id="demo-bg-list">
            <div class="demo-loading"><i class="psi-repeat-2"></i></div>
            <img class="demo-chg-bg bg-trans active"
                 src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-trns.jpg') ?>" alt="Background Image">
            <img class="demo-chg-bg" src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-img-1.jpg') ?>"
                 alt="Background Image">
            <img class="demo-chg-bg" src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-img-2.jpg') ?>"
                 alt="Background Image">
            <img class="demo-chg-bg" src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-img-3.jpg') ?>"
                 alt="Background Image">
            <img class="demo-chg-bg" src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-img-4.jpg') ?>"
                 alt="Background Image">
            <img class="demo-chg-bg" src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-img-5.jpg') ?>"
                 alt="Background Image">
            <img class="demo-chg-bg" src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-img-6.jpg') ?>"
                 alt="Background Image">
            <img class="demo-chg-bg" src="<?= UrlService::buildImgUrl('admin/bg-img/thumbs/bg-img-7.jpg') ?>"
                 alt="Background Image">
        </div>
    </div>
    <!--===================================================-->

</div>

