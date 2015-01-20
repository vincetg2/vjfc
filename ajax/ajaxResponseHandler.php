<?php

class Arh
{

public static function exec($url, $title)
{

$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if(!$ajax) return;
if($url == 'tickets' && isset($_POST) && $_POST)
{
    $response = array('success' => false, 'error' => 'generic');
    
    ob_start();
    require_once('templates/rsvp.php');
    $html = ob_get_clean();
    if(is_string($html) && isset($html[0]) && $html[0] == '<')
        $response = array('success' => true, 'html' => $html);
    else
        $response['error'] = $html;
    
    echo json_encode($response);
    exit;
}

if(!isset($title)) $title = '';
echo "<title>$title</title>\n";
echo '<a href="' . $url . '"><li class="active">';
exit;

}

}
