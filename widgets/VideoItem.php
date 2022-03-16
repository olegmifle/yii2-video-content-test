<?php

declare(strict_types=1);

namespace app\widgets;

use app\models\Video;
use Yii;
use yii\base\Widget;

final class VideoItem extends Widget
{
    public Video $video;

    public int $index;

    public function run(): string
    {
        $formatter = Yii::$app->formatter;

        return $this->render('video', [
            'video' => $this->video,
            'index' => $this->index,
            'formatter' => $formatter,
        ]);
    }
}
