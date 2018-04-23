<?php

use app\assets\AdminAsset;
use app\common\services\UrlService;

AdminAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Nifty - Admin Template</title>
    <?php $this->head(); ?>
</head>

<!--TIPS-->
<?php $this->beginBody(); ?>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand">
                    <img src="<?= UrlService::buildImgUrl('common/logo.png') ?>" alt="Nifty Logo" class="brand-icon">
                    <div class="brand-title">
                        <span class="brand-text">Nifty</span>
                    </div>
                </a>
            </div>
            <!--================================-->
            <!--End brand logo & name-->


            <!--Navbar Dropdown-->
            <!--================================-->
            <div class="navbar-content clearfix">
                <ul class="nav navbar-top-links pull-left">

                    <!--Navigation toogle button-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="tgl-menu-btn">
                        <a class="mainnav-toggle" href="#">
                            <i class="demo-pli-view-list"></i>
                        </a>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End Navigation toogle button-->


                    <!--Notification dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <i class="demo-pli-bell"></i>
                            <span class="badge badge-header badge-danger"></span>
                        </a>

                        <!--Notification dropdown menu-->
                        <div class="dropdown-menu dropdown-menu-md">
                            <div class="pad-all bord-btm">
                                <p class="text-semibold text-main mar-no">You have 9 notifications.</p>
                            </div>
                            <div class="nano scrollable">
                                <div class="nano-content">
                                    <ul class="head-list">

                                        <!-- Dropdown list-->
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <p class="pull-left">Database Repair</p>
                                                    <p class="pull-right">70%</p>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div style="width: 70%;" class="progress-bar">
                                                        <span class="sr-only">70% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <p class="pull-left">Upgrade Progress</p>
                                                    <p class="pull-right">10%</p>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div style="width: 10%;" class="progress-bar progress-bar-warning">
                                                        <span class="sr-only">10% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <span class="badge badge-success pull-right">90%</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-data-settings icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">HDD is full</div>
                                                    <small class="text-muted">50 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-file-edit icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Write a news article</div>
                                                    <small class="text-muted">Last Update 8 hours ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <span class="label label-danger pull-right">New</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Comment Sorting</div>
                                                    <small class="text-muted">Last Update 8 hours ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-add-user-plus-star icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">New User Registered</div>
                                                    <small class="text-muted">4 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li class="bg-gray">
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <img class="img-circle img-sm" alt="Profile Picture"
                                                         src="<?= UrlService::buildImgUrl('common/profile-photos/9.png') ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Lucy sent you a message</div>
                                                    <small class="text-muted">30 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Dropdown list-->
                                        <li class="bg-gray">
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <img class="img-circle img-sm" alt="Profile Picture"
                                                         src="<?= UrlService::buildImgUrl('common/profile-photos/3.png') ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Jackson sent you a message</div>
                                                    <small class="text-muted">40 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--Dropdown footer-->
                            <div class="pad-all bord-top">
                                <a href="#" class="btn-link text-dark box-block">
                                    <i class="fa fa-angle-right pull-right"></i>Show All Notifications
                                </a>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End notifications dropdown-->


                    <!--Mega dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="mega-dropdown">
                        <a href="#" class="mega-dropdown-toggle">
                            <i class="demo-pli-layout-grid"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu">
                            <div class="row">
                                <div class="col-sm-4 col-md-3">

                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><i class="demo-pli-file icon-fw"></i> Pages</li>
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Search Result</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Sreen Lock</a></li>
                                        <li><a href="#" class="disabled">Disabled</a></li>
                                    </ul>

                                </div>
                                <div class="col-sm-4 col-md-3">

                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><i class="demo-pli-mail icon-fw"></i> Mailbox</li>
                                        <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a>
                                        </li>
                                        <li><a href="#">Read Message</a></li>
                                        <li><a href="#">Compose</a></li>
                                    </ul>
                                    <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer
                                        adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis
                                        natoque penatibus et magnis dis parturient montes.</p>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <span class="badge badge-success pull-right">90%</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-data-settings icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Data Backup</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-support icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Support</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-computer-secure icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Security</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-map-2 icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-dark mar-no">Location</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p class="dropdown-header"><i class="demo-pli-file-jpg icon-fw"></i> Gallery</p>
                                    <ul class="list-unstyled list-inline text-justify">

                                        <li class="pad-btm">
                                            <img src="<?= UrlService::buildImgUrl('common/thumbs/mega-menu-2.jpg') ?>"
                                                 alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?= UrlService::buildImgUrl('common/thumbs/mega-menu-3.jpg') ?>"
                                                 alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?= UrlService::buildImgUrl('common/thumbs/mega-menu-1.jpg') ?>"
                                                 alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?= UrlService::buildImgUrl('common/thumbs/mega-menu-4.jpg') ?>"
                                                 alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?= UrlService::buildImgUrl('common/thumbs/mega-menu-5.jpg') ?>"
                                                 alt="thumbs">
                                        </li>
                                        <li class="pad-btm">
                                            <img src="<?= UrlService::buildImgUrl('common/thumbs/mega-menu-6.jpg') ?>"
                                                 alt="thumbs">
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-sm btn-block btn-default">Browse Gallery</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End mega dropdown-->

                </ul>
                <ul class="nav navbar-top-links pull-right">

                    <!--Language selector-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="dropdown">
                        <a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
                                <span class="lang-selected">
                                    <img class="lang-flag"
                                         src="<?= UrlService::buildImgUrl('common/flags/united-kingdom.png') ?>"
                                         alt="English">
                                </span>
                        </a>

                        <!--Language selector menu-->
                        <ul class="head-list dropdown-menu">
                            <li>
                                <!--English-->
                                <a href="#" class="active">
                                    <img class="lang-flag"
                                         src="<?= UrlService::buildImgUrl('common/flags/united-kingdom.png') ?>"
                                         alt="English">
                                    <span class="lang-id">EN</span>
                                    <span class="lang-name">English</span>
                                </a>
                            </li>
                            <li>
                                <!--France-->
                                <a href="#">
                                    <img class="lang-flag"
                                         src="<?= UrlService::buildImgUrl('common/flags/france.png') ?>" alt="France">
                                    <span class="lang-id">FR</span>
                                    <span class="lang-name">Fran&ccedil;ais</span>
                                </a>
                            </li>
                            <li>
                                <!--Germany-->
                                <a href="#">
                                    <img class="lang-flag"
                                         src="<?= UrlService::buildImgUrl('common/flags/germany.png') ?>" alt="Germany">
                                    <span class="lang-id">DE</span>
                                    <span class="lang-name">Deutsch</span>
                                </a>
                            </li>
                            <li>
                                <!--Italy-->
                                <a href="#">
                                    <img class="lang-flag"
                                         src="<?= UrlService::buildImgUrl('common/flags/italy.png') ?>" alt="Italy">
                                    <span class="lang-id">IT</span>
                                    <span class="lang-name">Italiano</span>
                                </a>
                            </li>
                            <li>
                                <!--Spain-->
                                <a href="#">
                                    <img class="lang-flag"
                                         src="<?= UrlService::buildImgUrl('common/flags/spain.png') ?>" alt="Spain">
                                    <span class="lang-id">ES</span>
                                    <span class="lang-name">Espa&ntilde;ol</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End language selector-->


                    <!--User dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
