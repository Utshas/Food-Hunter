<?php
/**
 * Created by PhpStorm.
 * User: Rajesh Kumar Nath
 * Date: 03-03-17
 * Time: 20.45
 */

namespace App\User;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

use App\Model\Database as DB;

class User extends DB
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $gender;
    private $mobile_number;
    private $address;
    private $email_token;
    private $profile_picture;
    private $bkash_number;
    private $bkash_pin;
    private $amount;
    private $verified;


    public function setData($postData){
        if(array_key_exists('id',$postData)){
            $this->id = $postData['id'];
        }

        if(array_key_exists('name',$postData)){
            $this->name = $postData['name'];
        }

        if(array_key_exists('email',$postData)){
            $this->email = $postData['email'];
        }

        if(array_key_exists('password',$postData)){
            $this->password = md5($postData['password']);
        }

        if(array_key_exists('gender',$postData)){
            $this->gender = $postData['gender'];
        }

        if(array_key_exists('mobile_number',$postData)){
            $this->mobile_number = $postData['mobile_number'];
        }

        if(array_key_exists('address',$postData)){
            $this->address = $postData['address'];
        }

        if(array_key_exists('email_token',$postData)){
            $this->email_token = $postData['email_token'];
        }

        if(array_key_exists('profile_picture',$postData)){
            $this->profile_picture = $postData['profile_picture'];
        }

        if(array_key_exists('bkash_number',$postData)){
            $this->bkash_number = $postData['bkash_number'];
        }
        if(array_key_exists('bkash_pin',$postData)){
            $this->bkash_pin = $postData['bkash_pin'];
        }
        if(array_key_exists('amount',$postData)){
            $this->amount = $postData['amount'];
        }
        if(array_key_exists('verified',$postData)){
            $this->verified = $postData['verified'];
        }
    }

    public function email_exist(){
        $query = "SELECT * FROM `user` WHERE `email`='$this->email'";
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

    public function store(){
        $dataArray = array($this->name,$this->email,$this->password,$this->gender,$this->mobile_number,$this->address,$this->email_token);
        $sql = "INSERT INTO user(name,email,password,gender,mobile_number,address,email_verified) VALUES(?,?,?,?,?,?,?)";
        $STH = $this->DBH->prepare($sql);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Please, login here!");
            Utility::redirect("../../../../views/BITM/php_nerds/User/login.php?email=$this->email");
        }
        else{
            Message::message("Your email already been taken! Please, try another :) ");
            Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function view(){
        $query = "SELECT * FROM `user` WHERE `email` = '$this->email'";
        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $data = $STH->fetch();
        return $data;

    }

    public function view_log_in(){
        $query = "SELECT * FROM `user` WHERE `email` = '$this->email'";
        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $data = $STH->fetch();
        $row = $STH->rowCount();
        if($row>0){
                return $data;
        }else{
            return FALSE;
        }

    }

    public function view_by_id(){
        $query = "SELECT * FROM `user` WHERE `id`='".$this->id."'";
        $sth = $this->DBH->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetch();
    }

    public function profile_update(){
        $sql = "UPDATE `user` SET `name`='".$this->name."' WHERE `id`='".$this->id."' ";
        $sth = $this->DBH->exec($sql);

        if($sth){
            Message::message("Name updated successfully");
            Utility::redirect("../../../BITM/php_nerds/user/editProfile.php");
        }else{
            Message::message("have not been updated!");

        }
    }

    public function validTokenUpdate(){
        $query = "UPDATE `user` SET `email_verified` = '".'Yes'."' WHERE `email` = '$this->email'";
        $result = $this->DBH->prepare($query);
        $result->execute();

        if(!$result){
            echo "Error";
        }
        else{
            header("Location:../../../../views/BITM/php_nerds/user/login.php?email=$this->email");
        }
    }

    public function profileUpdate(){
        $query = "UPDATE `user` SET `profile_picture` = '".$this->name."' WHERE `email` = '$this->email'";
        $result = $this->DBH->prepare($query);
        $result->execute();

        if(!$result){
            echo "Error";
        }
        else{
            $http_refferer = $_SERVER['HTTP_REFERER'];
            header("Location:$http_refferer");

        }
    }


    public function payment(){
        $dataArray = array($this->email,$this->bkash_number,$this->bkash_pin,$this->amount,$this->verified);
        $sql = "INSERT INTO payment(email,bkash_number,bkash_pin,amount,verified) VALUES(?,?,?,?,?)";
        $result = $this->DBH->prepare($sql);
        $result = $result->execute($dataArray);

        if(!$result){
            echo "Ops! Somthing Wrong!";
        }
        else{
            $page_referer = $_SERVER['HTTP_REFERER'];
            header("Location:$page_referer");
        }
    }
    public function email_exist_payment(){
        $query = "SELECT * FROM `payment` WHERE `email`='$this->email'";
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

    public function readPayment(){
        $query = "SELECT * FROM `payment` WHERE `email` = '$this->email'";
        $STH = $this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $data=$STH->fetch();
        //return $row;
        $row = $STH->rowCount();

        if($row<=0){
            return FALSE;
        }else{
            return $data;
        }
    }

    public function change_password(){
        $query="UPDATE `food_hunter`.`user` SET `password`=:password  WHERE `user`.`email` =:email";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }

    }


}