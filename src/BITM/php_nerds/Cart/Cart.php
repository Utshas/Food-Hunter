<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 1/30/2017
 * Time: 2:09 PM
 */

namespace App\Cart;

use App\Message\Message;
use App\Model\Database as DB;
use App\Utility\Utility;
use PDO;
use PDOException;
class Cart extends DB
{
    private $id;
    private $user_email;
    private $order_id;
    private $food_name;
    private $quantity;
    private $serial;
    private $price;
    private $payment;


    public function setData($allPostData){

        $this->serial=$allPostData['serial'];


        if(array_key_exists("payment", $allPostData)){
            $this->payment= $allPostData['payment'];

        }

        if(array_key_exists("id", $allPostData)){
            $this->id= $allPostData['id'];

        }

        if(array_key_exists("price", $allPostData)){
            $this->price= $allPostData['price'];

        }

        if(array_key_exists("order_id", $allPostData)){
            $this->order_id= $allPostData['order_id'];

        }
        echo $this->serial;
        for($i=1;$i<=$this->serial;$i++)
        {   $h="food_name".$i;
            $q="quantity".$i;
            if(array_key_exists($h, $allPostData))
            {   $this->food_name .= $allPostData[$h]."-";
                if("$allPostData[$q]"==true)
                {echo "$allPostData[$q]";
                    $this->quantity .= $allPostData[$q]."-";}
                else
                    $this->quantity .= "1-";
            }


        }

    }


    public function store2(){
        $email = $_POST['email'];
        $array_data = array($email, $this->food_name,$this->quantity,$this->price,$this->payment);

        $sql = "INSERT INTO `order_list`(user_email, food_name,quantity,price,payment) VALUES (?,?,?,?,?)";
        $sth = $this->DBH->prepare($sql);
        $status = $sth->execute($array_data);

        if($status){
            echo "data stored!";
        }
        Utility::redirect('../FoodList/create.php');
    }

    public function index(){
        $email = $_SESSION['email'];
        $sql = "Select * from cart where user_email='".$email."'";
        $STH=$this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }


    public function trashed(){
        $sql = "Select * from Cart ";
        $STH=$this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }
    public function order(){
        $sql = "Select LAST from Cart ";
        $STH=$this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }
    public function delete(){
        $sql = "Delete from cart WHERE cart_id=".$this->id;
        $result =$this->DBH->exec($sql);

        if($result){
            Message::setMessage(" Data has been deleted successfully");
        }else{
            Message::setMessage(" Data has not been deleted");
        }
        Utility::redirect('trashed.php');

    }
    public function deleteMultiple($selectedIDsArray){


        foreach($selectedIDsArray as $id){

            $sql = "Delete from cart WHERE cart_id=".$this->id;

            $result = $this->DBH->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("Success! All Seleted Data Has Been  Deleted Successfully :)");
        else
            Message::message("Failed! All Selected Data Has Not Been Deleted  :( ");


        Utility::redirect('trashed.php');


    }



    public function view(){
        $sql = "Select * from cart where cart_id='".$this->id."'";
        $STH=$this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();


        Utility::redirect('trashed.php');
    }
}