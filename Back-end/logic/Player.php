<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Player {

    use ORM;

    public $db_user_id;
    public $db_person_id;
    public $db_scroll_id;

}