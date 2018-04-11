<?php

?>
<div id="content-container" class="admin_role_set_ops">

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
                        <h3 class="panel-title">编辑</h3>
                    </div>
                    <form action="" class="form-horizontal">

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">name：</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" class="form-control" placeholder="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="">账号：</label>
                                <div class="col-md-9">
                                    <input type="text" id="" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">status：</div>
                                <div class="col-md-9 control-label text-left">
                                    <input id="demo-online-status-checkbox" class="toggle-switch" type="checkbox" checked="">
                                    <label for="demo-online-status-checkbox"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">内容：</div>
                                <div class="col-md-9">
                                    <textarea placeholder="Message" rows="13" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 control-label">权限组：</div>
                                <div class="col-md-9">
                                    <select name="status" class="form-control inline">
                                        <option value="-1">请选择状态</option>
                                        <option value="1">正常</option>
                                        <option value="0">已删除</option>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-mint" type="submit">save</button>
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
