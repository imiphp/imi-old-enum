<?php

declare(strict_types=1);

use Imi\Event\Event;

Event::one('IMI.LOAD_CONFIG', function () {
    Event::on('IMI.LOAD_RUNTIME_INFO', \Imi\Enum\Listener\LoadRuntimeListener::class, 19940000);
    Event::on('IMI.BUILD_RUNTIME', \Imi\Enum\Listener\BuildRuntimeListener::class, 19940000);
});
