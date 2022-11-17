<?php
    include '../../app/database/database.php';

        $param=[
            'id_user'=>$_GET['id_user'],
            'id_post'=>$_GET['id_post']
        ];
        $rows = count_Rows_likes('post_likes',$param);
        $str = select_One_String('post_likes',$param);
        if($rows > 0){
            delete('post_likes',$str['id']);
            echo count_Rows_likes('post_likes',['id_post'=>$_GET['id_post']]);
        }else{
            insert('post_likes',$param);
            echo  count_Rows_likes('post_likes',['id_post'=>$_GET['id_post']]);
        }

