<?php

// TODO use real MVC framework

try 
{
	require_once 'initialize.php';

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	switch($requestMethod)
	{
		case 'GET':
			require_once 'MessagesCtrl/load.php';
			break;
		case 'POST':
		case 'PUT':
			$data = file_get_contents("php://input");
			$message = json_decode($data);
			require_once $requestMethod == 'POST' ? 
				'MessagesCtrl/add.php' : 
				'MessagesCtrl/update.php';
			break;
		case 'DELETE':
			require_once 'MessagesCtrl/remove.php';
			break;
		default: 
			throw new Exception('The request method used is not defined');
	}
}
catch(Exception $e) {
	echo json_encode(array(
		'type' => 'error',
		'error' => $e->getMessage()
	));
}
