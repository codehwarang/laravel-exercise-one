<?php

namespace App\Logs;

use Monolog\Logger as MonologLogger;

class Logger
{
    public function __invoke(array $config): MonologLogger
    {
        return new MonologLogger('custom', [
            new DatabaseLogger(),
            new FileLogger()
        ]);
    }
}
