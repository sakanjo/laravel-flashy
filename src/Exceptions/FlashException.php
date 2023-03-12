<?php

namespace Flashy\Exceptions;

use Exception;

class FlashException extends Exception
{
    public function __construct(public string $type, public string|null $body, public array|null $props = null)
    {
    }
}
