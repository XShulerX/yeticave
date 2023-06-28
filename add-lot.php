<?php
require_once 'function.php';
require_once 'data.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $required_fields = [
        'lot-name',
        'category',
        'message',
        'lot-rate',
        'lot-step',
        'lot-date'
    ];
    $errors = [] ;
    foreach ($required_fields as $field) {
        if (empty($_POST[$field]))
            $errors[$field] = 'Поле не заполнено';
    }
    if (count($errors))
        $formInvalid='form--invalid';
    else{
        if(!filter_var($_POST['lot-rate'], FILTER_VALIDATE_INT))
            $errors['lot-rate'] = 'Введите корректную цену';
        if(!filter_var($_POST['lot-step'], FILTER_VALIDATE_INT))
            $errors['lot-step'] = 'Введите корректный шаг ставки';
        if (count($errors))
            $formInvalid='form--invalid';
        else{
            if (isset($_FILES['photo']) and !empty($_FILES['photo']['name'])){
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $file_name = $_FILES['photo']['name'];
                $file_path =__DIR__. '/img/';
                $file_tmp_name = $_FILES['photo']['tmp_name'];
                $file_type = finfo_file($finfo, $file_tmp_name);
                if($file_type !== 'image/gif')
                    move_uploaded_file($_FILES['photo']['tmp_name'], $file_path.$file_name);
                $file_url = '/img/'.$file_name;
                $lot = [
                    'title'=>$_POST['lot-name'],
                    'price'=>$_POST['lot-rate'],
                    'photo'=>$file_url,
                    'categories'=>$_POST['category']
                ];
            }
        }
    }
}

if(!isset($lot))
    $addLotContent = renderTemplate('templates/add-lotTemplate.php',[
        'formInvalid'=>$formInvalid ?? '',
        'errors'=>$errors
    ]);
else
    $addLotContent = renderTemplate('templates/lotTemplate.php',[
        'lot'=>$lot
    ]);
if(!isset($_SESSION['user']))
    $addLotContent = renderTemplate('templates/add-lotErrorAccess.php');

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $addLotContent,
    'categories' => $categories
]);
print ($layoutContent);