<?php

declare(strict_types=1);


namespace app\repository;

use yii\db\Connection;
use yii\db\Exception;

final class VideoRepository implements VideoRepositoryInterface
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws Exception
     */
    public function getSortedVideos(string $sortField, string $sortOrder, int $limit, int $offset): array
    {
        $command = $this->connection->createCommand(
            "SELECT * FROM video WHERE uuid IN (SELECT uuid FROM video ORDER BY {$sortField} {$sortOrder} LIMIT :limit OFFSET :offset)",
            [
                ':limit' => $limit,
                ':offset' => $offset,
            ]
        );

        return $command->queryAll();
    }

    /**
     * @throws Exception
     */
    public function getCount(): int
    {
        $command = $this->connection->createCommand(
            'SELECT COUNT(uuid) FROM video',
        );

        return $command->queryOne()['count'] ?? 0;
    }
}
