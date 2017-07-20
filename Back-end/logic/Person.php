<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Person {

    use ORM;

    public $db_game_session_id;
    public $db_equipment_id;
    public $db_is_mob;
    public $db_is_npc;
    public $db_position_x;
    public $db_position_y;
    public $db_local_position_x;
    public $db_local_position_y;
    public $db_stats_id;
    public $db_effect_id;
    public $db_map_id;
    public $db_skill_id;
    public $db_race_id;
    public $db_hp;

}