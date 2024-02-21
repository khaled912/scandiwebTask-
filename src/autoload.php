<?php
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($key, $value) = explode('=', $line, 2);
        $value = trim($value);
        $value = trim($value, "'\"");
        putenv("$key=$value");
    }
}

function customAutoloader($className) {
    $baseDir = __DIR__ . '/';

    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    $file = $baseDir . $className . '.php';

    if (file_exists($file)) {
        require $file;
    }
}
spl_autoload_register('customAutoloader');