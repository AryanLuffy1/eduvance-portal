<?php

// Vercel serverless function entry point for Laravel
// This file forwards all requests to the Laravel public/index.php

// Set the working directory to the project root
chdir(__DIR__ . '/..');

// Ensure storage directories exist (Vercel has ephemeral /tmp)
$storageDirs = [
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Create SQLite database in /tmp if it doesn't exist
$dbPath = '/tmp/database.sqlite';
if (!file_exists($dbPath)) {
    touch($dbPath);
}

// Set environment overrides for Vercel's ephemeral filesystem
putenv('APP_STORAGE=/tmp/storage');
putenv('DB_DATABASE=' . $dbPath);

// Point Laravel's storage path to /tmp
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['DB_DATABASE'] = $dbPath;
$_SERVER['APP_STORAGE'] = '/tmp/storage';
$_SERVER['DB_DATABASE'] = $dbPath;

// Boot Laravel via public/index.php
require __DIR__ . '/../public/index.php';
