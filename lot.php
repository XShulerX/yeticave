<?php
require_once 'function.php';
require_once 'data.php';

session_start();

$name = "visitedLots";
$visitedLots = [];
$expire = strtotime("today + 1 day");
$path = "/";
if (isset($_GET['id'])){
    if(isset($_COOKIE['visitedLots']))
        $visitedLots=json_decode($_COOKIE['visitedLots']);
    array_push($visitedLots, $_GET['id']);
    $visitedLots=array_unique($visitedLots);
}

$strValue=json_encode($visitedLots);
setcookie($name, $strValue, $expire, $path);

$currentLot=NULL;

if (isset($_GET['id'])){
    foreach ($lots as $lot){
        if (intval($lot['id']) === intval($_GET['id']))
        {
            $currentLot=$lot;
            break;
        }
    }
}

if (!$currentLot){
    http_response_code(404);
    $lotContent = renderTemplate('templates/pageError.php',[]);
}else{
    $lotContent = renderTemplate('templates/lotTemplate.php',[
        'lot'=>$currentLot
    ]);
}

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $lotContent,
    'categories' => $categories
]);
print  ($layoutContent);