<?php
/**
 * Created by PhpStorm.
 * User: titu
 * Date: 2/8/17
 * Time: 10:11 AM
 */

require  'MongoDB.php';
class Mongolib
{

    public function __construct()
    {
        $this->db = MongoApi::getInstance()->getConnection();
    }

}