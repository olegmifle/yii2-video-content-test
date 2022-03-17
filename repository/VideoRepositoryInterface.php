<?php

declare(strict_types=1);

namespace app\repository;

interface VideoRepositoryInterface
{
    public function getSortedVideos(string $sortField, string $sortOrder, int $limit, int $offset): array;

    public function getCount(): int;
}
