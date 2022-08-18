<?php

namespace App\GraphQL\Scalars;

use Illuminate\Support\Carbon;
use Nuwave\Lighthouse\Schema\Types\Scalars\DateTimeTz;

/**
 * Read more about scalars here https://webonyx.github.io/graphql-php/type-definitions/scalars
 */
class DateTimeTzToUtc extends DateTimeTz
{
    protected function parse($value): Carbon
    {
        return parent::parse($value)->timezone('UTC');
    }
}
