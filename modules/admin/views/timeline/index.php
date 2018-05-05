<?php

use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;
use app\common\services\ConstantMapService;

StaticService::includeAppJsStatic("/js/admin/timeline/index.js", AdminAsset::className());
?>
<div id="content-container" class="admin_timeline_index_ops">

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
                        <h3 class="panel-title">Timeline</h3>
                    </div>
                    <div class="panel-body">

                        <div class="pad-btm form-inline">
                            <div class="row">
                                <form action="" method="post" id="index_search_form">
                                    <div class="col-sm-8 table-toolbar-left">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <select name="status" class="form-control inline">
                                                    <?php foreach ($status_mapping as $_status => $_title): ?>
                                                        <option <?= $_status == $search_conditions['status'] ? 'selected' : ''; ?>
                                                                value="<?= $_status ?>"><?= $_title ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="mix_kw" placeholder="请输入内容"
                                                           class="form-control"
                                                           value="<?= $search_conditions['mix_ky'] ?>">
                                                    <input type="hidden" name="p"
                                                           value="<?= $search_conditions['p'] ?>">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-primary search">
                                                        <i class="fa fa-search"></i>Search
                                                    </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="col-sm-4 table-toolbar-right">
                                    <a href="<?= UrlService::buildWwwUrl('timeline/set') ?>" class="btn btn-purple">
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
                                    <th class="text-center">title</th>
                                    <th class="text-center">content</th>
                                    <th class="text-center">icon</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">date</th>
                                    <th class="text-center">operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($list): ?>
                                    <!---正常数据显示-->
                                    <?php foreach ($list as $_item): ?>
                                        <tr class="text-center">
                                            <td><?= $_item['id'] ?></td>
                                            <td><?= $_item['title'] ?></td>
                                            <td><?= $_item['content'] ?></td>
                                            <th class="text-center"><?= $_item['icon'] ?></th>
                                            <td>
                                                <?= ConstantMapService::$state_mapping[$_item['status']] ?>
                                            </td>
                                            <td><?= date("Y-m-d H:i:s", $_item['date']) ?></td>
                                            <td>
                                                <a class="m-l"
                                                   href="<?= UrlService::buildAdminUrl('/timeline/set', ['id' => $_item['id']]) ?>">
                                                    <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <?php if ($_item['status']): ?>
                                                    <a class="m-l remove" href="javascript:void(0);"
                                                       data="<?= $_item['id'] ?>">
                                                        <i class="fa fa-trash fa-lg"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a class="m-l recover" href="javascript:void(0);"
                                                       data="<?= $_item['id'] ?>">
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
                        <?php echo \Yii::$app->view->renderFile("@app/modules/admin/views/common/pagination.php"); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->

</div>