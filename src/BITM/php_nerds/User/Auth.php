<?php
/**
 * Created by PhpStorm.
 * User: Rajesh Kumar Nath
 * Date: 04-03-17
 * Time: 01.54
 */

namespace App\User;

use PDO,PDOException,PDORow;
use App\Model\Database as DB;

if(!isset($_SESSION)) {
    session_start();
}

class Auth extends DB
{
    private $email;
    private $password;

    public function setData($loginData){
        if(array_key_exists('email',$loginData)){
            $this->email = $loginData['email'];
        }
        if(array_key_exists('password',$loginData)){
            $this->password = md5($loginData['password']);
        }
    }




    public function is_registered(){
        $query = "SELECT * FROM `user` WHERE `email_verified`='".'Yes'."' AND `email`='$this->email' AND `password`='$this->password'";
        $STH=$this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function logged_in(){
        if(array_key_exists('email',$_SESSION) && (!empty($_SESSION['email']))){
            Return TRUE;
        }
        else{
            return FALSE;
        }
    }


    public function log_out(){
        $_SESSION['email'] = "";
        return TRUE;
    }
}