<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Effect {

    use ORM;

    public $db_type_effect_id;
    public $db_add_stats_id;
    public $db_multi_stats_id;
    public $db_time_to_end;
    public $db_endless;

}