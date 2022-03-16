<?php

declare(strict_types=1);

namespace app\dataProvider;

use app\models\Video;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\QueryInterface;

final class VideoDataProvider extends ActiveDataProvider
{
    private const DEFAULT_PAGE_SIZE = 20;

    private const SORT_FIELD_VIEWS = 'views';
    private const SORT_FIELD_CREATED_AT = 'created_at';

    public function __construct(array $config = [])
    {
        if (!array_key_exists('sort', $config)) {
            $config['sort'] = $this->getSortConfig();
        }

        if (!array_key_exists('pagination', $config)) {
            $config['pagination'] = $this->getPaginationConfig();
        }

        if (!array_key_exists('query', $config)) {
            $config['query'] = $this->getQuery();
        }

        parent::__construct($config);
    }

    /**
     * @return Video[]
     * @throws InvalidConfigException
     */
    protected function prepareModels(): array
    {
        if (!$this->query instanceof QueryInterface) {
            throw new InvalidConfigException('The "query" property must be an instance of a class that implements the QueryInterface e.g. yii\db\Query or its subclasses.');
        }

        $query = clone $this->query;
        if (($pagination = $this->getPagination()) !== false) {
            $pagination->totalCount = $this->getTotalCount();
            if ($pagination->totalCount === 0) {
                return [];
            }

            $subQuery = Video::find()->select('uuid')
                ->limit($pagination->getLimit())
                ->offset($pagination->getOffset())
            ;

            $query->innerJoin(['videoWithLimit' => $subQuery], '"videoWithLimit".uuid = "video".uuid');
        }

        if (($sort = $this->getSort()) !== false) {
            $query->addOrderBy($sort->getOrders());
        }

        return $query->all($this->db);
    }

    private function getPaginationConfig(): array
    {
        return [
            'pageSize' => self::DEFAULT_PAGE_SIZE,
        ];
    }

    private function getSortConfig(): array
    {
        return [
            'defaultOrder' => [
                'created_at' => SORT_DESC
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
        ];
    }

    private function getQuery(): ActiveQuery
    {
        return Video::find();
    }
}
