<?php

/**
 * @var yii\web\View $this
 * @var ActiveDataProvider $dataProvider
 */

use app\widgets\Paginator;
use app\widgets\Sorter;
use app\widgets\VideoItem;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$this->title = 'Video hosting test task';
?>
<div class="site-index">
    <h1>Videos Hosing</h1>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{sorter}<div class="row">{items}</div>{pager}',
        'itemOptions' => [
            'tag' => false,
        ],
        'itemView' => static fn($model, $key, $index) => VideoItem::widget(['video' => $model, 'index' => $index]),
        'sorter' => [
            'class' => Sorter::class,
        ],
        'pager' => [
            'class' => Paginator::class,
        ]
    ]) ?>
</div>
