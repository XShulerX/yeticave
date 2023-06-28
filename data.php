<?php

$con=mysqli_connect('localhost','root','','yeticave');

$sql='SELECT * FROM Categories';

$result=mysqli_query($con,$sql);

$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
$categories=[];
foreach ($rows as $row){
    $categories[]=$row['Title'];
}

$sql='SELECT Lots.id, Categories.Title as Category, Lots.Title, FirstPrice, Photo
FROM Lots INNER JOIN Categories ON Lots.Category=Categories.id ';

$result=mysqli_query($con,$sql);

$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
$lots=[];
foreach ($rows as $row){
    $lots[]=$row;
}
function timer(){
    $time1= time();
    $time2= strtotime('24:00:00');
    $diff=$time2-$time1;
    return gmdate('H:i:s', $diff);
}

/*$lots=[
1=>
    [   'id'=>1,
        'photo'=>'img/lot-1.jpg',
        'price'=>10999,
        'title'=>'2014 Rossignol District Snowboard',
        'categories'=>$categories[0],
    ],
    [
        'id'=>2,
        'photo'=>'img/lot-2.jpg',
        'price'=>15999,
        'title'=>'DC Ply Mens 2016/2017 Snowboard',
        'categories'=>$categories[0],
    ],
    [
        'id'=>3,
        'photo'=>'img/lot-3.jpg',
        'price'=>8000,
        'title'=>'Крепления Union Contact Pro 2015 года размер L/XL',
        'categories'=>$categories[1],
    ],
    [
        'id'=>4,
        'photo'=>'img/lot-4.jpg',
        'price'=>10999,
        'title'=>'Ботинки для сноуборда DC Mutiny Charocal',
        'categories'=>$categories[2],
    ],
    [
        'id'=>5,
        'photo'=>'img/lot-5.jpg',
        'price'=>10999,
        'title'=>'Куртка для сноуборда DC Mutiny Charocal',
        'categories'=>$categories[3],
    ],
    [
        'id'=>6,
        'photo'=>'img/lot-6.jpg',
        'price'=>5500,
        'title'=>'Маска Oakley Canopy',
        'categories'=>$categories[5],
    ]
];*/