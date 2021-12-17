<?php


namespace Beejee;


class UserController
{
    public function __construct()
    {
        session_start();
    }

    public function userLogin( $username, $password ){
        if(!isset($_SESSION["logged"]) || $_SESSION['logged'] === true) { //better to use newly generated session key, but task required to not be complicated
            $_SESSION['logged'] = false;
        }
        if($username == "") {
            echo "no username";
            return false;
        }
        if($password == "" || strlen($password) < 3) {
            echo "no pwd";
            return false;
        }
        $db = new Database();
        $username = $db->conn->real_escape_string($username);
        $password = sha1($db->conn->real_escape_string($password));
        $result = $db->conn->query("SELECT is_admin FROM users WHERE username = '$username' AND password = '$password' AND is_admin = '1'");

        if($result->num_rows == 0) return false;
        $row = $result->fetch_assoc();
        if($row['is_admin'] == 1)
        {
            $_SESSION['logged'] = true;
        }
        else
        {
            $_SESSION['logged'] = false;
            return false;
        }
        return true;
    }


    public function isLogged()
    {
        if($_SESSION['logged'] === true)
            return true;
        else
            return false;
    }

    public function logout()
    {
        $_SESSION['logged'] = false;
        header('Location: /');
    }
}