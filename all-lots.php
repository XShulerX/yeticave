<?php
require_once 'function.php';
require_once 'data.php';

session_start();

$allLotsContent = renderTemplate('templates/all-lotsTemplate.php');

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $allLotsContent,
    'categories' => $categories
]);
print  ($layoutContent);