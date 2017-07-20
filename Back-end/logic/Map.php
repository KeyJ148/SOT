<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Map {

    use ORM;

    public $db_name;
    public $db_text;
    public $db_object_id;

}