<?php

declare(strict_types=1);

namespace App\Pipelines;

use Closure;

class FilterEmpty
{
    /**
     * Filter the given content.
     */
    public function handle(array $content, Closure $next): mixed
    {
        $content = array_filter($content, function ($value) {
            return ! empty($value);
        });

        return $next($content);
    }
}
