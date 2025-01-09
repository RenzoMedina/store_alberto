<?php

function view($path, $params=[]){
    extract($params);
    require "App/Views/{$path}.view.php";
}