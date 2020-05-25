<?php
    // session_start() ;
    require_once 'Facebook/autoload.php' ;

    $FB = new \Facebook\Facebook([
            'app_id'      => '550537108941720' ,
            'app_secret'  => 'dd615585c40dfc735bf64f23a8eb4979' ,
            'default_graph_version' => 'v7.0'
    ]);

    $helper = $FB->getRedirectLoginHelper() ;
?>