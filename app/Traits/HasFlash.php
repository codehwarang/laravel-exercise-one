<?php

namespace App\Traits;

trait HasFlash
{
    protected function flashMessage(string $message, string $type)
    {
        return [
            'message' => $message,
            'message_type' => $type
        ];
    }
}
