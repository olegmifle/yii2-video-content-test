<?php

declare(strict_types=1);

namespace app\widgets;

use app\entity\Video;
use Yii;
use yii\base\Widget;

final class VideoItem extends Widget
{
    public Video $video;

    public function run(): string
    {
        $formatter = Yii::$app->formatter;

        return $this->render('video', [
            'video' => $this->video,
            'formatter' => $formatter,
        ]);
    }
}
