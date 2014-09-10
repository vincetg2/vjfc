<?php

class Arh
{

public static function exec($url, $title)
{

$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if($ajax)
{
    if(!isset($title)) $title = '';
    echo "<title>$title</title>\n";
    echo '<a href="' . $url . '"><li class="active">';
    exit;
}

}

}
