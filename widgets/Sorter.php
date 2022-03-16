<?php

declare(strict_types=1);

namespace app\widgets;

use Exception;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\bootstrap4\ButtonDropdown;
use yii\data\Sort;
use yii\helpers\Html;

final class Sorter extends Widget
{
    public Sort $sort;

    /**
     * @throws InvalidConfigException
     */
    public function run(): string
    {
        return Html::tag(
            'div',
            $this->getSortDropDown()
        );
    }

    /**
     * @throws InvalidConfigException
     * @throws Exception
     */
    private function getSortDropDown(): string
    {
        $attributes = array_keys($this->sort->attributes);

        $links = [];
        foreach ($attributes as $name) {
            $links[] = Html::a($this->sort->link($name, [
                'class' => 'dropdown-item',
            ]));
        }

        return ButtonDropdown::widget([
            'label' => 'Sort',
            'dropdown' => [
                'items' => $links
            ],
        ]);
    }

}
