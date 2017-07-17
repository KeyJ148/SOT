Storm of time game!

<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/db/CRUD.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/users.php";

echo "<br><br>CREATE:<br>";
$result = CRUD::create('pages', ['content', 'name', 'category_id', 'category'], ['cont', 'name', 14, true]);
var_dump($result);

echo "<br><br>READ:<br>";
$result = CRUD::read('pages', ['id'], ['1']);
var_dump($result);


echo "<br><br>READ BY ID:<br>";
$result = CRUD::read_by_id('pages', 3);
var_dump($result);

echo "<br><br>UPDATE:<br>";
$result = CRUD::update('pages', ['content', 'name'], ['cont2', 'name2'], ['content', 'name'], ['cont', 'name']);
var_dump($result);

echo "<br><br>DELETE:<br>";
$result = CRUD::delete('pages', ['content', 'name'], ['cont2', 'name2']);
var_dump($result);

echo "<br><br>===ORM===<br>";
echo "<br><br>LOAD_BY_ID:<br>";
var_dump(users::load_by_id(1));

echo "<br><br>LOAD:<br>";
$user = new users();
$user->db_login = "marran";
$user->db_role_id = 1;
$user->data = 1;
$user->data2 = 1;
$user->load();
var_dump($user);

echo "<br><br>CREATE:<br>";
$new_user = users::create();
var_dump($new_user);

echo "<br><br>SAVE:<br>";
$new_user->db_login = "new_login";
$new_user->db_role_id = "1";
$result = $new_user->save();
var_dump($result);

echo "<br><br>DELETE:<br>";
$result = $new_user->delete();
var_dump($result);