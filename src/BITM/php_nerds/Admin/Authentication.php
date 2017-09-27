<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 21-02-17
 * Time: 13.53
 */

namespace App\Admin;
use App\Model\Database as DB;
use App\Message\Message;
use App\Utility\Utility;
if(!isset($_SESSION)) {
    session_start();
}


class Authentication extends DB
{
    public $admin_email="";
    public $admin_password="";

    public function set_data($post_data = array()){
        if(array_key_exists('admin_email',$post_data));{
            $this->admin_email = $post_data['admin_email'];
        }

        if(array_key_exists('admin_password',$post_data)){
            $this->admin_password = md5($post_data['admin_password']);
        }

        return $this;
    }



    public function is_exist(){
        $query="SELECT * FROM admin WHERE admin.admin_email = :admin_email";
        $STH=$this->DBH->prepare($query);
        $STH->execute(array(':admin_email'=>$this->admin_email));

        $count = $STH->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $sql = "SELECT * FROM admin WHERE admin_email = :admin_email AND admin_password = :admin_password";
        $sth = $this->DBH->prepare($sql);
        $sth->execute(array(':admin_email'=>$this->admin_email, ':admin_password'=>$this->admin_password));

        $count = $sth->rowCount();

        if($count>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function logged_in(){
        if(array_key_exists('admin_email',$_SESSION) && (!empty($_SESSION['admin_email']))){
            Return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['admin_email'] = "";
        return TRUE;
    }
}