<!--                                    <img class="img-circle img-user media-object" src="-->
                                    <? //=UrlService::buildImgUrl('common/profile-photos/1.png')?><!--" alt="Profile Picture">-->
                                    <i class="demo-pli-male ic-user"></i>
                                </span>
                            <div class="username hidden-xs">Aaron Chavez</div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                            <!-- Dropdown heading  -->
                            <div class="pad-all bord-btm">
                                <p class="text-main mar-btm"><span class="text-bold">750GB</span> of 1,000GB Used</p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 70%;">
                                        <span class="sr-only">70%</span>
                                    </div>
                                </div>
                            </div>


                            <!-- User dropdown menu -->
                            <ul class="head-list">
                                <li>
                                    <a href="#">
                                        <i class="demo-pli-male icon-lg icon-fw"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="badge badge-danger pull-right">9</span>
                                        <i class="demo-pli-mail icon-lg icon-fw"></i> Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-success pull-right">New</span>
                                        <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="demo-pli-information icon-lg icon-fw"></i> Help
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen
                                    </a>
                                </li>
                            </ul>

                            <!-- Dropdown footer -->
                            <div class="pad-all text-right">
                                <a href="<?=UrlService::buildAdminUrl('/user/login-out')?>" class="btn btn-primary">
                                    <i class="demo-pli-unlock"></i> Logout
                                </a>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End user dropdown-->

                    <li>
                        <a href="#" class="aside-toggle navbar-aside-icon">
                            <i class="pci-ver-dots"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!--================================-->
            <!--End Navbar Dropdown-->

        </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->

        <?= $content; ?>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->

        <!--ASIDE-->
        <!--===================================================-->
        <aside id="aside-container">
            <div id="aside">
                <div class="nano">
                    <div class="nano-content">

                        <!--Nav tabs-->
                        <!--================================-->
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#demo-asd-tab-1" data-toggle="tab">
                                    <i class="demo-pli-speech-bubble-7"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#demo-asd-tab-2" data-toggle="tab">
                                    <i class="demo-pli-information icon-fw"></i> Report
                                </a>
                            </li>
                            <li>
                                <a href="#demo-asd-tab-3" data-toggle="tab">
                                    <i class="demo-pli-wrench icon-fw"></i> Settings
                                </a>
                            </li>
                        </ul>
                        <!--================================-->
                        <!--End nav tabs-->


                        <!-- Tabs Content -->
                        <!--================================-->
                        <div class="tab-content">

                            <!--First tab (Contact list)-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div class="tab-pane fade in active" id="demo-asd-tab-1">
                                <p class="pad-hor mar-top text-semibold text-main">
                                    <span class="pull-right badge badge-warning">3</span> Family
                                </p>

                                <!--Family-->
                                <div class="list-group bg-trans">
                                    <a href="#" class="list-group-item">
                                        <div class="media-left pos-rel">
                                            <img class="img-circle img-xs"
                                                 src="<?= UrlService::buildImgUrl('common/profile-photos/2.png') ?>"
                                                 alt="Profile Picture">
                                            <i class="badge badge-success badge-stat badge-icon pull-left"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Stephen Tran</p>
                                            <small class="text-muted">Availabe</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="media-left pos-rel">
                                            <img class="img-circle img-xs"
                                                 src="<?= UrlService::buildImgUrl('common/profile-photos/7.png') ?>"
                                                 alt="Profile Picture">
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Brittany Meyer</p>
                                            <small class="text-muted">I think so</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="media-left pos-rel">
                                            <img class="img-circle img-xs"
                                                 src="<?= UrlService::buildImgUrl('common/profile-photos/1.png') ?>"
                                                 alt="Profile Picture">
                                            <i class="badge badge-info badge-stat badge-icon pull-left"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Jack George</p>
                                            <small class="text-muted">Last Seen 2 hours ago</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="media-left pos-rel">
                                            <img class="img-circle img-xs"
                                                 src="<?= UrlService::buildImgUrl('common/profile-photos/4.png') ?>"
                                                 alt="Profile Picture">
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Donald Brown</p>
                                            <small class="text-muted">Lorem ipsum dolor sit amet.</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="media-left pos-rel">
                                            <img class="img-circle img-xs"
                                                 src="<?= UrlService::buildImgUrl('common/profile-photos/8.png') ?>"
                                                 alt="Profile Picture">
                                            <i class="badge badge-warning badge-stat badge-icon pull-left"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Betty Murphy</p>
                                            <small class="text-muted">Idle</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="media-left pos-rel">
                                            <img class="img-circle img-xs"
                                                 src="<?= UrlService::buildImgUrl('common/profile-photos/9.png') ?>"
                                                 alt="Profile Picture">
                                            <i class="badge badge-danger badge-stat badge-icon pull-left"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Samantha Reid</p>
                                            <small class="text-muted">Offline</small>
                                        </div>
                                    </a>
                                </div>

                                <hr>
                                <p class="pad-hor text-semibold text-main">
                                    <span class="pull-right badge badge-success">Offline</span> Friends
                                </p>

                                <!--Works-->
                                <div class="list-group bg-trans">
                                    <a href="#" class="list-group-item">
                                        <span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K.
                                        Greyson
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea
                                        Branden
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny
                                        Juan
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
                                    </a>
                                </div>


                                <hr>
                                <p class="pad-hor mar-top text-semibold text-main">News</p>

                                <div class="pad-hor">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetuer
                                        <a data-title="45%" class="add-tooltip text-semibold" href="#">adipiscing
                                            elit</a>, sed diam nonummy nibh. Lorem ipsum dolor sit amet.
                                    </p>
                                    <small class="text-muted"><em>Last Update : Des 12, 2014</em></small>
                                </div>


                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End first tab (Contact list)-->


                            <!--Second tab (Custom layout)-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div class="tab-pane fade" id="demo-asd-tab-2">

                                <!--Monthly billing-->
                                <div class="pad-all">
                                    <p class="text-semibold text-main">Billing &amp; reports</p>
                                    <p class="text-muted">Get <strong>$5.00</strong> off your next bill by making sure
                                        your full payment reaches us before August 5, 2016.</p>
                                </div>
                                <hr class="new-section-xs">
                                <div class="pad-all">
                                    <span class="text-semibold text-main">Amount Due On</span>
                                    <p class="text-muted text-sm">August 17, 2016</p>
                                    <p class="text-2x text-thin text-main">$83.09</p>
                                    <button class="btn btn-block btn-success mar-top">Pay Now</button>
                                </div>


                                <hr>

                                <p class="pad-hor text-semibold text-main">Additional Actions</p>

                                <!--Simple Menu-->
                                <div class="list-group bg-trans">
                                    <a href="#" class="list-group-item"><i
                                                class="demo-pli-information icon-lg icon-fw"></i> Service
                                        Information</a>
                                    <a href="#" class="list-group-item"><i class="demo-pli-mine icon-lg icon-fw"></i>
                                        Usage Profile</a>
                                    <a href="#" class="list-group-item"><span
                                                class="label label-info pull-right">New</span><i
                                                class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                                    <a href="#" class="list-group-item"><i class="demo-pli-support icon-lg icon-fw"></i>
                                        Message Center</a>
                                </div>


                                <hr>

                                <div class="text-center">
                                    <div><i class="demo-pli-old-telephone icon-3x"></i></div>
                                    Questions?
                                    <p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
                                    <small><em>We are here 24/7</em></small>
                                </div>
                            </div>
                            <!--End second tab (Custom layout)-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                            <!--Third tab (Settings)-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <div class="tab-pane fade" id="demo-asd-tab-3">
                                <ul class="list-group bg-trans">
                                    <li class="pad-top list-header">
                                        <p class="text-semibold text-main mar-no">Account Settings</p>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input class="toggle-switch" id="demo-switch-1" type="checkbox" checked>
                                            <label for="demo-switch-1"></label>
                                        </div>
                                        <p class="mar-no">Show my personal status</p>
                                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit.
                                        </small>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input class="toggle-switch" id="demo-switch-2" type="checkbox" checked>
                                            <label for="demo-switch-2"></label>
                                        </div>
                                        <p class="mar-no">Show offline contact</p>
                                        <small class="text-muted">Aenean commodo ligula eget dolor. Aenean massa.
                                        </small>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input class="toggle-switch" id="demo-switch-3" type="checkbox">
                                            <label for="demo-switch-3"></label>
                                        </div>
                                        <p class="mar-no">Invisible mode </p>
                                        <small class="text-muted">Cum sociis natoque penatibus et magnis dis parturient
                                            montes, nascetur ridiculus mus.
                                        </small>
                                    </li>
                                </ul>


                                <hr>

                                <ul class="list-group pad-btm bg-trans">
                                    <li class="list-header"><p class="text-semibold text-main mar-no">Public
                                            Settings</p></li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input class="toggle-switch" id="demo-switch-4" type="checkbox" checked>
                                            <label for="demo-switch-4"></label>
                                        </div>
                                        Online status
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input class="toggle-switch" id="demo-switch-5" type="checkbox" checked>
                                            <label for="demo-switch-5"></label>
                                        </div>
                                        Show offline contact
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input class="toggle-switch" id="demo-switch-6" type="checkbox" checked>
                                            <label for="demo-switch-6"></label>
                                        </div>
                                        Show my device icon
                                    </li>
                                </ul>


                                <hr>

                                <p class="pad-hor text-semibold text-main mar-no">Task Progress</p>
                                <div class="pad-all">
                                    <p>Upgrade Progress</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-success" style="width: 15%;"><span
                                                    class="sr-only">15%</span></div>
                                    </div>
                                    <small class="text-muted">15% Completed</small>
                                </div>
                                <div class="pad-hor">
                                    <p>Database</p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-danger" style="width: 75%;"><span
                                                    class="sr-only">75%</span></div>
                                    </div>
                                    <small class="text-muted">17/23 Database</small>
                                </div>

                            </div>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--Third tab (Settings)-->

                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--===================================================-->
        <!--END ASIDE-->


        <!--MAIN NAVIGATION-->
        <!--===================================================-->
        <nav id="mainnav-container">
            <div id="mainnav">

                <!--Menu-->
                <!--================================-->
                <div id="mainnav-menu-wrap">
                    <div class="nano">
                        <div class="nano-content">

                            <!--Profile Widget-->
                            <!--================================-->
                            <div id="mainnav-profile" class="mainnav-profile">
                                <div class="profile-wrap">
                                    <div class="pad-btm">
                                        <span class="label label-success pull-right">New</span>
                                        <img class="img-circle img-sm img-border"
                                             src="<?= UrlService::buildImgUrl('common/profile-photos/1.png') ?>"
                                             alt="Profile Picture">
                                    </div>
                                    <a href="#profile-nav" class="box-block" data-toggle="collapse"
                                       aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                        <p class="mnp-name">Aaron Chavez</p>
                                        <span class="mnp-desc">aaron.cha@themeon.net</span>
                                    </a>
                                </div>
                                <div id="profile-nav" class="collapse list-group bg-trans">
                                    <a href="#" class="list-group-item">
                                        <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="demo-pli-information icon-lg icon-fw"></i> Help
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                    </a>
                                </div>
                            </div>


                            <!--Shortcut buttons-->
                            <!--================================-->
                            <div id="mainnav-shortcut">
                                <ul class="list-unstyled">
                                    <li class="col-xs-3" data-content="My Profile">
                                        <a class="shortcut-grid" href="#">
                                            <i class="demo-psi-male"></i>
                                        </a>
                                    </li>
                                    <li class="col-xs-3" data-content="Messages">
                                        <a class="shortcut-grid" href="#">
                                            <i class="demo-psi-speech-bubble-3"></i>
                                        </a>
                                    </li>
                                    <li class="col-xs-3" data-content="Activity">
                                        <a class="shortcut-grid" href="#">
                                            <i class="demo-psi-thunder"></i>
                                        </a>
                                    </li>
                                    <li class="col-xs-3" data-content="Lock Screen">
                                        <a class="shortcut-grid" href="#">
                                            <i class="demo-psi-lock-2"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--================================-->
                            <!--End shortcut buttons-->


                            <ul id="mainnav-menu" class="list-group">

                                <!--Category name-->
