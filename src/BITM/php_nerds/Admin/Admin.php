<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 20-02-17
 * Time: 15.17
 */

namespace App\Admin;
use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;

use PDO;


class Admin extends DB
{
    public $admin_name;
    public $admin_email;
    public $admin_password;
    public $id;

    public function set_data($post_data){
        if(array_key_exists('id',$post_data)){
            $this->id = $post_data['id'];
        }

        if(array_key_exists('admin_name',$post_data)){
            $this->admin_name = $post_data['admin_name'];
        }

        if(array_key_exists('admin_email',$post_data)){
            $this->admin_email = $post_data['admin_email'];
        }

        if(array_key_exists('admin_password',$post_data)){
            $this->admin_password = md5($post_data['admin_password']);
        }
     }

    public function store(){
        $data_array = array($this->admin_name, $this->admin_email, $this->admin_password);
        $sql = "INSERT INTO admin (admin_name,admin_email,admin_password) VALUES (?, ?, ?)";
        $sth = $this->DBH->prepare($sql);
        $store_data = $sth->execute($data_array);

        if($store_data){
            Message::message("data has been stored successfully!");
        }else{
            Message::message("data has not been stored successfully!");
        }
        Utility::redirect("admin_create_form.php");
    }

    public function view(){
        $query = "SELECT * FROM `admin` WHERE `admin_email` = '$this->admin_email'";
        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();
    }
    public function is_empty(){
        $query = "SELECT * FROM admin";
        $sth = $this->DBH->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth->fetchAll();
        $row_number = $sth->rowCount();
        if($row_number<=0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    //alluser list getting method

    public function all_users(){
        $sql = "SELECT * FROM user WHERE soft_deleted='No'";
        $sth = $this->DBH->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }




   /** public function is_registered(){
        $query = "SELECT * FROM `users` WHERE `email_verified`='" . 'Yes' . "' AND `email`=:email AND `password`=:password";
        $STH=$this->conn->prepare($query);
        $STH->execute(array(':email'=>$this->email, ':password'=>$this->password));

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }*/
}