<?php

use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;
use app\common\services\ConstantMapService;

StaticService::includeAppJsStatic('/js/admin/account/index.js', AdminAsset::className());

?>
<div id="content-container" class="admin_account_index_ops">

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
                        <h3 class="panel-title">账号列表</h3>
                    </div>

                    <div class="panel-body">

                        <div class="pad-btm form-inline">
                            <div class="row">

                                <!--搜索页面已被封装到统一模板文件中-->
                                <?php echo \Yii::$app->view->renderFile("@app/modules/admin/views/common/search_index.php", [
                                    'status_mapping' => $status_mapping,
                                    'search_conditions' => $search_conditions,
                                    'form_action' => UrlService::buildAdminUrl('/account/index')
                                ]); ?>

                                <div class="col-sm-4 table-toolbar-right">
                                    <a href="<?= UrlService::buildWwwUrl('account/set') ?>" class="btn btn-purple">
                                        <i class="demo-pli-add icon-fw"></i>add
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">login_name</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">mobile</th>
                                    <th class="text-center">email</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($list): ?>
                                    <!---正常数据显示-->
                                    <?php foreach ($list as $_item): ?>
                                        <tr class="text-center">
                                            <td><?= $_item['uid'] ?></td>
                                            <td><?= $_item['login_name'] ?></td>
                                            <td><?= $_item['nickname'] ?></td>
                                            <td><?= $_item['mobile'] ?></td>
                                            <td><?= $_item['email'] ?></td>

                                            <td>
                                                <?= ConstantMapService::$state_mapping[$_item['status']] ?>
                                            </td>

                                            <td>
                                                <a href="<?= UrlService::buildAdminUrl('/account/info', ['uid' => $_item['uid']]) ?>">
                                                    <i class="fa fa-eye fa-lg"></i>
                                                </a>
                                                <a class="m-l"
                                                   href="<?= UrlService::buildAdminUrl('/account/set', ['uid' => $_item['uid']]) ?>">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <?php if ($_item['status']): ?>
                                                    <a class="m-l remove" href="javascript:void(0);"
                                                       data="<?= $_item['uid'] ?>">
                                                        <i class="fa fa-trash fa-lg"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a class="m-l recover" href="javascript:void(0);"
                                                       data="<?= $_item['uid'] ?>">
                                                        <i class="fa fa-rotate-left fa-lg"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!---没有数据显示---->
                                    <tr class="text-center">
                                        <td colspan="6">No matching records found</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!--分页代码已被封装到统一模板文件中-->
                        <?php echo \Yii::$app->view->renderFile("@app/modules/admin/views/common/pagination.php", [
                            'pages' => $pages,
                            'url' => '/account/index'
                        ]); ?>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->


</div>