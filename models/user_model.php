<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "e-commercedb";
$salt = "Cl0uDy\$ky";

function getUserInfo($login_id) {
    global $host;
    global $user;
    global $password;
    global $db;
    $link = mysqli_connect($host, $user, $password, $db);
    
    $query = mysqli_query($link, "SELECT * FROM login JOIN user_profile ON user_profile.login_id = login.id WHERE login.id = " . $login_id);
    
    if(mysqli_num_rows($query) != 1) {
        return -1;
    } else {
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result;
    }
}

function updateUserPassword($login_id, $user_pass) {
    global $host;
    global $user;
    global $password;
    global $db;
    global $salt;
    
    $encryptedPassword = md5(md5($user_pass) . $salt);
    $link = mysqli_connect($host, $user, $password, $db);
    $sqlQuery = "UPDATE login SET password = '" . $encryptedPassword . "' WHERE id = " . $login_id;
    $query = mysqli_query($link, $sqlQuery);
    if($query != false) {
        return $login_id;
    } else {
        return -1;
    }
}

function registerUser($username, $user_pass, $first_name, $last_name, $email, $phone) {
    global $salt;
    global $host;
    global $user;
    global $password;
    global $db;
    
    $encryptedPassword = md5(md5($user_pass) . $salt);
    $link = mysqli_connect($host, $user, $password, $db);
    $sqlQuery = "INSERT INTO login (username, password) VALUES ('" . $username . "', '" . $encryptedPassword . "')";
    $query = mysqli_query($link, $sqlQuery);
    if($query != false) {
        $login_id = $link->insert_id;
        $sqlQuery = "INSERT INTO user_profile (login_id, first_name, last_name, email, phone_num) VALUES " .
                    "('" . $login_id . "', '" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $phone . "')";
        $query = mysqli_query($link, $sqlQuery);
        return $login_id;
    } else {
        return -1;
    }
}

function updateUserInfo($login_id, $first_name, $last_name, $email, $phone) {
    global $host;
    global $user;
    global $password;
    global $db;
    
    $link = mysqli_connect($host, $user, $password, $db);
    $sqlQuery = "UPDATE user_profile SET first_name = '" . $first_name . "', last_name = '" . $last_name . "', " . 
                "email = '" . $email . "', phone_num = '" . $phone . "' WHERE login_id = " . $login_id;
    $query = mysqli_query($link, $sqlQuery);
    if($query != false) {
        return $login_id;
    } else {
        return -1;
    }
}

function login($login, $pass) {
    global $salt;
    global $host;
    global $user;
    global $password;
    global $db;
    
    $encryptedPassword = md5(md5($pass) . $salt);
    $link = mysqli_connect($host, $user, $password, $db);
    $queryToRun = "SELECT id FROM login WHERE login.username = \"" . $login . "\" AND login.password = \"" . $encryptedPassword . "\"";
    $query = mysqli_query($link, $queryToRun);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result) {
        return $result['id'];
    } else {
        return -1;
    }
}

function getPaymentAccounts($login_id){
    global $host;
    global $user;
    global $password;
    global $db;
    
    $link = mysqli_connect($host, $user, $password, $db);
    $queryToRun = "SELECT * FROM payment_methods WHERE payment_methods.login_id = " . $login_id;
    $query = mysqli_query($link, $queryToRun);
   
    $arr = array();
    for($i=0; $i < mysqli_num_rows($query); $i++){
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $arr[] = $result;
    }
    
    return $arr;
}

function getPaymentAccount($payment_id){
    global $host;
    global $user;
    global $password;
    global $db;
    
    $link = mysqli_connect($host, $user, $password, $db);
    $queryToRun = "SELECT * FROM payment_methods WHERE payment_methods.id = " . $payment_id;
    $query = mysqli_query($link, $queryToRun);
   
    $arr = array();
    for($i=0; $i < mysqli_num_rows($query); $i++){
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $arr[] = $result;
    }
    
    return $arr;
}

function addPaymentAccount($login_id, $cred_num, $card_holder_name, $exp_date, $bill_addr1, 
                           $bill_addr2, $bill_city, $bill_state, $bill_zip, $bill_country, $bill_phone) {
    global $host;
    global $user;
    global $password;
    global $db;
    
    $link = mysqli_connect($host, $user, $password, $db);
    $sqlQuery = "INSERT INTO payment_methods (login_id, cred_num, card_holder_name, exp_date, bill_addr1, ".
                "bill_addr2, bill_city, bill_state, bill_zip, bill_country, bill_phone) VALUES ('" . 
                $login_id . "', '"  . $cred_num . "', '"  . $card_holder_name . "', '"  . $exp_date . "', '"  . 
                $bill_addr1 . "', '"  . $bill_addr2 . "', '"  . $bill_city . "', '"  . $bill_state . "', '"  . 
                $bill_zip . "', '"  . $bill_country . "', '"  . $bill_phone . "')";
    $query = mysqli_query($link, $sqlQuery);
    if($query != false) {
        $id = $link->insert_id;
        return $id;
    } else {
        return -1;
    }
}

function updatePaymentAccount($payment_id, $card_holder_name, $exp_date, $bill_addr1, $bill_addr2, 
                              $bill_city, $bill_state, $bill_zip, $bill_country, $bill_phone) {
    global $host;
    global $user;
    global $password;
    global $db;
    
    $link = mysqli_connect($host, $user, $password, $db);
    $sqlQuery = "UPDATE payment_methods SET card_holder_name = '" . $card_holder_name . "', exp_date = '" . $exp_date .
                "', bill_addr1 = '" . $bill_addr1 . "', bill_addr2 = '" . $bill_addr2 . "', bill_city = '" . $bill_city .
                "', bill_state = '" . $bill_state . "', bill_zip = '" . $bill_zip . "', bill_country = '" . $bill_country .
                "', bill_phone = '" . $bill_phone . "' WHERE id = " . $payment_id;
    $query = mysqli_query($link, $sqlQuery);
    if($query != false) {
        return $payment_id;
    } else {
        return -1;
    }
}

function deletePaymentAccount($payment_id) {
    global $host;
    global $user;
    global $password;
    global $db;
    
    $link = mysqli_connect($host, $user, $password, $db);
    $sqlQuery = "DELETE FROM payment_methods WHERE id = " . $payment_id;
    $query = mysqli_query($link, $sqlQuery);
    if($query == false) {
        return -1;
    } else {
        return 0;
    }
}