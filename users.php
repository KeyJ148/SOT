<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/db/ORM.php";

class users{

    use ORM;

    public $db_id;
    public $db_login;
    public $db_password;
    public $db_sault;
    public $db_role_id;

    public $data;
    public $data2;
}