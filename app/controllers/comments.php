<?php
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
    $id1 = isset($_GET['id'])?$_GET['id']:$_POST['id'];
    $comments = select_All_From_Comments_With_Status_On('comments','users',$id1);
