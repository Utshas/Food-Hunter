<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 00.46
 */

namespace App\Admin;
use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;

use PDO;
use PDOException;

class AddItem extends DB
{
    public $item_id;
    public $item_name;
    public $item_ingredients;
    public $item_price;
    public $item_picture;
    public $soft_deleted;

    public $order_start_time;
    public $order_ending_time;
    public $dinner_start_time;
    public $dinner_ending_time;

    public function time_set_data($post_data){
        if(array_key_exists('order_start_time', $post_data)) {
            $this->order_start_time = $post_data['order_start_time'];
            }

        if(array_key_exists('order_ending_time', $post_data)) {
            $this->order_ending_time = $post_data['order_ending_time'];
        }

        if(array_key_exists('dinner_start_time', $post_data)) {
            $this->dinner_start_time = $post_data['dinner_start_time'];
        }

        if(array_key_exists('dinner_ending_time', $post_data)) {
            $this->dinner_ending_time = $post_data['dinner_ending_time'];
        }
    }

    public function store_time(){
        $data_array = array($this->order_start_time, $this->order_ending_time, $this->dinner_start_time, $this->dinner_ending_time);
        $sql = "INSERT INTO `order_time`(`lunch_start`,`dinner_start`,`lunch_ending`,`dinner_ending`) VALUES (?,?,?,?)";
        $sth = $this->DBH->prepare($sql);
        $sth->execute($data_array);

    }

    public function set_data($post_data){
        if(array_key_exists('item_id',$post_data)){
            $this->item_id = $post_data['item_id'];
        }

        if(array_key_exists('item_name',$post_data)){
            $this->item_name = $post_data['item_name'];
        }

        if(array_key_exists('item_ingredients',$post_data)){
            $this->item_ingredients = $post_data['item_ingredients'];
        }

        if(array_key_exists('item_price',$post_data)){
            $this->item_price = $post_data['item_price'];
        }

        if(array_key_exists('item_picture',$post_data)){
            $this->item_picture = $post_data['item_picture'];
        }
        return $this;
    }


    public function store(){
        $data_array = array($this->item_id, $this->item_name, $this->item_ingredients, $this->item_price, $this->item_picture);
        $sql = "INSERT INTO items(item_id, item_name, item_ingredients, item_price, item_picture) VALUES (?,?,?,?,?)";
        $sth = $this->DBH->prepare($sql);
        $store = $sth->execute($data_array);

        if($store){
            Message::message("item has been added to the list sucessfully!");
        }else{
            Message::message("item has not been added to the list!");
        }
        Utility::redirect("add_item.php");

    }

    public function all_item(){
        $sql = "SELECT * FROM items WHERE soft_deleted='No'";
        $sth = $this->DBH->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }

    public function single_item(){

        $sql = "SELECT * FROM items WHERE item_id='".$this->item_id."'";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $sth = $STH->fetch();
        $row = $STH->rowCount();
        if($row>0){
            echo "$this->item_id nong id has been selected!";
            return $sth;
        }else{
            echo "no data has been selected!!";
            return FALSE;
        }
    }

    public function get_email_list(){
        $sql = "SELECT * FROM user";
        $sth = $this->DBH->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }

    public function update(){
        $data_array = array($this->item_name, $this->item_ingredients, $this->item_price, $this->item_picture);
        $sql = "UPDATE items SET item_name=?,item_ingredients=?,item_price=?, item_picture=?
                WHERE item_id='".$this->item_id."'";
        $sth = $this->DBH->prepare($sql);
        $sth->execute($data_array);

        Utility::redirect("item_list.php");
    }

    public function soft_delete(){
        $sql = "UPDATE items SET soft_deleted='Yes' WHERE item_id=".$this->item_id;
        $sth = $this->DBH->exec($sql);
        if($sth){
            Message::message("Item has been putted into trash box!");
            Utility::redirect("item_list.php");
        }else{
            Message::message("Something went wrong, try again!");
            Utility::redirect("item_list.php");
        }
    }

