<?php

use app\common\services\UrlService;

?>
<div id="content-container" class="admin_account_set_ops">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_common.php") ?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel">

                    <div class="panel-heading">
                        <h3 class="panel-title">详细信息</h3>
                    </div>

                    <form action="" class="form-horizontal">
                        <div class="panel-body">

                            <div class="form-group">
                                <div class="col-lg-2 text-center">
                                    <img class="img-circle circle-border"
                                         src="<?=UrlService::buildImgUrl('/common/profile-photos/default.png')?>"
                                         width="100px" height="100px">
                                </div>
                                <div class="col-lg-3 text-center">
                                    <p class="m-t">账号：<?=$info['login_name']?></p>
                                    <p class="m-t">姓名：<?=$info['nickname']?></p>
                                    <p>手机：<?=$info['mobile']?></p>
                                    <p>邮箱：<?=$info['email']?></p>
                                </div>
                            </div>

                            <div class="form-group"></div>
                            <div class="form-group">
                                <div class="panel">

                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#demo-tabs-box-1" data-toggle="tab"
                                                                      aria-expanded="true">First Tab</a></li>
                                                <li class=""><a href="#demo-tabs-box-2" data-toggle="tab"
                                                                aria-expanded="false">Second Tab</a></li>
                                            </ul>
                                        </div>
                                        <h3 class="panel-title">日志</h3>
                                    </div>

                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <div class="tab-content">

                                            <div class="tab-pane fade active in" id="demo-tabs-box-1">

                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Invoice</th>
                                                        <th>User</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><a href="#fakelink" class="btn-link">Order #53456</a>
                                                        </td>
                                                        <td>Michael Bunr</td>
                                                        <td>$249.99</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="tab-pane fade" id="demo-tabs-box-2">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Invoice</th>
                                                        <th>User</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><a href="#fakelink" class="btn-link">Order #53456</a>
                                                        </td>
                                                        <td>Michael Bunr</td>
                                                        <td>$249.99</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->


</div>
