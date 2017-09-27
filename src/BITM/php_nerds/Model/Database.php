<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 2/19/2017
 * Time: 6:17 PM
 */

namespace App\Model;
use PDO,PDOException;

class Database
{
    public $DBH;

    public function __construct()
    {
        try{
            $this->DBH = new PDO('mysql:host=localhost;dbname=food_hunter',"root","");
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error){
            echo "Database Connection Failed!".$error->getMessage();

        }
    }

}