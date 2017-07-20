<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class GameSession {

    use ORM;

    public $db_active;
    public $db_place_id;
    public $db_number_biom;
    public $db_type_biom_id;

}