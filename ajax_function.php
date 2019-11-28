<?php

require_once"include/connect.php";

if($_GET["obj"] == "delete_account_cookie"){

    $key = $_POST["key"];
    setcookie("user_id[$key]", "", time() - 3600, '/');

    echo "success";

}

if($_GET["obj"] == "check_login"){
    
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);
    if(isset($_POST["remember"])){$remember = $_POST["remember"];}
    
    $sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."' ";
    $result = $conn->query($sql);
    $num = $result->num_rows;
    if($num > 0){
        $row = $result->fetch_assoc();
        $_SESSION["USER_ID"] = $row["user_id"];
        $_SESSION["USERNAME"] = $row["username"];
        $_SESSION["first_name"] = $row["first_name"];
        $_SESSION["last_name"] = $row["last_name"];
        $user_id = $row["user_id"];
    
        if(isset($remember)){
            $cookie_value = $row["username"];
            if(isset($_COOKIE["user_id"])){
                foreach($_COOKIE["user_id"] as $v){
                    if($v != $row["user_id"]){
                        setcookie("user_id[$user_id]", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                    }
                }
            }else{
                setcookie("user_id[$user_id]", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
        }
        
        echo "success";
    }else{
        echo "false";
    }

}


?>