    public function recover(){

        $sql = "UPDATE  `items` SET soft_deleted='No' WHERE `item_id`=".$this->item_id;

        $result = $this->DBH->exec($sql);



        if($result)
            Message::message("Success! Data Has Been Recovered Successfully :)");
        else
            Message::message("Failed! Data Has Not Been Recovered  :( ");


        Utility::redirect('item_trash_box.php');


    }

    public function trashed_items(){
        $sql = "SELECT * FROM items WHERE soft_deleted='Yes'";
        $sth = $this->DBH->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }

    public function delete(){
        $sql ="DELETE FROM items WHERE soft_deleted='Yes' AND item_id=".$this->item_id;
        $sth =$this->DBH->exec($sql);
        if($sth){
            Message::message("data has been successfuly deleted!");
            Utility::redirect("item_trash_box.php");
        }else{
            echo "data has not been permanently deleted!";
        }
    }

    public function ordered_list(){
        $sql = "SELECT * FROM cart";
        $sth = $this->DBH->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $ordered_list = $sth->fetchAll();
        $row_number = $sth->rowCount();
        if($row_number>=0){
            return $ordered_list;
        }else{
            return FALSE;
        }
    }

    public function transaction(){
        $sql = "SELECT * FROM order_list WHERE `payment`='bkash' OR `payment`='hand' AND `delivered`='yes'";
        $sth = $this->DBH->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $rows = $sth->fetchAll();
        $row_number = $sth->rowCount();
        if($row_number>=0){
            return $rows;
        }else{
            Message::message("No order has been made today, yet!");
            return FALSE;
        }

    }

    //alluser list getting method

    public function all_users(){
        $sql = "SELECT * FROM user WHERE email_verified='Yes'";
        $sth = $this->DBH->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }

    public function user_list_pagination($page=1,$itemsPerPage=3){
        try{

            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from `user`  WHERE soft_deleted = 'No' AND `email_verified`='Yes' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from `user`  WHERE soft_deleted = 'No' ";

        }

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }

    public function item_list_pagination($page=1,$itemsPerPage=3){
        try{

            $start = (($page-1) * $itemsPerPage);
            if($start<0) $start = 0;
            $sql = "SELECT * from `items`  WHERE soft_deleted = 'No' LIMIT $start,$itemsPerPage";



        }catch (PDOException $error){

            $sql = "SELECT * from `items`  WHERE soft_deleted = 'No' ";

        }

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }

    public function get_all_keywords(){

        $_all_keywords[] = array();
        $_words_array[] = array();

        $all_items_array = $this->all_item();

        foreach($all_items_array as $one_item){
            $_words_array[] = trim($one_item->item_name);
        }

        foreach($all_items_array as $one_item){
            $_words_array[] = trim($one_item->item_price);
        }



        return $_words_array;
    }

    public function get_all_user_keywords(){

        $_all_keywords[] = array();
        $_words_array[] = array();

        $all_items_array = $this->all_users();

        foreach($all_items_array as $one_item){
            $_words_array[] = trim($one_item->name);
        }

        foreach($all_items_array as $one_item){
            $_words_array[] = trim($one_item->email);
        }

        foreach($all_items_array as $one_item){
            $_words_array[] = trim($one_item->gender);
        }

        foreach($all_items_array as $one_item){
            $_words_array[] = trim($one_item->address);
        }



        return $_words_array;
    }


    public function search($request_array){
        $sql = "";
        if(isset($request_array['search'])){
            //$search = $request_array['search'];
            $sql = "SELECT * FROM `items` WHERE `soft_deleted` ='No' AND `item_name` LIKE '%".$request_array['search']."%' OR `item_price` LIKE '%".$request_array['search']."%'";
            $sth = $this->DBH->query($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            return $sth->fetchAll();
    }else{
            return FALSE;
        }
    }

    public function search_user($request_array){
        $sql = "";
        if(isset($request_array['search'])){
            //$search = $request_array['search'];
            $sql = "SELECT * FROM `user` WHERE `email_verified` ='Yes' AND (`name` LIKE '%".$request_array['search']."%' OR `email` LIKE '%".$request_array['search']."%'
            OR `address` LIKE'%".$request_array['search']."%' OR `gender` LIKE '%".$request_array['search']."%') ";
            $sth = $this->DBH->query($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            return $sth->fetchAll();
        }else{
            return FALSE;
        }
    }


}