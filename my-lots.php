<?php
require_once 'function.php';
require_once 'data.php';

session_start();

$myLotsContent = renderTemplate('templates/my-lotsTemplate.php');

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $myLotsContent,
    'categories' => $categories
]);
print  ($layoutContent);