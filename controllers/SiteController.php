<?php

namespace app\controllers;

use app\dataProvider\VideoDataProvider;
use yii\web\Controller;
use yii\web\ErrorAction;

final class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function actionIndex(): string
    {
        $dataProvider = new VideoDataProvider();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
