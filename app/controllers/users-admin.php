<?php
    include '../../app/database/database.php';
    $users = select_All_String('users',null);

    if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-create-user'])){

        $admin =$_POST['select'] ;
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password_confirm = trim($_POST['password_confirm']);



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

            $data_create_user =[
                'admin'=> $admin,
                'user_login' =>$login,
                'user_email' =>$email,
                'user_password'=>password_hash($password,PASSWORD_DEFAULT )
            ];

            $id = insert('users',$data_create_user);
            header('Location:'. INDEX_URL . '/admin/users/index.php');

        }


    } else{
//        $login = '';
//        $email = '';
    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id'])){

        $id = $_GET['id'];
        $user = select_One_String('users',['id'=>$id]);
        $login = $user['user_login'];
        $email = $user['user_email'];
        $admin = $user['admin'];

    }
    if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['button-update-user'])){

        $id = $_POST['id'];
        $admin = $_POST['select'];
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password_confirm = trim($_POST['password_confirm']);
        $user2 = select_One_String('users',['id'=>$id]);



        if($login ===''||$email ===''||$password ===''||$password_confirm===''){
            $error_Message = 'Заполните все поля';
        }else if(strlen($login)<4){
            $error_Message = 'Минимальная длина логина 4 символа';
        }else if(strlen($password)<6){
            $error_Message = 'Минимальная длина пароля 6 символов';
        }else if($password!==$password_confirm){
            $error_Message = 'Пароли не совпадают';
        }else if($user2['user_login'] !== $login) {
            if (select_One_String('users', ['user_login' => $login])) {
                $error_Message = 'Пользователь с таким логином уже зарегистрирован';
            }else {
                    $data_update_user = [
                        'admin' => $admin,
                        'user_login' => $login,
                        'user_email' => $email,
                        'user_password' => password_hash($password, PASSWORD_DEFAULT)
                    ];

                    update('users', $id, $data_update_user);
                    header('Location:' . INDEX_URL . '/admin/users/index.php');
                }


        }else if($user2['user_email']!== $email){
            if(select_One_String('users', ['user_email'=>$email])){
                $error_Message = 'Пользователь с таким email уже зарегистрирован';
            }else{
                $data_update_user = [
                    'admin' => $admin,
                    'user_login' => $login,
                    'user_email' => $email,
                    'user_password' => password_hash($password, PASSWORD_DEFAULT)
                ];

                update('users', $id, $data_update_user);
                header('Location:' . INDEX_URL . '/admin/users/index.php');
            }
        }else{
            $data_update_user = [
                'admin' => $admin,
                'user_login' => $login,
                'user_email' => $email,
                'user_password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            update('users', $id, $data_update_user);
            header('Location:' . INDEX_URL . '/admin/users/index.php');
        }



    } else{
//        $login = '';
//        $email = '';
    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        delete('users',$id);
        header('location:'.INDEX_URL.'/admin/users/index.php');
}
