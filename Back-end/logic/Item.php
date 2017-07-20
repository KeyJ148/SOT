<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Item {

    use ORM;

    public $db_type_item_id;
    public $db_effect_id;
    public $db_max_stones;
    public $db_stones_id;
    public $db_grade;

}