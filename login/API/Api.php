<?php
require_once("SiteRestHandler.php");
        
$view = "";
if(isset($_GET["view"]))
    $view = $_GET["view"];
/*
 * RESTful service 控制器
 * URL對應
*/
switch($view){
 
    case "login":
        $siteRestHandler = new SiteRestHandler();
        $siteRestHandler->Login();
        break;
        
    case "logout":
        $siteRestHandler = new SiteRestHandler();
        $siteRestHandler->Logout();
        break;
    case "" :
        //404 - not found;
        break;
}
?>