<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Object {

    use ORM;

    public $db_local_position_x;
    public $db_local_position_y;
    public $db_type_object_id;

}