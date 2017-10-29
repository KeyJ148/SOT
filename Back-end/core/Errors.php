<?php

class Errors{

    const NOT_ERROR = 0;

    const NOT_VALID_TOKEN = 1;
    const AUTH = 2;
    const METHOD_EMPTY = 3;
    const METHOD_NOT_EXIST = 4;
    const PARAMETER_EMPTY = 5;

    public static function getText($error){
        switch ($error){
            case Errors::NOT_ERROR: return "ОК";
            case Errors::NOT_VALID_TOKEN: return "Не валидный токен";
            case Errors::AUTH: return "Неверный логин или пароль";
            case Errors::METHOD_EMPTY: return "Не был передан метод";
            case Errors::METHOD_NOT_EXIST: return "Вызываемый метод не существует";
            case Errors::PARAMETER_EMPTY: return "Не все необходимые параметры были переданы";
        }
    }

}