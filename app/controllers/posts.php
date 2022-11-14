<?php
    include 'app/database/database.php';

    $topics = select_All_String('topics',null);
    $posts = select_All_From_Posts_With_Status_On('posts','users');
    $top_posts = select_Top_3_posts();

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id'])){

        $topics = select_All_String('topics',null);
        $id = $_GET['id'];
        $posts = select_One_From_Posts_With_Status_On('posts','users',$id);
        $newViews = $posts[0]['views'] + 1;
        update('posts',$id,['views'=>$newViews]);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['search-term'])){

        $search_text = $_POST['search-term'];
        $search = search_In_Title_and_Content('posts','users',$search_text);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id'])){

        $id = $_GET['id'];
        $search = select_All_String('posts',['id_topic'=>$id]);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['sort'])){
        $sort = $_GET['sort'];
        $str =explode("-", $sort);
        $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$str[0],$str[1]);

    }


