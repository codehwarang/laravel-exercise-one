<?php

namespace App\Logs;

use Illuminate\Support\Facades\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class FileLogger extends AbstractProcessingHandler
{
    protected function write(LogRecord $record): void
    {
        Log::channel('single')->{$record->level->name}(
            $record->message,
            $record->context,
            $record->extra
        );
    }
}
