<?php

namespace app\controllers;

use app\service\VideoService;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;
use yii\web\ErrorAction;

final class SiteController extends Controller
{
    private const SORT_FIELD_VIEWS = 'views';
    private const SORT_FIELD_CREATED_AT = 'created_at';

    private VideoService $videoService;

    public function __construct($id, $module, VideoService $videoService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->videoService = $videoService;
    }

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

    /**
     * @throws \yii\di\NotInstantiableException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex(): string
    {
        $sort = $this->getSort();

        $count = $this->videoService->getCount();
        $pagination = $this->getPagination($count);

        $field = key($sort->getOrders());
        $direction = $sort->getOrders()[$field] === SORT_ASC ? 'asc' : 'desc';

        $videos = $this->videoService->getSortedVideos(
            $field,
            $direction,
            $pagination->getLimit(),
            $pagination->getOffset()
        );

        return $this->render('index', [
            'chancedVideos' => array_chunk($videos, 4),
            'pagination' => $pagination,
            'sort' => $sort,
        ]);
    }

    private function getSort(): Sort
    {
        return new Sort([
            'defaultOrder' => [
                self::SORT_FIELD_CREATED_AT => SORT_DESC
            ],
            'attributes' => [
                self::SORT_FIELD_VIEWS => [
                    'asc' => [self::SORT_FIELD_VIEWS => SORT_ASC],
                    'desc' => [self::SORT_FIELD_VIEWS => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'Views',
                ],
                self::SORT_FIELD_CREATED_AT => [
                    'asc' => [self::SORT_FIELD_CREATED_AT => SORT_ASC],
                    'desc' => [self::SORT_FIELD_CREATED_AT => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'Date Add',
                ],
            ]
        ]);
    }

    private function getPagination(int $count): Pagination
    {
        return new Pagination(['totalCount' => $count]);
    }
}
