<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
	'slim' => array(
		'templates.path' => __DIR__.'/templates',
		'log.enabled' => false,
	),
	'view' => new \Slim\Views\Twig(),
	'some.api.key' => 'hjhk')
);

//$view = $app->view();


$app->setName('MyRouterApp');

$app->get('/', function () use ($app) {
   $app->render('index/index.html');
});

$app->get('/login', function () use ($app) {
     $app->render('login/login.php');
});

$app->get('/institution', function () use ($app) {
     $app->render('institution/institution.php');
});

$app->get('/profile/:aadhaarId', function ($aadhaarId) use ($app) {
	//Fetch the userdetails from Parse APIs

	 $url = 'https://api.parse.com/1/users';  
	 $appId = '6dlJGFlCY3dDn3cNU9d1HPKrvWzA6GhitE7FEYdt';  
	 $restKey = 'zJVeYPOAPBq4pDJOeYM7eFbefLeDgs6KU2cJ3zGi';  
	 $headers = array(  
	   "Content-Type: application/json",  
	   "X-Parse-Application-Id: " . $appId,  
	   "X-Parse-REST-API-Key: " . $restKey  
	 );  
	 $data = 'where={"username":"'.$aadhaarId.'"}';  
	 //echo $data;
	 $rest = curl_init();  
	 curl_setopt($rest,CURLOPT_URL,$url.'?'.$data);
	 curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);  
	 curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
	 curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
	 $response = curl_exec($rest);  
	 $jsonResponse = json_decode($response, true);
	 //print_r($jsonResponse); 
	 curl_close($rest); 

		$app->render('profile/profile.php',array(
    	'aadhaarId' => $aadhaarId,
    	'userFName' => $jsonResponse['results'][0]['userFirstName'],
    	'userLName' => $jsonResponse['results'][0]['userLastName'],
    	'userDob' => $jsonResponse['results'][0]['dob']['iso'],
    	'userGender' => $jsonResponse['results'][0]['gender'],
    	'userQualification' => $jsonResponse['results'][0]['qualification'],
    	'userEmail' => $jsonResponse['results'][0]['email'],
    	'userDescription' => $jsonResponse['results'][0]['description'],
    	'userPicturePath' => $jsonResponse['results'][0]['profilePicture']['url'],
    	'userProfileQR' => $jsonResponse['results'][0]['profileQR']['url']

    	));
});

$app->get('/myProfile', function () use ($app) {
     $app->render('myProfile/myProfile.php');

   });

$app->notFound(function () use ($app) {
    $app->render('404.html');
});

$app->run();

?>
