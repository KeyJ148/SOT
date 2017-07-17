<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/db/CRUD.php";

trait ORM {

    //Возвращает новый объект этого класса с уже присвоеным id
    public static function create(){
        $name = get_called_class();
        $id = CRUD::create($name);

        $object = new $name();
        $object->db_id = $id;

        return $object;
    }

    //Возвращает объект этого класса c этим id и с присвоеными остальными параметрами
    public static function load_by_id($id){
        $name = get_called_class();
        $result = CRUD::read_by_id($name, $id);

        $object = new $name();
        foreach ($result as $key => $value){
            $var_name = "db_".$key;
            $object->$var_name = $value;
        }

        return $object;
    }

    //Находит в базе первый объект этого класса у которого совпадают все не NULL параметры начинающиеся с db_
    //Заполняет все пустые поля и возвращает true, если такой объект был найден и false в противном случае
    public function load(){
        $name = get_called_class();
        $vars = get_class_vars($name);
        $column_array = [];
        $values_array = [];

        foreach ($vars as $key => $value){
            $value = $this->$key;
            if (substr($key, 0, 3) != "db_" || $value == NULL) continue;

            $column_array[] = substr($key, 3);
            $values_array[] = $value;
        }

        $result = CRUD::read($name, $column_array, $values_array);
        if (!$result) return false;

        foreach ($result as $key => $value){
            $var_name = "db_".$key;
            $this->$var_name = $value;
        }

        return true;
    }

    //Находит в базе объект этого класса с таким же id как у него и заменяет у него все параметры на параметры класса
    //начинающиеся с db_, даже если этот параметр равен NULL
    public function save(){
        $name = get_called_class();
        $vars = get_class_vars($name);
        $column_array = [];
        $values_array = [];

        foreach ($vars as $key => $value){
            $value = $this->$key;
            if (substr($key, 0, 3) != "db_" || $key == "db_id") continue;

            $column_array[] = substr($key, 3);
            $values_array[] = $value;
        }

        return CRUD::update($name, $column_array, $values_array, ["id"], [$this->db_id]);
    }

    //Находит в базе объект этого класса с таким же id как у него и удаляет его
    public function delete(){
        $name = get_called_class();

        if (!isset($this->db_id)) $this->load();

        return CRUD::delete_by_id($name, $this->db_id);
    }
}