<?php
    include_once 'app/database/database.php';

    $status_Submit = false;
    $error_Message = '';

    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $admin = 1;
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password_confirm = trim($_POST['password_confirm']);

//      $password = password_hash($_POST['password_confirm'],PASSWORD_DEFAULT);

        if($login ===''||$email ===''||$password ===''||$password_confirm===''){
            $error_Message = 'Заполните все поля';
        }else if(strlen($login)<4){
            $error_Message = 'Минимальная длина логина 4 символа';
        }else if(select_One_String('users', ['user_login'=>$login] )){
            $error_Message = 'Пользователь с таким логином уже зарегистрирован';
        }else if(select_One_String('users', ['user_email'=>$email])){
            $error_Message = 'Пользователь с таким email уже зарегистрирован';
        }else if(strlen($password)<6){
            $error_Message = 'Минимальная длина пароля 6 символов';
        }else if($password!==$password_confirm){
            $error_Message = 'Пароли не совпадают';
        }else{

            $data_reg =[
                'admin'=> $admin,
                'user_login' =>$login,
                'user_email' =>$email,
                'user_password'=>password_hash($password,PASSWORD_DEFAULT )
            ];

            $id = insert('users',$data_reg);
            $user = select_One_String('users',['id_user' => $id]);

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['user_login'] = $user['user_login'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['date_created'] = $user['date_created'];
            if($_SESSION['admin']==='1'){
                header('location:'. INDEX_URL . '/admin/admin.php');
            } else{
                header('location:'. INDEX_URL);
            }

        }

    }else{

    }



