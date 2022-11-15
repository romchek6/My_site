<?php
    include 'app/database/database.php';

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['no_sort'])){
        unset($_SESSION['param']);
        unset($_SESSION['sort']);
    }

    $posts = select_All_From_Posts_With_Status_On('posts','users',$limit,$offset);
    $topics = select_All_String('topics',null);
    $top_posts = select_Top_3_posts();

    if (($_SERVER['REQUEST_METHOD'] ==='GET' || $_SERVER['REQUEST_METHOD'] ==='POST')  && (isset($_GET['id'])||(isset($_POST['id'])))){
        $id = isset($_GET['id'])?$_GET['id']:$_POST['id'];
        $posts1 = select_One_From_Posts_With_Status_On('posts','users',$id);
        $newViews = $posts1[0]['views'] + 1;
        update('posts',$id,['views'=>$newViews]);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['search-term'])){

        $search_text = $_POST['search-term'];
        $search = search_In_Title_and_Content('posts','users',$search_text);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id_topic'])){

        $id = $_GET['id_topic'];
        $search = select_All_String('posts',['id_topic'=>$id]);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && (isset($_GET['sort'])||isset($_GET['no_sort']))){

        if($_GET['press']==='1'){
            $_SESSION['press'] = 1;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['press']==='2'){
            $_SESSION['press'] = 2;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['press']==='3'){
            $_SESSION['press'] = 3;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['press']==='4'){
            $_SESSION['press'] = 4;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['no_sort'] ==='1'){
            $posts = select_All_From_Posts_With_Status_On('posts','users',$limit,$offset);
            unset($_SESSION['press']);

        }

    }

    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['comment'])){

        $text = $_POST['text'];
        $id_post = $_POST['id'];
        $data =[
            'id_user'=>$_SESSION['id'],
            'id_post'=>$id_post,
            'comment'=>$text
        ];

        insert('comments',$data);
        header('Location:single_post.php?id='.$id_post);
    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && (isset($_GET['id'])||isset($_POST['id']))) {
        $id1 = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
        $comments = select_All_From_Comments_With_Status_On('comments', 'users', $id1);
    }





