<?php

namespace App\Logs;

use App\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class DatabaseLogger extends AbstractProcessingHandler
{
    protected function write(LogRecord $record): void
    {
        $userId = auth()->check() ? auth()->id() : null;

        $mergedContext = array_merge([
            'user_id' => $userId
        ], $record->context);

        $mergedExtra = array_merge([
            //
        ], $record->extra);

        $log = new Log([
            'user_id' => $userId,
            'level' => $record->level->value,
            'message' => $record->message,
            'context' => $mergedContext,
            'extra' => $mergedExtra
        ]);

        $log->save();
    }
}
