<?php

declare(strict_types=1);

namespace Imi\Enum\Test;

use Imi\App;
use Imi\Cli\CliApp;
use Imi\Event\Event;
use Imi\Event\EventParam;
use PHPUnit\Runner\Extension\Extension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

class PHPUnitHook implements Extension
{
    public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void
    {
        Event::on('IMI.APP_RUN', static function (EventParam $param): void {
            $param->stopPropagation();
        }, 1);
        try
        {
            App::run('Imi\Enum\Test', CliApp::class, static function (): void {
            });
        }
        catch (\Throwable $th)
        {
            var_dump((string) $th); // 方便错误调试查看
            throw $th;
        }
    }
}
