<?php
use Shlinkio\Shlink\Core\Action;
use Shlinkio\Shlink\Core\Middleware;

return [

    'routes' => [
        [
            'name' => 'long-url-redirect',
            'path' => '/{shortCode}',
            'middleware' => Action\RedirectAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'short-url-qr-code',
            'path' => '/qr/{shortCode}[/{size:[0-9]+}]',
            'middleware' => [
                Middleware\QrCodeCacheMiddleware::class,
                Action\QrCodeAction::class,
            ],
            'allowed_methods' => ['GET'],
        ],
    ],

];