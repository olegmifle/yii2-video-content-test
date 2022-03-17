<?php

declare(strict_types=1);

namespace app\factory;

use app\entity\Video;

final class VideoFactory
{
    public function create(string $title, int $duration, int $views, string $createdAt): Video
    {
        return new Video($title, $duration, $views, $createdAt);
    }
}
