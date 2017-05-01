<?php
include_once('class.dbconnection.php');

class ManageUsers{
    public $link;

    function __construct(){
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }

    function registerUsers($username, $password ){
        $query = $this->link->prepare("INSERT INTO users (username,password) VALUES(?,?)");
        $values = array ($username, $password);
        $query->execute($values);
        $count = $query->rowCount();
        return $count;
    }

    function LoginUsers($username, $password){
        $query = $this->link->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
        $rowCount = $query->rowCount();
        return $rowCount;
    }

    function GetUserInfo($username){
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
        $rowCount = $query->rowCount();
        if($rowCount ==1)
        {
            $result = $query->fetchAll();
            return $result;
        }
        else
        {
            return $rowCount;
        }
    }

}

?>