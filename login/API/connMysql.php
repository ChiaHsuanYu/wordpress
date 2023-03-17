<?php 
    class ConnMysql_class{
        // 連線資料庫mysql
        function connMysql(){
            $dsn = 'mysql:dbname=wordpress;host=localhost;port=3307';
            $user = 'root';
            $password = 'a5882097';
            
            //資料庫連線
            try {
                // PDO 連線設定
                $PDO = new PDO($dsn, $user, $password,array(
                    PDO::ATTR_PERSISTENT => true
                ));
                $PDO->exec("SET CHARACTER SET utf8"); 
                $result = array(
                    "status" => 1,
                    "connection" => $PDO
                ); 
            } catch (PDOException $e) {
                // throw new PDOException($e->getMessage());
                $result = array(
                    "status" => 0,
                    "message" => "無法連結資料庫"
                ); 
            }
            return $result;
        }
    }
?>