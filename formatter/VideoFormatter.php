<?php

declare(strict_types=1);

namespace app\formatter;

use DateTimeImmutable;
use yii\i18n\Formatter;

final class VideoFormatter extends Formatter
{
    public function asVideoDuration(int $durationBySeconds): string
    {
        $dateTime = new DateTimeImmutable();
        $dateTimeWithDuration = (new DateTimeImmutable())->modify(sprintf('+ %d seconds', $durationBySeconds));

        $diff = $dateTimeWithDuration->diff($dateTime);
        if ($diff->h > 1) {
          return sprintf('%dh %02d:%02d', $diff->h, $diff->i, $diff->s);
        }

        return sprintf('%02d:%02d', $diff->i, $diff->s);
    }
}
