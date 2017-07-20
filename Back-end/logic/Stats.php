<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/ORM.php";

class Stats {

    use ORM;

    public $db_max_hp;
    public $db_pDmg, $db_mDmg;
    public $db_pDef, $db_mDef;
    public $db_pDefBlock, $db_mDefBlock;
    public $db_accuracy, $db_evasion;
    public $db_speedReload;
    public $db_speedRun;
    public $db_loadCapacity;

}