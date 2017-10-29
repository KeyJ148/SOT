<?php

abstract class Method {

    public $person;//Содержит ORM объект пользователя, вызвавшего метод
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
            if (!isset($_GET[$parameter]) || empty($_GET[$parameter])) return false;
        }

        return true;
    }

    //Ищет в БД пользователя с переданным токеном и устанавливает в person, возвращает false в случае неудачи
    public function setPerson(){
        if (!isset($_GET['token']) || empty($_GET['token'])) return false;
        $token = $_GET['token'];

        $this->person = new ORM_Person();
        $this->person->db_token_api = $token;

        //Внимание! Загружает без учета регистра, поэтому требуется дополнительное сравнение
        return ($this->person->load() && $token === $this->person->db_token_api);
    }

}