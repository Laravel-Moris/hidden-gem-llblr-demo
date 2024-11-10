<?php

declare(strict_types=1);

namespace App\Pipelines;

use Closure;

class ConvertToUpper
{
    /**
     * Convert the given content to uppercase.
     */
    public function handle(array $content, Closure $next): mixed
    {
        $content = array_map('strtoupper', $content);

        return $next($content);
    }
}
