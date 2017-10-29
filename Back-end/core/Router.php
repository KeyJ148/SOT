<?php


class Router{

    public $answer;

    public function route(){
        $this->answer = new Answer();
        if (isset($_GET['browser'])) $this->answer->browser = true;

        if (!isset($_GET['method']) || empty($_GET['method'])){
            $this->answer->error = Errors::METHOD_EMPTY;
            return;
        }

        $class_name = METHODS_PREFIX . $_GET['method'];
        if (!__autoload($class_name)){
            $this->answer->error = Errors::METHOD_NOT_EXIST;
            return;
        }

        $method = new $class_name($this->answer);
        if (!$method->have_parameters()){
            $this->answer->error = Errors::PARAMETER_EMPTY;
            return;
        }

        if (!$method->setGameCharacter()){
            $this->answer->error = Errors::NOT_VALID_TOKEN;
            return;
        }

        $method->call();
    }
}