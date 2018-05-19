<?php

use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;

StaticService::includeAppJsStatic("/js/admin/article/index.js", AdminAsset::className());

?>
<div id="content-container" class="admin_access_index_ops">

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
                        <h3 class="panel-title">说明</h3>
                    </div>

                    <div class="panel-body">

                        <div class="pad-btm form-inline">

                            <div class="row">

                                <!--搜索页面已被封装到统一模板文件中-->
                                <?php echo \Yii::$app->view->renderFile("@app/modules/admin/views/common/search_index.php", [
                                    'status_mapping' => $status_mapping,
                                    'search_conditions' => $search_conditions,
                                    'form_action' => UrlService::buildAdminUrl('/article/index')
                                ]); ?>

                                <div class="col-sm-4 table-toolbar-right">
                                    <a href="<?= UrlService::buildAdminUrl('/article/set') ?>" class="btn btn-purple">
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
                                    <th class="text-center">name</th>
                                    <th class="text-center">content</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">date</th>
                                    <th class="text-center">operation</th>
                                </tr>
                                </thead>
                                <tbody>

                                <!---正常数据显示-->
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>name</td>
                                    <td>你好</td>
                                    <td>
                                        <div class="label label-table label-success">YES</div>
                                        <div class="label label-table label-danger">NO</div>
                                    </td>
                                    <td>2018-3-19</td>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-eye fa-lg"></i>
                                        </a>
                                        <a class="m-l" href="#">
                                            <i class="fa fa-edit fa-lg"></i>
                                        </a>
                                        <a class="m-l remove" href="javascript:void(0);" data="">
                                            <i class="fa fa-trash fa-lg"></i>
                                        </a>
                                        <a class="m-l recover" href="javascript:void(0);" data="">
                                            <i class="fa fa-rotate-left fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>


                                <!---没有数据显示---->
                                <tr class="text-center">
                                    <td colspan="6">No matching records found</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <!--分页代码已被封装到统一模板文件中-->
                        <?php echo \Yii::$app->view->renderFile("@app/modules/admin/views/common/pagination.php", [
                            'pages' => $pages,
                            'url' => '/article/index'
                        ]); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->


</div>