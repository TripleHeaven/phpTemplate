<?php
    session_start();
    require_once 'config.php';
    function register_user($username, $email, $password) {
    global $mysqli;
    $result_select = $mysqli->query("SELECT * FROM users WHERE username = '$username' OR email = '$email'");

    
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    header("Location: register.php");
    
    while ($row = $result_select->fetch_assoc()) {
        return "Пользователь с указанным e-mail или логином уже существует";
        
    }

    $result_insert = $mysqli->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')");
   
    // error_log($result_insert);


    if ($result_insert) {
        $_SESSION['user_id'] = $mysqli->insert_id;
        $_SESSION['username'] = $username;
        return true;
    }

    return "Что-то пошло не так";
    }

    function authenticate_user($username, $password) {
        global $mysqli;
    
        $result = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
        while($row = $result->fetch_assoc()) {
            $user_arr = $row; 
        }
 
        if ($user_arr && password_verify($password, $user_arr['password'])) {
            return $user_arr;
        }
    
        return false;
    }
    
    function submit_ad($title, $description, $user_id) {
        global $mysqli;
        $result = $mysqli->query("INSERT INTO advertisments (title, description, user_id) VALUES ('$title', '$description', '$user_id')");
      
        return $result;
    }
    
    function fetch_ads() {
        global $mysqli;

        $result = $mysqli->query("SELECT advertisments.*, users.username FROM advertisments JOIN users ON advertisments.user_id = users.id ORDER BY created_at DESC");
        if ($result){
        $ads = $result->fetch_all(MYSQLI_ASSOC);
        return $ads;
        }

        return [];
    
    }

    function create_ad($title, $description, $user_id) {
        global $mysqli;
  

        $result = $mysqli->query("INSERT INTO advertisments (title, description, user_id) VALUES ('$title', '$description', '$user_id')");
        $insert_id = $mysqli->insert_id;
        if ($insert_id) {

            return $insert_id;
        } else {
            return false;
        }
    }
?>
