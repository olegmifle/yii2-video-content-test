<?php

use yii\db\Migration;

/**
 * Class m220316_091934_add_indexes_on_video
 */
class m220316_091934_add_indexes_on_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->execute('CREATE INDEX video_views_idx ON video(views)');
        $this->execute('CREATE INDEX video_created_at_idx ON video(created_at)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->execute('DROP INDEX video_created_at_idx');
        $this->execute('DROP INDEX video_views_idx');
    }
}
