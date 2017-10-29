<?php

class M_Auth extends Method {

    public function get_need_parameters(){
        return array('login', 'password');
    }

    public function setGameCharacter(){
        return true;
    }

    public function call(){
        $login = $_GET['login'];
        $password = $_GET['password'];

        $person = new ORM_Person();
        $person->db_login = $login;
        if (!$person->load()){
            $this->error = Errors::AUTH;
            return;
        }

        $hash = hash('SHA256', $password . $person->db_sault);
        if ($hash !== $person->db_password){
            $this->error = Errors::AUTH;
            return;
        }

        $gameCharactersFilter = new ORM_GameCharacter();
        $gameCharactersFilter->db_person_id = $person->db_id;
        $gameCharacters = $gameCharactersFilter->loadAll();
        for ($i=0; $i<count($gameCharacters); $i++){
            $gameCharacters[$i]->db_token = $this->getSault(64);
            $gameCharacters[$i]->save();
            $this->answer->set('token_' . $i, $gameCharacters[$i]->db_token);
        }
    }

    private function getSault($length = 32){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

}