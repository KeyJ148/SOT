<?php


class Answer{

    const NEW_LINE_ = '\n';
    const SEPARATOR = "\n";
    const SEPARATOR_BROWSER = '<br>';

    public $error = Errors::NOT_ERROR; //Код ошибки
    public $answers = array(); //Массив с ответами
    public $browser = false; //Вывод в браузер? (меняет \n на <br>)

    public function display(){
        $fullAnswer = $this->error . Answer::SEPARATOR . Errors::getText($this->error) . Answer::SEPARATOR . $this->getAnswerFormating();

        if ($this->browser) $fullAnswer = str_replace(Answer::SEPARATOR, Answer::SEPARATOR_BROWSER, $fullAnswer);
        echo $fullAnswer;
    }

    public function set($key, $value){
        $this->answers[$key] = $value;
    }

    public function getAnswerFormating(){
        $result = '';

        foreach ($this->answers as $key => $value) {
            $result .= $key . '=' . $value . Answer::SEPARATOR;
        }

        return $result;
    }

}