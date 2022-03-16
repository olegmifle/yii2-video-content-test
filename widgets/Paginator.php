<?php

namespace app\widgets;

use yii\widgets\LinkPager;

final class Paginator extends LinkPager
{
    public static function widget($config = []): string
    {
        return parent::widget(
            array_merge($config, self::getBaseConfig())
        );
    }

    private static function getBaseConfig(): array
    {
        return [
            'maxButtonCount' => 5,
            'firstPageLabel' => 'First',
            'lastPageLabel'  => 'Last',
            'pageCssClass' => 'page-item',
            'nextPageCssClass' => 'page-item',
            'prevPageCssClass' => 'page-item',
            'firstPageCssClass' => 'page-item',
            'lastPageCssClass' => 'page-item',
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
            'linkOptions' => ['class' => 'page-link'],
        ];
    }
}
