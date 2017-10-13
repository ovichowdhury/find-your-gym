<?php
    //for getting a pdo connection default database name is gymapp
    function getPDOConnection(){
        $host = "localhost";
        $db = "gymapp";
        $user = "root";
        $pass = "";
        $charset = "utf8";      
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn,$user,$pass,$opt);
        return $pdo;
    }
    
    //geting select statement json data
    function getSelectData($sql,$paraArray){
        $pdo = getPDOConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($paraArray);
        $result = $stmt->fetchAll();
        $pdo = null;
        return json_encode($result);
    }
    
    //for insert and update data
     function manipulateData($sql,$paraArray){
        try{
                $pdo = getPDOConnection();
                $stmt = $pdo->prepare($sql);
                $stmt->execute($paraArray);
                $pdo = null;
                return true;
        }catch(Exception $e){
                return false;
        }
        		
    }

?>

