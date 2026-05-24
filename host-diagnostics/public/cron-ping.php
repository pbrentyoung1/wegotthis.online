<?php

declare(strict_types=1);

$storageDir = dirname(__DIR__) . '/storage';
$pingFile = $storageDir . '/cron-ping.json';

if (!is_dir($storageDir)) {
    mkdir($storageDir, 0775, true);
}

$payload = [
    'timestamp' => gmdate('c'),
];

file_put_contents($pingFile, json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL, LOCK_EX);

header('Content-Type: text/plain; charset=utf-8');
echo 'OK ' . $payload['timestamp'] . PHP_EOL;
