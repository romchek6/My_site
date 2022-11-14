<?php
    include '../../app/database/database.php';

    $error_Message = '';
    $topics = select_All_String('topics',null);

//    Создание категории

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
            $topic_name = '';
            $topic_description = '';
            header('location:'.INDEX_URL.'/admin/topics/index.php' );

        }


    } else{
        $topic_name = '';
        $topic_description = '';
    }

//    Редактирование категории

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['update_id'])){

        $id = $_GET['update_id'];
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
        delete('topics',$id);
        header('location:'.INDEX_URL.'/admin/topics/index.php');

    }







