<?php

declare(strict_types=1);

namespace app\factory;

use app\entity\Video;

final class VideoFactory
{
    public function createFromArray(array $video): Video
    {
        return new Video($video['title'],
            (int) $video['duration'],
            (int) $video['views'],
            $video['created_at']
        );
    }
}
