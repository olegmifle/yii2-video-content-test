<?php

/**
 * @var yii\web\View $this
 * @var \yii\data\Pagination $pagination
 * @var \yii\data\Sort $sort
 * @var \app\entity\Video[] $videos
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
        <?php foreach (array_chunk($videos, 4) as $chunkedVideos) { ?>
            <?php foreach ($chunkedVideos as $video) { ?>
                <?= VideoItem::widget(['video' => $video]) ?>
            <?php } ?>

            <div class="w-100"></div>

        <?php } ?>
    </div>

    <?= Paginator::widget(['pagination' => $pagination])?>
</div>
