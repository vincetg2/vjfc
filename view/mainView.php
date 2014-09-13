<?php
    require_once('ajax/ajaxResponseHandler.php');
    Arh::exec($url, $title);
    
    require_once('templates/mainLayout.php');
