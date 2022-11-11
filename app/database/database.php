<?php
    session_start();
    require_once 'connect.php';

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
        $sql = "DELETE FROM $table WHERE id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
    }
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






