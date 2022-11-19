<?php
    include 'app/database/database.php';

    $page  = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page-1) * $limit;
    $post_id = $_GET['id'];
    $topic_id = $_GET['id_topic'];
    $topic = $_GET['topic'];

    $search_term = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['search-term']))));
    $sort = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['sort']))));
    $param = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['param']))));
    $press = trim(strip_tags(stripcslashes(htmlspecialchars($_GET['press']))));

    settype($topic_id, 'integer');
    settype($post_id, 'integer');

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['no_sort'])){
        unset($_SESSION['param']);
        unset($_SESSION['sort']);
    }

    $topics = select_All_String('topics',null);
    $top_posts = select_Top_3_posts();

    if ($_SERVER['REQUEST_METHOD'] ==='GET'  &&  isset($_GET['id'])){
        $posts1 = select_One_From_Posts_With_Status_On('posts','users',$post_id);
        $newViews = $posts1[0]['views'] + 1;
        update('posts',$post_id,['views'=>$newViews]);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['search-term'])){
        $search_text = trim($_GET['search-term']);
        if(strlen($search_text)<1){
            header('Location: index.php');
        }else{
            $_SESSION['press'] = $press;
            $_SESSION['sort'] = $sort;
            $_SESSION['param'] = $param;
            $search = search_In_Title_and_Content('posts','users',$search_text,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }

    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id_topic'])){
        $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users','date_created','DESC',$limit,$offset,['id_topic'=>$topic_id]);
    }

    if (!isset($_GET['press'])){
        $_SESSION['press'] = 1;
        $_SESSION['sort'] = 'date_created';
        $_SESSION['param'] = 'DESC';
        $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users','date_created','DESC',$limit,$offset,null);
    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['sort']) && !$_GET['search-term'] &&!$_GET['id']){
        $_SESSION['press'] = $press;
        $_SESSION['sort'] = $sort;
        $_SESSION['param'] = $param;
        $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,[]);
        $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);
    }











