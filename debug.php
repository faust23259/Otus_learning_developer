<?php

$logFile = __DIR__ . '/debug.log';

$currentDateTime = date('d-m-Y H:i:s');

$logEntry = "Текущая дата: " . $currentDateTime . PHP_EOL;

file_put_contents($logFile, $logEntry, FILE_APPEND);

echo "дата записана";



