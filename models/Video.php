<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property int $duration
 * @property int $views
 * @property string $created_at
 */
class Video extends ActiveRecord
{
}
