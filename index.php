<?php
require_once 'function.php';
require_once 'data.php';

session_start();

$indexContent = renderTemplate('templates/main.php',[
    'lots' => $lots,
    'categories' => $categories
]);

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $indexContent,
    'categories' => $categories,
    'class' => 'container'
]);
print  ($layoutContent);