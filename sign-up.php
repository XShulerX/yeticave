<?php
require_once 'function.php';
require_once 'data.php';
require_once 'userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $required_fields = [
        'email',
        'password',
        'message',
        'name'
    ];
    $errors = [];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field]))
            $errors[$field] = 'Поле не заполнено';
    }
    if (!count($errors)) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Введите корректно почту';
        }
        if (count($errors))
            $formInvalid = 'form--invalid';
        else {
            $currentUser = [];
            foreach ($users as $user) {
                if ($_POST['email'] === $user['Email']) {
                    $errors['email'] = 'Email занят другим аккаунтом';
                }
            }
            if (!count($errors)) {
                if (isset($_FILES['photo']) and !empty($_FILES['photo']['name'])) {
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $file_name = $_FILES['photo']['name'];
                    $file_path = __DIR__ . '/img/';
                    $file_tmp_name = $_FILES['photo']['tmp_name'];
                    $file_type = finfo_file($finfo, $file_tmp_name);
                    if ($file_type !== 'image/gif')
                        move_uploaded_file($_FILES['photo']['tmp_name'], $file_path . $file_name);
                    $file_url = '/img/' . $file_name;
                }
                $newUser=[
                  'Email'=>$_POST['email'],
                  'Password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
                  'Name'=>$_POST['name'],
                  'ContactDetails'=>$_POST['message'],
                  'Avatar'=>$file_url = '/img/'.$file_name ?? 'img/user.jpg'
                ];
                $con=mysqli_connect('localhost','root','','yeticave');

                $sql="INSERT INTO Accounts(Email, Password, Name, ContactDetails, Avatar)
                VALUES ('{$newUser["Email"]}', '{$newUser['Password']}', '{$newUser['Name']}','{$newUser['ContactDetails']}','{$newUser['Avatar']}',)";

                $result=mysqli_query($con,$sql);

                header('Location:/index.php');
            }
        }
    }
}
$signUpContent = renderTemplate('templates/sign-upTemplate.php',[
    'errors'=>$errors
]);
$layoutContent = renderTemplate('templates/layout.php',[
    'content' => $signUpContent,
    'categories' => $categories
]);
print  ($layoutContent);