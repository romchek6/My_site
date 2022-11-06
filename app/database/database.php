<?php
    require_once 'connect.php';

    function select_All($table){
        global $pdo;
        $sql = "SELECT * FROM '$table'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $error= $query->errorInfo();

        if ($error[0] !==PDO::ERR_NONE){
            echo $error[2];
            exit();
        }

        return $query->fetchAll();
    }