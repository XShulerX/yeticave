<?php
require_once 'function.php';
require_once 'data.php';

session_start();

$searchContent = renderTemplate('templates/searchTemplate.php');

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $searchContent,
    'categories' => $categories
]);
print  ($layoutContent);