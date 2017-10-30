<?php

abstract class Method {

    public $person;//Содержит ORM объект пользователя, вызвавшего метод
    public $game_character;//Содержит ORM объект игрового персонажа, вызвавшего метод
    public $answer;//Содержит ответ на вызов метода

    public function __construct($answer){
        $this->answer = $answer;
    }

    //Вызывается при вызове данного метода API
    public abstract function call();

    //Возвращает все необходимые параметры для данного метода в виде массива
    public abstract function get_need_parameters();

    //Проверяет, присутствуют ли в GET запросе все необходимые параметры
    public function have_parameters(){
        $array = $this->get_need_parameters();
        foreach ($array as $parameter){
            if (!isset($_GET[$parameter])) return false;
        }

        return true;
    }

    //Ищет в БД персонажа с переданным токеном и устанавливает в player_character и person, возвращает false в случае неудачи
    public function setGameCharacter(){
        if (!isset($_GET['token']) || empty($_GET['token'])) return false;
        $token = $_GET['token'];

        $this->game_character = new ORM_GameCharacter();
        $this->game_character->db_token = $token;
        //Внимание! Загружает без учета регистра, поэтому требуется дополнительное сравнение
        if (!$this->game_character->load() || $token !== $this->game_character->db_token) return false;

        $this->person = ORM_Person::load_by_id($this->game_character->db_person_id);
        return true;
    }

}