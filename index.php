Storm of time game!<br><br>

<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/db/CRUD.php";

echo "<br>CREATE: <br>";
$result = CRUD::create('pages', ['content', 'name', 'category_id', 'category'], ['cont', 'name', 14, true]);
var_dump($result);

echo "<br>READ: <br>";
$result = CRUD::read('pages', ['id'], ['1']);
echo "<br>";
mysqli_num_rows($result);
var_dump($result);
echo "<br>";
$result = mysqli_fetch_assoc($result);
var_dump($result);


echo "<br>READ BY ID: <br>";
$result = CRUD::read_by_id('pages', 3);
echo "<br>";
mysqli_num_rows($result);
var_dump($result);
echo "<br>";
$result = mysqli_fetch_assoc($result);
var_dump($result);

echo "<br>UPDATE: <br>";
$result = CRUD::update('pages', ['content', 'name'], ['cont2', 'name2'], ['content', 'name'], ['cont', 'name']);
var_dump($result);

echo "<br>DELETE: <br>";
$result = CRUD::delete('pages', ['content', 'name'], ['cont2', 'name2']);
var_dump($result);