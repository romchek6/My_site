<?php
    include '../../app/database/database.php';

        $id_comment =$_GET['id_comment'];
        $id_user =$_GET['id_user'];
        $id_post =$_GET['id_post'];
        settype($id_comment, 'integer');
        settype($id_user, 'integer');
        settype($id_post, 'integer');
        $param = [
            'id_comment' => $id_comment,
            'id_user' => $id_user,
            'id_post' => $id_post
        ];
        $rows = count_Rows_likes('comments_likes', $param);
        $str = select_One_String('comments_likes', $param);
        $str1 = select_One_String('comments', ['id'=>$id_comment]);
        if($rows > 0) {
            delete('comments_likes', $str['id']);
            update('comments',$id_comment,['score'=>$str1['score']-10]);
            echo count_Rows_likes('comments_likes', ['id_comment' => $id_comment]);
        }else{
            insert('comments_likes', $param);
            update('comments',$id_comment,['score'=>$str1['score']+10]);
            echo count_Rows_likes('comments_likes', ['id_comment' => $id_comment]);
        }

