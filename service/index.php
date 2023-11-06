<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include_once 'controller/RatingController.php';
include_once 'controller/AdminController.php';

//# Request Header
$requestData = json_decode(file_get_contents("php://input"));
$function = $requestData->route;

//# Request Methods
$RatingController = new RatingController();
$RatingMethod = (method_exists($RatingController, $function));

$AdminController = new AdminController();
$AdminMethod = (method_exists($AdminController, $function));

//# Request Response
if($RatingMethod){
    
    $json = $RatingController->$function($requestData);

}else if($AdminMethod){

    $json = $AdminController->$function($requestData);

}else{
    $json = $function.' not found';
}

header('Content-type: application/json');
echo json_encode($json);

