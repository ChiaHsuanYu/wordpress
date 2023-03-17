<?php 
    class Users_model{

        function get_user_data($connection,$data){
            $account = $data['account'];
            $password = md5($data['password']);

            $sql = "SELECT * FROM `users` where `account` = :account AND `password` = :password";
            $result = $connection->prepare($sql);
            $result->bindValue(':account', $account);
            $result->bindValue(':password', $password);
            $result->execute();
            return $result;
        }

        function update_user_by_id($connection,$data){
            $id = $data['id'];
            $sql = "UPDATE `users` SET `status` = '0' WHERE `id`= :id";
            $result = $connection->prepare($sql);
            $result->bindValue(':id', $id);
            $result->execute();
            return $result;
        }
    }

?>