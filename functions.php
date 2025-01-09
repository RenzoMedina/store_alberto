<?php
function view($path, $params=[]){
    extract($params);
    require "app/views/{$path}.view.php";
}