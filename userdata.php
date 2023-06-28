<?php

// пользователи для аутентификации
$con=mysqli_connect('localhost','root','','yeticave');

$sql='SELECT * FROM Accounts';

$result=mysqli_query($con,$sql);

$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
$users=[];
foreach ($rows as $row){
    $users[]=$row;
}
