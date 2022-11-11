<?php
    include '../../app/database/database.php';

    $error_Message = '';

    $posts = select_All_String('posts',null);
    $topics = select_All_String('topics',null);


    //    Создание категории

    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['button-create-post'])){

        $title = $_POST['title'];
        $content = $_POST['content'];
        $topic = $_POST['topic'];
        $path = 'app/img_post/' . time() . $_FILES['img']['name'];
        if($_POST['status']==='on'){
            $status = 1;
        }else $status = 0;

        if($title ===''||$content ===''|| $topic === ''){
            $error_Message = 'Заполните все поля';
        }else if(strlen($title)<5){
            $error_Message = 'Название статьи должно быть не менее 5 символов';
        }else if(strlen($content)<100){
            $error_Message = 'Минимальная длина статьи 100 символов';
        }else if(!move_uploaded_file($_FILES['img']['tmp_name'] , '../../'. $path)){
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
            $error_Message = 'Пост создан';
            $title = '';
            $content = '';
            $topic = '';
            $path = '';
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
        $topics = select_One_String('topics',['id'=>$id]);
        $topic_name = $topics['topic_name'];
        $topic_description = $topics['topic_description'];

    }
    if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['button-update-topic'])){

        $topic_name = $_POST['topic_name'];
        $topic_description = $_POST['topic_description'];
        $id = $_POST['id'];

        if($topic_name ===''||$topic_description ===''){
            $error_Message = 'Заполните все поля';
        }else{
            $data_topic_update =[
                'topic_name' =>$topic_name,
                'topic_description' =>$topic_description
            ];

            update('topics', $id ,$data_topic_update);
            header('location:'.INDEX_URL.'/admin/topics/index.php' );

        }

    }

    //    Удаление категории

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $topic = select_One_String('topics',['id'=>$id]);
        $topic_name = $topic['topic_name'];
        delete('topics',$id);
        $_SESSION['error'] = "Категория $topic_name успешно удалена";
        header('location:'.INDEX_URL.'/admin/topics/index.php');

    }



