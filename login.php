<?php
require_once 'function.php';
require_once 'data.php';
require_once 'userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $required_fields = [
        'email',
        'password'
    ];
    $errors = [] ;
    foreach ($required_fields as $field) {
        if (empty($_POST[$field]))
            $errors[$field] = 'Поле не заполнено';
    } if (count($errors))
        $formInvalid='form--invalid';
    else{
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Введите корректно почту';
        }if (count($errors))
            $formInvalid='form--invalid';
        else{
            $currentUser=[];
            foreach ($users as $user){
                if ($_POST['email']===$user['Email']){
                    $currentUser=$user;
                    break;
                }
            }
            if (password_verify($_POST['password'],$currentUser['Password'])){
                session_start();
                $_SESSION['user']['name']=$currentUser['Name'];
                $_SESSION['user']['photo']=$currentUser['Avatar'];
                header('Location:/index.php');
            }
        }
    }

}

$loginContent = renderTemplate('templates/loginTemplate.php',[
    'formInvalid'=>$formInvalid ?? '',
    'errors'=>$errors
]);

$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $loginContent,
    'categories' => $categories
]);
print  ($layoutContent);