<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Initialize Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/views');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/../cache',
    'auto_reload' => true,
    'debug' => true
]);

// Add Debug Extension
$twig->addExtension(new \Twig\Extension\DebugExtension());

return $twig;
