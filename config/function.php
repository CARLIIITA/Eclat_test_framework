<?php 
function dd($var){
    echo '<pre>';
    var_dump($var);
    echo '<pre>';
    die;

}
function dump($var){
    echo '<pre>';
    var_dump($var);
    echo '<pre>';
    die;

}
function redirectoRoute($route){
    http_response_code(303);
    header("Location : {$route}");
    exit;
}

function setFlash($message){
    $_SESSION['flash_message'] = $message;
}

function getFlash(){
    if (isset($_SESSION['flash_message'])){
        echo "<div class='alert alert-danger>{$_SESSION['flash_message']}</div>";
        unset($_SESSION['flash_message']);
    }
}

?>