<?php
/**
 * 公共分页
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/19
 * Time: 23:09
 */
use app\common\services\UrlService;

$up_page = ($pages['p'] - 1) < 1 ? 1 : $pages['p'] - 1;
$down_page = ($pages['p'] + 1) > $pages['total_page'] ? $pages['total_page'] : $pages['p'] + 1;
?>
<hr>
<div class="pull-right">
    <ul class="pagination text-nowrap mar-no">
        <li class="page-pre">
            <a href="<?= UrlService::buildAdminUrl($url, ['p' => $up_page]) ?>">&lt;</a>
        </li>
        <?php for ($_page = 1; $_page <= $pages['total_page']; $_page++): ?>
            <?php if ($_page == $pages['p']): ?>
                <li class="page-number active">
                    <a href="<?= UrlService::buildNullUrl() ?>"><?= $_page; ?></a>
                </li>
            <?php else: ?>
                <li class="page-number">
                    <a href="<?= UrlService::buildAdminUrl($url, ['p' => $_page]) ?>"><?= $_page; ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>

        <!--        <li class="page-number">-->
        <!--            <a href="#">9</a>-->
        <!--        </li>-->
        <li class="page-next">
            <a href="<?= UrlService::buildAdminUrl($url, ['p' => $down_page]) ?>">&gt;</a>
        </li>
    </ul>
</div>
