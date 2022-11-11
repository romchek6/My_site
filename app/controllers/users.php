<?php
    include_once 'app/database/database.php';

    $error_Message = '';

    if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-reg'])){

            $admin = 0;
            $login = trim($_POST['login']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password_confirm = trim($_POST['password_confirm']);

//            $_SESSION['login'] = $login;
//            $_SESSION['email'] = $email;


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
                $user = select_One_String('users',['id' => $id]);

                data_User($user);
//                unset($_SESSION['login']);
//                unset($_SESSION['email']);

            }


    } else{
        $login = '';
        $email = '';
    }
    if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-input'])) {

        $login1 = $_POST['login'];
        $password = $_POST['password'];

//        $_SESSION['login'] = $login1;

        $i = 0;

        if (stripos($login1,'@')){
            $check = select_One_String('users',['user_email'=>$login1]);
        }else {
            $check = select_One_String('users',['user_login'=>$login1]);
            $i++;
        }

        if($login1===''||$password===''){
            $error_Message = 'Заполните все поля';
        }else{
            if($i === 0 && !isset($check['user_email'])){
                $error_Message = 'Неверная почта';
            }else if($i === 1 && !isset($check['user_login'])){
                $error_Message = 'Неверный логин';
            }else if(!password_verify($password, $check['user_password'])){
                $error_Message = 'Неверный пароль';
            }else{
//                unset($_SESSION['login']);
                data_User($check);

            }
        }

    } else{
        $login1 = '';
    }