<!--                                <li class="list-header">Navigation</li>-->

                                <!--Menu list item-->
                                <li class="active-link">
                                    <a href="<?= UrlService::buildWwwUrl('dashboard/index') ?>">
                                        <i class="demo-psi-home"></i>
                                        <span class="menu-title">
												<strong>Dashboard</strong>
											</span>
                                    </a>
                                </li>

                                <!--Menu list item-->
                                <li>
                                    <a href="<?= UrlService::buildNullUrl() ?>">
                                        <i class="demo-pli-checked-user"></i>
                                        <span class="menu-title">
												<strong>账号管理</strong>
											</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="<?= UrlService::buildWwwUrl('account/index') ?>">账号列表</a></li>
                                        <li><a href="<?= UrlService::buildWwwUrl('role/index') ?>">角色列表</a></li>
                                        <li><a href="<?= UrlService::buildWwwUrl('access/index') ?>">权限列表</a></li>
                                    </ul>
                                </li>

                                <!--Menu list item-->
                                <li>
                                    <a href="#">
                                        <i class="demo-psi-receipt-4"></i>
                                        <span class="menu-title">
												<strong>文章管理</strong>
											</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="">文章列表</a></li>
                                        <li><a href="">分类列表</a></li>
                                        <li><a href="">标签列表</a></li>
                                        <li><a href="">评论列表</a></li>
                                    </ul>
                                </li>

                                <!--Menu list item-->
                                <li>
                                    <a href="#">
                                        <i class="ion-person-stalker"></i>
                                        <span class="menu-title">
												<strong>用户管理</strong>
											</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="">用户列表</a></li>
                                        <li><a href="">第三方用户</a></li>
                                    </ul>
                                </li>

                                <!--Menu list item-->
                                <li>
                                    <a href="#">
                                        <i class="fa fa-bar-chart"></i>
                                        <span class="menu-title">
												<strong>统计管理</strong>
											</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="">用户统计</a></li>
                                        <li><a href="">其他统计</a></li>
                                    </ul>
                                </li>

                                <!--Menu list item-->
                                <li>
                                    <a href="#">
                                        <i class="demo-psi-gear-2"></i>
                                        <span class="menu-title">
												<strong>系统管理</strong>
											</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">
                                        <li><a href="">网站设置</a></li>
                                        <li><a href="">优化推广</a></li>
                                        <li><a href="">第三方登陆</a></li>
                                        <li><a href="">友情链接</a></li>
                                        <li><a href="">文章水印</a></li>
                                        <li><a href="">屏蔽词</a></li>
                                    </ul>
                                </li>

                            </ul>


                            <!--Widget-->
                            <!--================================-->
                            <div class="mainnav-widget">

                                <!-- Show the button on collapsed navigation -->
                                <div class="show-small">
                                    <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                        <i class="demo-pli-monitor-2"></i>
                                    </a>
                                </div>

                                <!-- Hide the content on collapsed navigation -->
                                <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                    <ul class="list-group">
                                        <li class="list-header pad-no pad-ver">Server Status</li>
                                        <li class="mar-btm">
                                            <span class="label label-primary pull-right">15%</span>
                                            <p>CPU Usage</p>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                    <span class="sr-only">15%</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mar-btm">
                                            <span class="label label-purple pull-right">75%</span>
                                            <p>Bandwidth</p>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                    <span class="sr-only">75%</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View
                                                Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--================================-->
                            <!--End widget-->

                        </div>
                    </div>
                </div>
                <!--================================-->
                <!--End menu-->

            </div>
        </nav>
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->

    </div>


    <!-- FOOTER -->
    <!--===================================================-->
    <footer id="footer">

        <!-- Visible when footer positions are fixed -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="show-fixed pull-right">
            You have <a href="#" class="text-bold text-main"><span class="label label-danger">3</span> pending
                action.</a>
        </div>


        <!-- Visible when footer positions are static -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="hide-fixed pull-right pad-rgt">
            14GB of <strong>512GB</strong> Free.
        </div>


        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <p class="pad-lft">&#0169; 2016 Your Company</p>


    </footer>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<!-- SETTINGS - DEMO PURPOSE ONLY -->
