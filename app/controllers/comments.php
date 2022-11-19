<?php

    $sort = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['sort']))));
    $param = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['param']))));
    $press = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['press']))));

    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['comment'])){

        $text = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['text']))));
        $id_post = $_POST['id'];
        settype($id_post, 'integer');
        if(strlen($text)<3){
            $error = 'Минимальная длина комментария 3 символа';
            header('Location:single_post.php?id='.$id_post);
        }else{
            $a = 'Гость'.time();
            if(!$_SESSION['id']){
                $data =[
                    'id_user'=>37,
                    'user_name'=> $a,
                    'id_post'=>$id_post,
                    'comment'=>$text
                ];
            }else{
                $data =[
                    'id_user'=>$_SESSION['id'],
                    'id_post'=>$id_post,
                    'comment'=>$text
                ];
            }
            insert('comments',$data);
            header('Location:single_post.php?id='.$id_post);
        }

    }

    if (!isset($_GET['press']) && ($_GET['id'])){


        $id1 =  $_GET['id'];
        settype($id1, 'integer');
        $_SESSION['press'] = 1;
        $_SESSION['sort'] = 'date_created';
        $_SESSION['param'] = 'DESC';
        $comments = select_All_From_Comments_With_Status_On_And_Sort('comments', 'users', $id1,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);

    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['sort'])) {

        $id1 =  $_GET['id'];
        settype($id1, 'integer');
        $_SESSION['press'] = $press;
        $_SESSION['sort'] = $sort;
        $_SESSION['param'] = $param;
        $comments = select_All_From_Comments_With_Status_On_And_Sort('comments', 'users', $id1,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);


    }
