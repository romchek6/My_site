<?php
    include '../../app/database/database.php';

    $error_Message = '';

//    $posts = select_All_String('posts',null);
    $topics = select_All_String('topics',null);
    $posts = select_All_From_Posts_With_Users('posts','users','topics');



    //    Создание статьи

    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['button-create-post'])){

        $title = $_POST['title'];
        $content = $_POST['content'];
        $topic = $_POST['topic'];
        $path =  ROTH_PATH . '/assets/images/images_post/' . time(). "-" . $_FILES['img']['name'];
        if($_POST['status']==='on'){
            $status = 1;
        }else $status = 0;

        if($title ===''||$content ===''|| $topic === ''){
            $error_Message = 'Заполните все поля';
        }else if(strlen($title)<5){
            $error_Message = 'Название статьи должно быть не менее 5 символов';
        }else if(strlen($content)<100){
            $error_Message = 'Минимальная длина статьи 100 символов';
        }else if(strpos($_FILES['img']['type'] ,'image')===false){
            $error_Message = 'Файл не является изображением';
        }else if(!move_uploaded_file($_FILES['img']['tmp_name'] ,$path)){
            $error_Message = 'Ошибка загрузки картинки';
        }else{
            $data_post_create =[
                'id_user'=>$_SESSION['id'],
                'title'=>$title,
                'content'=>$content,
                'img'=> $path,
                'status' =>$status,
                'id_topic'=>$topic
            ];

            $id = insert('posts',$data_post_create);
            $title = '';
            $content = '';
            $topic = '';
            $path = '';
            header('location:'.INDEX_URL.'/admin/posts/index.php');
        }


    } else{
        $title = '';
        $content = '';
        $topic = '';
        $path = '';
    }

    //    Редактирование категории

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id'])){

        $id = $_GET['id'];
        $post = select_One_String('posts',['id'=>$id]);
        $title = $post['title'];
        $content = $post['content'];
        $img = $post['img'];
        $topic2 = select_One_String('topics',['id'=>$post['id_topic']]);

    }

    if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['button-update-post'])){

        $title = $_POST['title'];
        $content = $_POST['content'];
        $topic = $_POST['topic'];
        $id = $_POST['id'];


        $path = 'assets/images/images_post/' . time() . $_FILES['img']['name'];
        if($_POST['status']==='on'){
            $status = 1;
        }else $status = 0;

        if($title ===''||$content ===''|| $topic === ''){
            $error_Message = 'Заполните все поля';
        }else if(strlen($title)<5){
            $error_Message = 'Название статьи должно быть не менее 5 символов';
        }else if(strlen($content)<100){
            $error_Message = 'Минимальная длина статьи 100 символов';
        }else {
           if(!$_FILES['img']['name']){
               $data_post_update = [
                   'id_user' => $_SESSION['id'],
                   'title' => $title,
                   'content' => $content,
                   'status' => $status,
                   'id_topic' => $topic
               ];

               update('posts',$id ,$data_post_update);
               $title = '';
               $content = '';
               $topic = '';
               $path = '';
               header('location:' . INDEX_URL . '/admin/posts/index.php');
           }  else{
               if(!move_uploaded_file($_FILES['img']['tmp_name'] , '../../'. $path)){
                   $error_Message = 'Ошибка загрузки картинки';
               }
               $data_post_update = [
                   'id_user' => $_SESSION['id'],
                   'title' => $title,
                   'content' => $content,
                   'img' => $path,
                   'status' => $status,
                   'id_topic' => $topic
               ];

               update('posts',$id ,$data_post_update);
               $title = '';
               $content = '';
               $topic = '';
               $path = '';
               header('location:' . INDEX_URL . '/admin/posts/index.php');
           }

        }

    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        delete('posts',$id);
        header('location:'.INDEX_URL.'/admin/posts/index.php');

    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['publish_id'])){
        $id = $_GET['publish_id'];
        $post = select_One_String('posts',['id'=>$id]);

        if ($post['status']!=='1'){
            $status = ['status'=>1];
        }else{
            $status = ['status'=>0];
        }

        update('posts',$id,$status);
        header('location:'.INDEX_URL.'/admin/posts/index.php');

    }



