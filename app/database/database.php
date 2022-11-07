<?php
    require_once 'connect.php';

    function error_Db($query){
        $error= $query->errorInfo();

        if ($error[0] !==PDO::ERR_NONE){
            echo $error[2];
            exit();
        }
        return true;
    }
    $data =[
    'admin' =>'1',
    'user_login' =>'vasyana',
    'user_email' =>'vasyana@gmail.com',
    'user_password' =>'123456',
    ];
    $param = [
        'admin' =>0,
        'user_password'=> 444
    ];
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
        $query->execute();
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
    }
//    Обновление
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
        $sql = "UPDATE $table SET " . $mask  ."  WHERE id_user = $id ";
        $query = $pdo->prepare($sql);
        $query->execute($param);
        error_Db($query);
    }
//    Обновление
    function delete($table , $id){
        global $pdo;
        $sql = "DELETE FROM users WHERE id_user = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        error_Db($query);
    }

//  update('users',3,$param);
    delete('users', 4);
    ?>

<pre>
  <?php

  ?>
</pre>

