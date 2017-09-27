<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 1/30/2017
 * Time: 2:09 PM
 */

namespace App\Foodlist;

use App\Message\Message;
use App\Model\Database as DB;
use App\Utility\Utility;
use PDO;

class Foodlist extends DB
{
    private $user_email;
    private $food_name;
    private $quantity;
    private $serial;
    private $price=0;
    public $f;
    public function setData($allPostData=null){
        $this->serial= $allPostData['serial'];

        if(array_key_exists("id", $allPostData)){
            $this->id= $allPostData['id'];
        }
        if(array_key_exists("user_email", $allPostData)){
            $this->user_email= $allPostData['user_email'];

        }
        for($i=1;$i<$this->serial;$i++)
        {   $h="hobby".$i;
            $q="quantity".$i;
            $p="price".$i;
            if(array_key_exists($h, $allPostData))
            {   $this->food_name .= $allPostData[$h]."-";
                if("$allPostData[$q]"==true)
                {echo "$allPostData[$q]";
                    $this->quantity .= $allPostData[$q]."-";}
                else
                    $this->quantity .= "1-";

                $this->price=$this->price+($allPostData[$q]*$allPostData[$p]);
            }


        }

    }


    public function store(){
        $this->food_name=rtrim($this->food_name,"-");
        $this->quantity=rtrim($this->quantity,"-");
        $arrayData = array($this->user_email, $this->food_name, $this->quantity, $this->price);
        $query = 'INSERT INTO cart (user_email, food_name, quantity, price) VALUES (?,?,?,?)';


        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($arrayData);


        //if($result){
        //  Message::setMessage("Success! Data has been inserted successfully");
        //}else{
        // Message::setMessage("Failed! Data has not been inserted");
        //}

        Utility::redirect('../Cart/order.php');
    }

    public function index(){
        $sql = "Select * from items";
        $STH=$this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }


    public function trashed(){
        $sql = "Select * from hobby_info where soft_delete='yes'";
        $STH=$this->dbh->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }

    public function view(){
        $sql = "Select * from hobby_info where id=".$this->id;
        $STH=$this->dbh->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();


        Utility::redirect('index.php');
    }
}