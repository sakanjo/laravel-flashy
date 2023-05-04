<?php

use Flashy\Exceptions\FlashException;

define('SUCCESS_FLASH', 'success');
define('ERROR_FLASH', 'error');

function Flash(string $type, string|null $message = null, array $props = null): void
{
    throw new FlashException($type, $message, $props);
}

function Success(string|null $message = null, array $props = null): void
{
    throw new FlashException(SUCCESS_FLASH, $message, $props);
}
function Error(string|null $message = null, array $props = null): void
{
    throw new FlashException(ERROR_FLASH, $message, $props);
}

function Success_if(bool $cond, string|null $message = null, array $props = null): void
{
    $cond && Success($message, $props);
}
function Error_if(bool $cond, string|null $message = null, array $props = null): void
{
    $cond && Error($message, $props);
}
