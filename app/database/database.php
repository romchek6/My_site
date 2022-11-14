<?php
    session_start();
    require_once 'connect.php';

    function tt($a){
        ?><pre><?php
        print_r($a);
        ?></pre> <?php
    }

    function error_Db($query){
        $error= $query->errorInfo();

        if ($error[0] !==PDO::ERR_NONE){
            echo $error[2];
            exit();
        }
        return true;
    }

//    Получение данных со всех строк
    function select_All_String($table,$param){
        global $pdo;
        $sql = "SELECT * FROM $table";

        if(!empty($param)){
            $i=0;
            foreach ($param as $key=>$value){
                if(!is_numeric($value)){
                    $value = "'". $value . "'";
                }
                if($i===0){
                    $sql = $sql . " WHERE $key = $value";
                }else{
                    $sql = $sql . " AND $key = $value";
                }
                $i++;
            }
        }
        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
        return $query->fetchAll();
    }
//  Получение данных с 1 строки
    function select_One_String($table,$param){
        global $pdo;
        $sql = "SELECT * FROM $table";

        if(!empty($param)){
            $i=0;
            foreach ($param as $key=>$value){
                if(!is_numeric($value)){
                    $value = "'". $value . "'";
                }
                if($i===0){
                    $sql = $sql . " WHERE $key = $value";
                }else{
                    $sql = $sql . " AND $key = $value";
                }
                $i++;
            }
        }
        $query = $pdo->prepare($sql);
        $query->execute($param);
        error_Db($query);
        return $query->fetch();
}
//    Запись
    function insert($table,$param){
        global $pdo;
        $i=0;
        $column = '';
        $mask = '';
        foreach ($param as $key => $value){
            if($i===0){
                $column = $column . "$key";
                $mask = $mask . "'$value'";
            }else{
                $column = $column . ", $key";
                $mask = $mask . ", '$value'";
            }
            $i++;
        }
        $sql = "INSERT INTO $table ($column) VALUES ($mask)";
        $query = $pdo->prepare($sql);
        $query->execute($param);
        error_Db($query);
        return $pdo->lastInsertId();
    }
//    Обновление записи по id
    function update($table, $id ,$param)
    {
        global $pdo;
        $i = 0;
        $mask = '';
        foreach ($param as $key => $value) {
            if ($i === 0) {
                $mask = $mask . "$key='$value'";
            } else {
                $mask = $mask . ",$key='$value'";
            }
            $i++;
        }
        $sql = "UPDATE $table SET " . $mask  ."  WHERE id = $id ";
        $query = $pdo->prepare($sql);
        $query->execute($param);
        error_Db($query);
    }
//    Удаление записи по id
    function delete($table , $id){
        global $pdo;
        $sql = "DELETE FROM $table WHERE id = $id ";
        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
    }
//    Создание сессий после входа или регистрации
    function data_User($string){
        $_SESSION['id'] = $string['id'];
        $_SESSION['admin'] = $string['admin'];
        $_SESSION['user_login'] = $string['user_login'];
        $_SESSION['user_email'] = $string['user_email'];
        $_SESSION['date_created'] = $string['date_created'];

        if($_SESSION['admin']==='1'){
            header('location:'. INDEX_URL . '/admin/posts/index.php');
        } else{
            header('location:'. INDEX_URL);
        }

    }

//    Выборка записей с автором в админку
    function select_All_From_Posts_With_Users($table1 , $table2, $table3 ){
        global $pdo;

        $sql ="SELECT 
        t1.id,
        t1.title,
        t1.img,
        t1.content,
        t1.status,        
        t1.date_created,        
        t2.user_login,
        t3.topic_name
        FROM $table1 AS t1 JOIN $table2 AS t2 JOIN $table3 AS t3 ON t1.id_user = t2.id AND t1.id_topic = t3.id ";

        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
        return $query->fetchAll();

    }

//    Выборка записей на главную

    function select_All_From_Posts_With_Status_On($table1 , $table2 ){
        global $pdo;

        $sql ="SELECT 
            t1.id,
            t1.title,
            t1.img,
            t1.content,
            t1.status,
            t1.views,
            t1.date_created,        
            t2.user_login          
            FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id WHERE t1.status = 1 ";

        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
        return $query->fetchAll();

    }

//    Выбока 1 записи на синг страницу

    function select_One_From_Posts_With_Status_On($table1 , $table2 , $id){
        global $pdo;

        $sql ="SELECT 
                t1.id,
                t1.title,
                t1.img,
                t1.content,
                t1.status,    
                t1.views,
                t1.date_created,        
                t2.user_login          
                FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id WHERE t1.id = $id ";

        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
        return $query->fetchAll();

    }

//    Выборка трёх лучших постов

    function select_Top_3_posts(){
        global $pdo;

        $sql = "SELECT * FROM posts ORDER BY views DESC LIMIT 3";

        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
        return $query->fetchAll();
    }

//    поиск по сайту

    function search_In_Title_and_Content($table1 , $table2 ,$text){
        $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
        global $pdo;
        $sql ="SELECT 
                t1.id,
                t1.title,
                t1.img,
                t1.content,
                t1.status,
                t1.views,
                t1.date_created,        
                t2.user_login          
                FROM $table1 AS t1 
                JOIN $table2 AS t2 
                ON t1.id_user = t2.id 
                WHERE t1.status = 1 
                AND t1.title LIKE '%$text%'
                OR t1.content LIKE '%$text%'";

        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
        return $query->fetchAll();

    }
    function select_All_From_Posts_With_Status_On_And_Sort($table1 , $table2 , $sort ,$paramSort){
        global $pdo;

        $sql ="SELECT 
                t1.id,
                t1.title,
                t1.img,
                t1.content,
                t1.status,
                t1.views,
                t1.date_created,        
                t2.user_login          
                FROM $table1 AS t1 
                JOIN $table2 AS t2 
                ON t1.id_user = t2.id 
                ORDER BY $sort $paramSort ";

        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
        return $query->fetchAll();

    }








