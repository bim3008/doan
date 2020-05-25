<?php
    require_once 'lib/session.php' ;
// use Facebook\Facebook;
if (!session_id()) {
    session_start();
}

session_status() ;
require_once 'config.php' ;

    try
    {
        $accessToken = $helper->getAccessToken() ;
    } catch(\Facebook\Exceptions\FacebookResponseException $e){
        echo "Response Exceptions" . $e->getMessage() ;
        exit();
    } catch(\Facebook\Exceptions\FacebookSDKException $e){
        echo "SDK Exceptions" . $e->getMessage() ;
        exit();
    }

    if(!$accessToken)
    {
        header('location: login.php') ;
        exit();
    }

    $oAuth2Client = $FB->getOAuth2Client();
    if(!$accessToken ->isLongLived())
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken) ;
    
    $response = $FB->get("me?fields=id,name,email",$accessToken->getValue()) ;

    $userData = $response->getGraphNode()->asArray() ;
   
 
    // $_SESSION['userData']    = $userData ; 
    // $_SESSION['accesstoken'] = $accessToken;

    session::set('userData',$userData);
    session::set('accesstoken',$accessToken);
    header('location:index.php');
    exit();


?>