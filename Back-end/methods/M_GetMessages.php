<?php


class M_GetMessages extends Method {

    public function get_need_parameters(){
        return array('game_session', 'from_time');
    }

    public function call(){
        $game_session = $_GET['game_session'];
        $from_time = $_GET['from_time'];

        $gameCharacterFilter = new ORM_GameCharacter();
        $gameCharacterFilter->db_game_session_id = $game_session;
        $gameCharacters = $gameCharacterFilter->loadAll();

        $allMessages = array();
        for ($i=0; $i<count($gameCharacters); $i++){
            $messageFilter = new ORM_Message();
            $messageFilter->db_game_character_id = $gameCharacters[$i]->db_id;
            $allMessages = array_merge($allMessages, $messageFilter->loadAll());
        }

        for ($i=0; $i<count($allMessages); $i++){
            if ($allMessages[$i]->db_time < $from_time) unset($allMessages[$i]);
        }

        $i=0;
        foreach ($allMessages as $message){
            $this->answer->set('message_' . $i, $message->db_text);
            $this->answer->set('time_' . $i, $message->db_time);
            $i++;
        }
    }

}