<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Lottery;
use RuntimeException;

class NoteContentChecker
{
    /**
     * Execute the action.
     */
    public function execute(?string $content = null): string
    {
        return Lottery::odds(100, 100)
            ->loser(fn () => throw new RuntimeException('Something went wrong.'))
            ->winner(fn () => $content)
            ->choose();
    }
}
