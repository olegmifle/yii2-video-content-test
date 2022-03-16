<?php

use yii\db\Migration;

class m220315_134402_create_video_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $sql = <<<SQL
CREATE TABLE video (
    uuid uuid NOT NULL PRIMARY KEY,
    title varchar(255) NOT NULL,
    duration int NOT NULL,
    views bigint NOT NULL DEFAULT 0,
    created_at timestamp with time zone NOT NULL DEFAULT NOW()
)
SQL;

        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->execute('DROP TABLE video');
    }
}
