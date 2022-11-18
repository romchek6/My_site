<?php
    include 'app/database/database.php';

    $page  = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page-1)*$limit;


    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['no_sort'])){
        unset($_SESSION['param']);
        unset($_SESSION['sort']);
    }

    $topics = select_All_String('topics',null);
    $top_posts = select_Top_3_posts();

    if (($_SERVER['REQUEST_METHOD'] ==='GET' || $_SERVER['REQUEST_METHOD'] ==='POST')  && (isset($_GET['id'])||(isset($_POST['id'])))){
        $id = isset($_GET['id'])?$_GET['id']:$_POST['id'];
        $posts1 = select_One_From_Posts_With_Status_On('posts','users',$id);
        $newViews = $posts1[0]['views'] + 1;
        update('posts',$id,['views'=>$newViews]);

    }
    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['search-term'])){
        $search_text = $_GET['search-term'];

        if($_GET['press']==='1'||$_GET['no_sort'] ==='1'||$_POST['no_sort']){
            $_SESSION['press'] = 1;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $search = search_In_Title_and_Content('posts','users',$search_text,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['press']==='2'){
            $_SESSION['press'] = 2;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $search = search_In_Title_and_Content('posts','users',$search_text,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['press']==='3'){
            $_SESSION['press'] = 3;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $search = search_In_Title_and_Content('posts','users',$search_text,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);


        }
        if($_GET['press']==='4'){
            $_SESSION['press'] = 4;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $search = search_In_Title_and_Content('posts','users',$search_text,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }

    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id_topic'])){

        $id = $_GET['id_topic'];
        $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users','date_created','DESC',$limit,$offset,['id_topic'=>$id]);

    }

    if (!isset($_GET['press'])){
        $_SESSION['press'] = 1;
        $_SESSION['sort'] = 'date_created';
        $_SESSION['param'] = 'DESC';
        $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users','date_created','DESC',$limit,$offset,null);
    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['sort']) && !$_GET['search-term'] &&!$_GET['id']){

        $_SESSION['press'] = $_GET['press'];
        $_SESSION['sort'] = $_GET['sort'];
        $_SESSION['param'] = $_GET['param'];
        $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,[]);
        $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);



//        if($_GET['press']==='1'){
//            $_SESSION['press'] = 1;
//            $_SESSION['sort'] = $_GET['sort'];
//            $_SESSION['param'] = $_GET['param'];
//            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,[]);
//            $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);
//        }
//        if($_GET['press']==='2'){
//            $_SESSION['press'] = 2;
//            $_SESSION['sort'] = $_GET['sort'];
//            $_SESSION['param'] = $_GET['param'];
//            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,null);
//            $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);
//        }
//        if($_GET['press']==='3'){
//            $_SESSION['press'] = 3;
//            $_SESSION['sort'] = $_GET['sort'];
//            $_SESSION['param'] = $_GET['param'];
//            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,null);
//            $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);
//        }
//        if($_GET['press']==='4'){
//            $_SESSION['press'] = 4;
//            $_SESSION['sort'] = $_GET['sort'];
//            $_SESSION['param'] = $_GET['param'];
//            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,null);
//            $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);
//        }
//        if($_GET['press']==='5'){
//            $_SESSION['press'] = 5;
//            $_SESSION['sort'] = $_GET['sort'];
//            $_SESSION['param'] = $_GET['param'];
//            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,null);
//            $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);
//        }
//        if($_GET['press']==='6'){
//            $_SESSION['press'] = 6;
//            $_SESSION['sort'] = $_GET['sort'];
//            $_SESSION['param'] = $_GET['param'];
//            $posts = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,null);
//            $search = select_All_From_Posts_With_Status_On_And_Sort('posts','users',$_SESSION['sort'],$_SESSION['param'],$limit,$offset,['id_topic'=>$_GET['id_topic']]);
//        }

    }

    if ($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['comment'])){

        $text = $_POST['text'];
        $id_post = $_POST['id'];
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

    if (!isset($_GET['press']) && ($_GET['id'])){
        $id1 =  $_GET['id'];
        $_SESSION['press'] = 1;
        $_SESSION['sort'] = 'date_created';
        $_SESSION['param'] = 'DESC';
        $comments = select_All_From_Comments_With_Status_On_And_Sort('comments', 'users', $id1,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
    }

    if ($_SERVER['REQUEST_METHOD'] ==='GET' && (isset($_GET['id'])||isset($_POST['id']))) {

        $id1 =  $_GET['id'];

        if($_GET['press']==='1'||$_GET['no_sort'] ==='1'){
            $_SESSION['press'] = 1;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $comments = select_All_From_Comments_With_Status_On_And_Sort('comments', 'users', $id1,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);

        }
        if($_GET['press']==='2'){
            $_SESSION['press'] = 2;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $comments = select_All_From_Comments_With_Status_On_And_Sort('comments', 'users', $id1,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['press']==='3'){
            $_SESSION['press'] = 3;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $comments = select_All_From_Comments_With_Status_On_And_Sort('comments', 'users', $id1,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }
        if($_GET['press']==='4'){
            $_SESSION['press'] = 4;
            $_SESSION['sort'] = $_GET['sort'];
            $_SESSION['param'] = $_GET['param'];
            $comments = select_All_From_Comments_With_Status_On_And_Sort('comments', 'users', $id1,$_SESSION['sort'],$_SESSION['param'],$limit,$offset);
        }

    }

    if($_GET['nums']){
        $nums = (int) $_GET['nums'];
        $arr = ['Audi', 'BMW', 'Ford', 'Hyundai', 'Mazda', 'Mercedes-Benz', 'Toyota', 'Volkswagen'];
        shuffle($arr);
        exit(json_encode(array_slice($arr, 0, $nums)));
    }







