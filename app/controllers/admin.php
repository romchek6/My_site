<?php
    include '../../app/database/database.php';

    $error_Message = '';

//    Код для админки

    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['button-create-topic'])){

        $topic_name = trim($_POST['topic_name']);
        $topic_description = trim($_POST['topic_description']);


        if($topic_name ===''||$topic_description ===''){
            $error_Message = 'Заполните все поля';
        }else if(select_One_String('topics', ['topic_name'=>$topic_name] )){
            $error_Message = 'Такая категория уже существует';
        }else{
            $data_topic_create =[
                'topic_name' =>$topic_name,
                'topic_description' =>$topic_description
            ];

            $id = insert('topics',$data_topic_create);
            $error_Message = 'Категория создана';




        }


    } else{
        $topic_name = '';
        $topic_description = '';
    }

if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-create-user'])){

    $user_login = trim($_POST['user_login']);
    $user_email = trim($_POST['user_email']);
    $user_password = trim($_POST['user_password']);
    $password_confirm = trim($_POST['password_confirm']);


    if($user_login ===''||$user_email ===''||$user_password ===''||$password_confirm===''){
        $error_Message = 'Заполните все поля';
    }else if(strlen($user_login)<4){
        $error_Message = 'Минимальная длина логина 4 символа';
    }else if(select_One_String('users', ['user_login'=>$user_login] )){
        $error_Message = 'Пользователь с таким логином уже зарегистрирован';
    }else if(select_One_String('users', ['user_email'=>$user_email])){
        $error_Message = 'Пользователь с таким email уже зарегистрирован';
    }else if(strlen($user_password)<6){
        $error_Message = 'Минимальная длина пароля 6 символов';
    }else if($user_password!==$password_confirm){
        $error_Message = 'Пароли не совпадают';
    }else{

        $data_reg =[
            'admin'=> $_POST['select'],
            'user_login' =>$user_login,
            'user_email' =>$user_email,
            'user_password'=>password_hash($user_password,PASSWORD_DEFAULT )
        ];

        $id = insert('users',$data_reg);
        $error_Message = 'Пользователь зарегистрирован';

    }


} else{
    $user_login = '';
    $user_email = '';
}

    if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-create-post'])){

        $topic_name = trim($_POST['topic_name']);
        $topic_description = trim($_POST['topic_description']);

        if($topic_name ===''||$topic_description ===''){
            $error_Message = 'Заполните все поля';
        }else if(select_One_String('topics', ['topic_name'=>$topic_name] )){
            $error_Message = 'Такая категория уже существует';
        }else{
            $data_topic_create =[
                'topic_name' =>$topic_name,
                'topic_description' =>$topic_description
            ];

            $id = insert('topics',$data_topic_create);
            $error_Message = 'Категория создана';

        }


    } else{

    }
