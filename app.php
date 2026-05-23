<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// On Vercel, redirect storage to writable /tmp
if (env('VERCEL') || isset($_ENV['APP_STORAGE'])) {
    $storagePath = $_ENV['APP_STORAGE'] ?? '/tmp/storage';
    $app->useStoragePath($storagePath);
}

return $app;

