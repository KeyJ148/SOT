<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Equipment {

    use ORM;

    public $db_item_id;
    public $db_position_id;

}