<?php
require_once 'function.php';
require_once 'data.php';

session_start();

$infoLots=[];

if(isset($_COOKIE['visitedLots'])){
    $visitedLots=json_decode($_COOKIE['visitedLots']);
    foreach ($lots as $lot){
        if(in_array($lot['id'], $visitedLots)){
            $infoLots[]=$lot;
        }
    }
}

if(count($infoLots))
    $historyContent = renderTemplate('templates/historyTemplate.php',[
        'lots'=>$infoLots
    ]);
else
    $historyContent = renderTemplate('templates/historyErrorTemplate.php');

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $historyContent,
    'categories' => $categories
]);
print  ($layoutContent);