<?php
    include '../../app/database/database.php';

        $param = [
            'id_comment' => $_GET['id_comment'],
            'id_user' => $_GET['id_user'],
            'id_post' => $_GET['id_post']
        ];
        $rows = count_Rows_likes('comments_likes', $param);
        $str = select_One_String('comments_likes', $param);
        $str1 = select_One_String('comments', ['id'=>$_GET['id_comment']]);
        if($rows > 0) {
            delete('comments_likes', $str['id']);
            update('comments',$_GET['id_comment'],['score'=>$str1['score']-10]);
            echo count_Rows_likes('comments_likes', ['id_comment' => $_GET['id_comment']]);
        }else{
            insert('comments_likes', $param);
            update('comments',$_GET['id_comment'],['score'=>$str1['score']+10]);
            echo count_Rows_likes('comments_likes', ['id_comment' => $_GET['id_comment']]);
        }

