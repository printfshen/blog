<?php

use app\common\services\UrlService;
use app\common\services\StaticService;
use app\assets\AdminAsset;

StaticService::includeAppJsStatic("/js/admin/water/index.js", AdminAsset::className());
$info = [];
?>
<div id="content-container" class="admin_water_index_ops" xmlns="http://www.w3.org/1999/html">

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

                    <div class="panel-body form-horizontal">

                        <div class="form-group">
                            <label class="col-md-3 control-label">水印类型：</label>
                            <div class="col-md-9">
                                <div class="radio">
                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterType" value="0">关闭水印
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterType" value="1">文字水印
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterType" value="2">图片水印
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterType" value="3">文字+图片水印
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <p class="bord-btm pad-ver text-main text-bold col-md-offset-3">文字设置</p>

                        <div class="form-group">
                            <label class="col-md-3 control-label">文字水印：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">水印字体：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">字号：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">文字颜色：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">文字倾斜程度：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">文字位置：</label>
                            <div class="col-md-9">
                                <div class="radio">
                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="1">#1
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="2">#2
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="3">#3
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="4">#4
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="5">#5
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="6">#6
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="7">#7
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="8">#8
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="9">#9
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <p class="bord-btm pad-ver text-main text-bold col-md-offset-3">图片设置</p>

                        <div class="form-group">
                            <label class="col-md-3 control-label">水印图片路径：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">图片位置：</label>
                            <div class="col-md-9">
                                <div class="radio">
                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="1">#1
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="2">#2
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="3">#3
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="4">#4
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="5">#5
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="6">#6
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="7">#7
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="8">#8
                                    </label>

                                    <label class="form-radio form-icon">
                                        <input type="radio" name="waterPos" value="9">#9
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">透明度：</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" placeholder="title"
                                       value="">
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-mint save" type="submit">save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--===================================================-->
    <!--End page content-->
</div>
<iframe name="upload_file" class="hide"></iframe>
