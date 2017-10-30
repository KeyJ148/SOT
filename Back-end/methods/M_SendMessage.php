<?php


class M_SendMessage extends Method {

    public function get_need_parameters(){
        return array('text');
    }

    public function call(){
        $text = $_GET['text'];

        $message = ORM_Message::create();
        $message->db_game_character_id = $this->game_character->db_id;
        $message->db_text = $text;
        $message->db_time = round(microtime(true)*1000);
        $message->save();
    }

}