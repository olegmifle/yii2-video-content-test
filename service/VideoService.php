<?php

declare(strict_types=1);

namespace app\service;

use app\factory\VideoFactory;
use app\repository\VideoRepositoryInterface;

final class VideoService
{
    private VideoRepositoryInterface $videoRepository;
    private VideoFactory $videoFactory;

    public function __construct(VideoRepositoryInterface $videoRepository, VideoFactory $videoFactory)
    {
        $this->videoRepository = $videoRepository;
        $this->videoFactory = $videoFactory;
    }

    public function getSortedVideos(string $sortField, string $sortOrder, int $limit, int $offset): array
    {
        $sortedVideos = $this->videoRepository->getSortedVideos($sortField, $sortOrder, $limit, $offset);

        $result = [];
        foreach ($sortedVideos as $video) {
            $result[] = $this->videoFactory->create(
                $video['title'],
                (int) $video['duration'],
                (int) $video['views'],
                $video['created_at']
            );
        }

        return $result;
    }

    public function getCount(): int
    {
        return $this->videoRepository->getCount();
    }
}
