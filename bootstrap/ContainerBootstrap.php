<?php

declare(strict_types=1);

namespace app\bootstrap;

use app\repository\VideoRepository;
use app\repository\VideoRepositoryInterface;
use Yii;
use yii\base\BootstrapInterface;

final class ContainerBootstrap implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = Yii::$container;
        $container->setSingleton(
            VideoRepositoryInterface::class,
            static fn() => new VideoRepository(Yii::$app->getDb())
        );
    }
}
