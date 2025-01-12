<?php
function view($path, $params=[]){
    extract($params);
    return  require "app/views/{$path}.view.php";
}

function dd($var){
    var_dump($var);
}

function isUserLoggedIn() { 
    return isset($_SESSION['user']);
}