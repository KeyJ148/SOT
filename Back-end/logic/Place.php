<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Place {

    use ORM;

    public $db_position_x;
    public $db_position_y;
    public $db_name;
    public $db_map_id;

}