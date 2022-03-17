<?php

/**
 * @var yii\web\View $this
 * @var \yii\data\Pagination $pagination
 * @var \yii\data\Sort $sort
 * @var array $chancedVideos
 */

use app\widgets\Paginator;
use app\widgets\Sorter;
use app\widgets\VideoItem;

$this->title = 'Video hosting test task';
?>
<div class="site-index">
    <h1>Videos Hosing</h1>

    <?= Sorter::widget(['sort' => $sort])?>

    <div class="row">
        <?php foreach ($chancedVideos as $videos) { ?>
            <?php foreach ($videos as $video) { ?>
                <?= VideoItem::widget(['video' => $video]) ?>
            <?php } ?>

            <div class="w-100"></div>

        <?php } ?>
    </div>

    <?= Paginator::widget(['pagination' => $pagination])?>
</div>
