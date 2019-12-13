<?php

require_once"include/connect.php";

if($_GET["obj"] == "check_login"){
    
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);
 
    
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
        
        echo "success";
    }else{
        echo "false";
    }

}


?>