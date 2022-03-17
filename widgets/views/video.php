<?php
/**
 * @var \app\entity\Video $video
 * @var int $index
 * @var \app\formatter\VideoFormatter $formatter
 */

use yii\helpers\Html;
?>

<div class="col mb-4">
    <div class="card">
        <img src="https://picsum.photos/400/400" alt="<?= Html::encode($video->getTitle())?>" class="card-img-top">

        <div class="card-body">
            <h5 class="card-title"><?= Html::encode($video->getTitle())?></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Duration: <i></i><?= $formatter->asVideoDuration($video->getDuration()) ?></i></li>
            <li class="list-group-item">Views: <i><?= $video->getViews() ?></i></li>
            <li class="list-group-item">Add at: <i><?= $formatter->asDate($video->getCreatedAt()) ?></i></li>
        </ul>
    </div>
</div>

