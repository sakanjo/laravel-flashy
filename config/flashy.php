<?php

return [
    // Allowed headers to which the flash message is allowed to be sent
    'allowed_headers' => ['X-Inertia', 'X-Axios'],

    // Flash global errors with or without specifying a message
    'flash_codes' => [
        404 => 'Page not found',
        500 => 'Something went wrong',
        419 => null,
    ],
];
