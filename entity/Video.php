<?php

declare(strict_types=1);

namespace app\entity;

final class Video
{
    private string $title;

    private int $duration;

    private int $views;

    private string $createdAt;

    public function __construct(string $title, int $duration, int $views, string $createdAt)
    {
        $this->title = $title;
        $this->duration = $duration;
        $this->views = $views;
        $this->createdAt = $createdAt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getViews(): int
    {
        return $this->views;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