<!--===================================================-->
<div id="demo-set" class="demo-set">
    <div id="demo-set-body" class="demo-set-body collapse">
        <div id="demo-set-alert"></div>
        <div class="pad-hor bord-btm clearfix">
            <div class="pull-right pad-top">
                <button id="demo-btn-close-settings" class="btn btn-trans">
                    <i class="pci-cross pci-circle icon-lg"></i>
                </button>
            </div>
            <div class="media">
                <div class="media-left">
                    <i class="demo-pli-gear icon-2x"></i>
                </div>
                <div class="media-body">
                    <span class="text-semibold text-lg text-main">Costomize</span>
                    <p class="text-muted text-sm">Customize Nifty's layout, sidebars, and color schemes.</p>
                </div>
            </div>
        </div>
        <div class="demo-set-content clearfix">
            <div class="col-xs-6 col-md-3">
                <div class="pad-all bg-gray-light">
                    <p class="text-semibold text-main text-lg">Layout</p>
                    <p class="text-semibold text-main">Boxed Layout</p>
                    <div class="pad-btm">
                        <div class="pull-right">
                            <input id="demo-box-lay" class="toggle-switch" type="checkbox">
                            <label for="demo-box-lay"></label>
                        </div>
                        Boxed Layout
                    </div>
                    <div class="pad-btm">
                        <div class="pull-right">
                            <button id="demo-box-img" class="btn btn-sm btn-trans" disabled><i class="pci-hor-dots"></i>
                            </button>
                        </div>
                        Background Images <span class="label label-primary">New</span>
                    </div>

                    <hr class="new-section-xs bord-no">
                    <p class="text-semibold text-main">Animations</p>
                    <div class="pad-btm">
                        <div class="pull-right">
                            <input id="demo-anim" class="toggle-switch" type="checkbox" checked>
                            <label for="demo-anim"></label>
                        </div>
                        Enable Animations
                    </div>
                    <div class="pad-btm">
                        <div class="select pull-right">
                            <select id="demo-ease">
                                <option value="effect" selected>ease (Default)</option>
                                <option value="easeInQuart">easeInQuart</option>
                                <option value="easeOutQuart">easeOutQuart</option>
                                <option value="easeInBack">easeInBack</option>
                                <option value="easeOutBack">easeOutBack</option>
                                <option value="easeInOutBack">easeInOutBack</option>
                                <option value="steps">Steps</option>
                                <option value="jumping">Jumping</option>
                                <option value="rubber">Rubber</option>
                            </select>
                        </div>
                        Transitions
                    </div>

                    <hr class="new-section-xs bord-no">

                    <p class="text-semibold text-main text-lg">Header / Navbar</p>
                    <div>
                        <div class="pull-right">
                            <input id="demo-navbar-fixed" class="toggle-switch" type="checkbox">
                            <label for="demo-navbar-fixed"></label>
                        </div>
                        Fixed Position
                    </div>

                    <hr class="new-section-xs bord-no">

                    <p class="text-semibold text-main text-lg">Footer</p>
                    <div class="pad-btm">
                        <div class="pull-right">
                            <input id="demo-footer-fixed" class="toggle-switch" type="checkbox">
                            <label for="demo-footer-fixed"></label>
                        </div>
                        Fixed Position
                    </div>
                </div>
            </div>
            <div class="col-lg-9 pos-rel">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pad-all">
                            <p class="text-semibold text-main text-lg">Sidebars</p>
                            <p class="text-semibold text-main">Navigation</p>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-nav-fixed" class="toggle-switch" type="checkbox">
                                    <label for="demo-nav-fixed"></label>
                                </div>
                                Fixed Position
                            </div>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-nav-profile" class="toggle-switch" type="checkbox" checked>
                                    <label for="demo-nav-profile"></label>
                                </div>
                                Widget Profil
                                <small class="label label-primary">New</small>
                            </div>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-nav-shortcut" class="toggle-switch" type="checkbox" checked>
                                    <label for="demo-nav-shortcut"></label>
                                </div>
                                Shortcut Buttons
                            </div>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-nav-coll" class="toggle-switch" type="checkbox">
                                    <label for="demo-nav-coll"></label>
                                </div>
                                Collapsed Mode
                            </div>

                            <div class="clearfix">
                                <div class="select pad-btm pull-right">
                                    <select id="demo-nav-offcanvas">
                                        <option value="none" selected disabled="disabled">-- Select Mode --</option>
                                        <option value="push">Push</option>
                                        <option value="slide">Slide in on top</option>
                                        <option value="reveal">Reveal</option>
                                    </select>
                                </div>
                                Off-Canvas
                            </div>

                            <p class="text-semibold text-main">Aside</p>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-asd-vis" class="toggle-switch" type="checkbox">
                                    <label for="demo-asd-vis"></label>
                                </div>
                                Visible
                            </div>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-asd-fixed" class="toggle-switch" type="checkbox" checked>
                                    <label for="demo-asd-fixed"></label>
                                </div>
                                Fixed Position
                            </div>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-asd-float" class="toggle-switch" type="checkbox" checked>
                                    <label for="demo-asd-float"></label>
                                </div>
                                Floating <span class="label label-primary">New</span>
                            </div>
                            <div class="mar-btm">
                                <div class="pull-right">
                                    <input id="demo-asd-align" class="toggle-switch" type="checkbox">
                                    <label for="demo-asd-align"></label>
                                </div>
                                Left Side
                            </div>
                            <div>
                                <div class="pull-right">
                                    <input id="demo-asd-themes" class="toggle-switch" type="checkbox">
                                    <label for="demo-asd-themes"></label>
                                </div>
                                Dark Version
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div id="demo-theme">
                            <div class="row bg-gray-light pad-top">
                                <p class="text-semibold text-main text-lg pad-lft">Color Schemes</p>
                                <div class="demo-theme-btn col-md-4 pad-ver">
                                    <p class="text-semibold text-main">Header</p>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-a-light add-tooltip" data-theme="theme-light"
                                           data-type="a" data-title="(A). Light">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-navy add-tooltip" data-theme="theme-navy"
                                           data-type="a" data-title="(A). Navy Blue">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-ocean add-tooltip" data-theme="theme-ocean"
                                           data-type="a" data-title="(A). Ocean">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-a-lime add-tooltip" data-theme="theme-lime"
                                           data-type="a" data-title="(A). Lime">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-purple add-tooltip"
                                           data-theme="theme-purple" data-type="a" data-title="(A). Purple">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-dust add-tooltip" data-theme="theme-dust"
                                           data-type="a" data-title="(A). Dust">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-a-mint add-tooltip" data-theme="theme-mint"
                                           data-type="a" data-title="(A). Mint">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-yellow add-tooltip"
                                           data-theme="theme-yellow" data-type="a" data-title="(A). Yellow">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-well-red add-tooltip"
                                           data-theme="theme-well-red" data-type="a" data-title="(A). Well Red">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-a-coffee add-tooltip"
                                           data-theme="theme-coffee" data-type="a" data-title="(A). Coffee">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-prickly-pear add-tooltip"
                                           data-theme="theme-prickly-pear" data-type="a" data-title="(A). Prickly pear">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-a-dark add-tooltip" data-theme="theme-dark"
                                           data-type="a" data-title="(A). Dark">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="demo-theme-btn col-md-4 pad-ver">
                                    <p class="text-semibold text-main">Brand</p>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-b-light add-tooltip" data-theme="theme-light"
                                           data-type="b" data-title="(B). Light">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-navy add-tooltip" data-theme="theme-navy"
                                           data-type="b" data-title="(B). Navy Blue">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-ocean add-tooltip" data-theme="theme-ocean"
                                           data-type="b" data-title="(B). Ocean">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-b-lime add-tooltip" data-theme="theme-lime"
                                           data-type="b" data-title="(B). Lime">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-purple add-tooltip"
                                           data-theme="theme-purple" data-type="b" data-title="(B). Purple">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-dust add-tooltip" data-theme="theme-dust"
                                           data-type="b" data-title="(B). Dust">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-b-mint add-tooltip" data-theme="theme-mint"
                                           data-type="b" data-title="(B). Mint">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-yellow add-tooltip"
                                           data-theme="theme-yellow" data-type="b" data-title="(B). Yellow">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-well-red add-tooltip"
                                           data-theme="theme-well-red" data-type="b" data-title="(B). Well red">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-b-coffee add-tooltip"
                                           data-theme="theme-coffee" data-type="b" data-title="(B). Coofee">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-prickly-pear add-tooltip"
                                           data-theme="theme-prickly-pear" data-type="b" data-title="(B). Prickly pear">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-b-dark add-tooltip" data-theme="theme-dark"
                                           data-type="b" data-title="(B). Dark">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="demo-theme-btn col-md-4 pad-ver">
                                    <p class="text-semibold text-main">Navigation</p>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-c-light add-tooltip" data-theme="theme-light"
                                           data-type="c" data-title="(C). Light">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-navy add-tooltip" data-theme="theme-navy"
                                           data-type="c" data-title="(C). Navy Blue">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-ocean add-tooltip" data-theme="theme-ocean"
                                           data-type="c" data-title="(C). Ocean">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-c-lime add-tooltip" data-theme="theme-lime"
                                           data-type="c" data-title="(C). Lime">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-purple add-tooltip"
                                           data-theme="theme-purple" data-type="c" data-title="(C). Purple">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-dust add-tooltip" data-theme="theme-dust"
                                           data-type="c" data-title="(C). Dust">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-c-mint add-tooltip" data-theme="theme-mint"
                                           data-type="c" data-title="(C). Mint">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-yellow add-tooltip"
                                           data-theme="theme-yellow" data-type="c" data-title="(C). Yellow">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-well-red add-tooltip"
                                           data-theme="theme-well-red" data-type="c" data-title="(C). Well Red">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                    <div class="demo-justify-theme">
                                        <a href="#" class="demo-theme demo-c-coffee add-tooltip"
                                           data-theme="theme-coffee" data-type="c" data-title="(C). Coffee">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-prickly-pear add-tooltip"
                                           data-theme="theme-prickly-pear" data-type="c" data-title="(C). Prickly pear">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                        <a href="#" class="demo-theme demo-c-dark add-tooltip" data-theme="theme-dark"
                                           data-type="c" data-title="(C). Dark">
                                            <div class="demo-theme-brand"></div>
                                            <div class="demo-theme-head"></div>
                                            <div class="demo-theme-nav"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="demo-bg-boxed" class="demo-bg-boxed">
                    <div class="demo-bg-boxed-content">
                        <p class="text-semibold text-main text-lg mar-no">Background Images</p>
                        <p class="text-sm text-muted">Add an image to replace the solid background color</p>
                        <div class="row">
                            <div class="col-lg-4 text-justify">
                                <p class="text-semibold text-main">Blurred</p>
                                <div id="demo-blurred-bg" class="text-justify">
                                    <!--Blurred Backgrounds-->
                                </div>
                            </div>
                            <div class="col-lg-4 text-justify">
                                <p class="text-semibold text-main">Polygon &amp; Geometric</p>
                                <div id="demo-polygon-bg" class="text-justify">
                                    <!--Polygon Backgrounds-->
                                </div>
                            </div>
                            <div class="col-lg-4 text-justify">
                                <p class="text-semibold text-main">Abstract</p>
                                <div id="demo-abstract-bg" class="text-justify">
                                    <!--Abstract Backgrounds-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="demo-bg-boxed-footer">
                        <button id="demo-close-boxed-img" class="btn btn-primary">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="demo-set-btn" class="btn" data-toggle="collapse" data-target="#demo-set-body"><i
                class="demo-psi-gear icon-lg"></i></button>
</div>
<!--===================================================-->
<!-- END SETTINGS -->


</body>
<?php $this->endBody(); ?>
</html>


<?php $this->endPage(); ?>



