<?php

declare(strict_types=1);

namespace App\Pipelines;

use Closure;

class TrimStrings
{
    /**
     * Trim the given content.
     */
    public function handle(array $content, Closure $next): mixed
    {
        $content = array_map('trim', $content);

        return $next($content);
    }
}
