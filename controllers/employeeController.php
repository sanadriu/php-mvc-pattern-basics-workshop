<?php

require_once(MODELS . "/employeeModel.php");

if (!isset($_REQUEST["action"])) return error("No action has been specified");

$action = $_REQUEST["action"];

if (!function_exists($action)) return error("Action not found");

call_user_func($action, $_REQUEST);


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

function getAllEmployees()
{
	$response = get();

	if ($response["errCode"]) return error($response["errCode"]);

	var_dump($response["data"]);
}

function getEmployee($request)
{
	if (!isset($request["id"])) return error("ID not specified");

	$response = getById($request["id"]);

	if ($response["errCode"]) return error($response["errCode"]);

	var_dump($response["data"]);
}

function error($errorMsg)
{
	require_once(VIEWS . "/error/error.php");

	echo $errorMsg;
}
