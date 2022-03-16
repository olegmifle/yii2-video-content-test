<?php
/**
 * @var \app\models\Video $video
 * @var int $index
 * @var \app\formatter\VideoFormatter $formatter
 */

use yii\helpers\Html;
?>

<div class="col mb-4">
    <div class="card">
        <img src="https://picsum.photos/400/400" alt="<?= Html::encode($video->title)?>" class="card-img-top">

        <div class="card-body">
            <h5 class="card-title"><?= Html::encode($video->title)?></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Duration: <i></i><?= $formatter->asVideoDuration($video->duration) ?></i></li>
            <li class="list-group-item">Views: <i><?= $video->views ?></i></li>
            <li class="list-group-item">Add at: <i><?= $formatter->asDate($video->created_at) ?></i></li>
        </ul>
    </div>
</div>
<? if (($index + 1) % 4 === 0) { ?>
    <div class="w-100"></div>
<? } ?>
