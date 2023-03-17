<?php 
require_once("SimpleRest.php");
require_once("connMysql.php");
require_once("Users_model.php");

session_start();
class SiteRestHandler extends SimpleRest {
    // 登入
    function Login() {    
        $result = "";
        $data = array(
            'account'=>$_POST['account'],
            'password'=>$_POST['password']
        );
        if ($data['account'] == "" || $data['password'] == "") { 
            $result = array(
                "status" => 0,
                "message" => "請完整填寫帳號密碼"
            ); 
        } else {
            $connMysql = new ConnMysql_class();
            $result = $connMysql->connMysql();
            if($result['status']){
                $connection = $result['connection'];
                $users_model = new Users_model();
                // 檢查使用者是否存在
                $result = $users_model->get_user_data($connection,$data);
                if ($result->rowCount()==0) {
                    $connection=null;
                    $result = array(
                        "status" => 0,
                        "message" => "帳號密碼錯誤"
                    ); 
                }else{
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $id = $row['id'];
                    $_SESSION['user_info'] =  array(
                        'id'=> $id,
                        'account' => $data['account'],
                    );
                    // 更新使用者登入狀態
                    $sql = "UPDATE `users` SET `status` = '1' WHERE `id`= :id ";
                    $r = $connection->prepare($sql);
                    $r->bindValue(':id', $id);
                    try {
                        if ($r->execute()) {
                            $result = array(
                                "status" => 1,
                                "message" => "登入成功"
                            ); 
                        }else{
                            $result = array(
                                "status" => 0,
                                "message" => "登入失敗"
                            ); 
                        }
                    } catch (PDOException $e) {
                        $result = array(
                            "status" => 0,
                            "message" => "登入失敗"
                        ); 
                    }
                    $connection=null;
                }
            }
        }
        $this->response($result);
    }
    // 登出
    function Logout() {    
        $result = "";
        $connMysql = new ConnMysql_class();
        $result = $connMysql->connMysql();
        if($result['status']){
            $connection = $result['connection'];
            $users_model = new Users_model();
            // 修改使用者狀態
            $data = array( 
                "id" => $_SESSION['user_info']['id']
            );
            $r = $users_model->update_user_by_id($connection,$data);
            try {
                if ($r->execute($data)) {
                    $result = array(
                        "status" => 1,
                        "message" => '登出成功'
                    ); 
                    session_destroy();
                } else {
                    $result = array(
                        "status" => 0,
                        "message" => "登出失敗"
                    ); 
                }
            } catch (PDOException $e) {
                $result = array(
                    "status" => 0,
                    "message" => "登出失敗"
                ); 
            }
        }
        $this->response($result);
    }

    // 回應狀態
    function response($result){
        if($result){
            $statusCode = 200;
        }else{
            $statusCode = 404;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);
        echo json_encode($result);
    }
}
?>