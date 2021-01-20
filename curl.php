<?php 

// Base Url
$baseUrl = 'https://sandbox.vtpass.com/api/';
$serviceID = 'mtn';
$username = 'YourVtpassEmail';
$password = 'YourPassword';

if(isset($_POST['pay'])){
    
    extract($_POST);
    $error = Array();
    // validate request
    empty($amount) || intval($amount) == null  ? array_push($error, 'Invalid amount') : null;
    empty($phone) || intval($phone) == null ? array_push($error, 'Invalid phone number') : null;

    $data = [
        'amount' => $amount,
        'phone' => $phone,
        'serviceID'   => $serviceID,
        'request_id' => rand(99999, 99999)
    ];

   $req = PostReq($baseUrl.'pay', $data,$username, $password);
   var_dump($req);
}

if(isset($_POST['check'])){
    extract($_POST);
    empty($phone) || intval($phone) == null ? array_push($error, 'Invalid phone number') : null;

    $data = [
        'serviceID'   =>$serviceID,
        'request_id'=>$phone
    ];
   var_dump(PostReq($baseUrl.'requery', $data, $username, $password));
}

function PostReq($url, $data = array(), $username, $password){
 
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);

    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}






?>