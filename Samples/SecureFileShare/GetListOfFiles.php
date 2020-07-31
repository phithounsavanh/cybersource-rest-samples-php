<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '../../vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../../Resources/ExternalConfiguration.php';

function GetListOfFiles()
{
	$startDate = "2020-03-20";
	$endDate = "2020-03-30";
	$organizationId = "testrest";
	$name = null;

	$commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
	$merchantConfig = $commonElement->merchantConfigObject();

	$api_client = new CyberSource\ApiClient($config, $merchantConfig);
	$api_instance = new CyberSource\Api\SecureFileShareApi($api_client);

	try {
		$apiResponse = $api_instance->getFileDetail($startDate, $endDate, $organizationId, $name);
		print_r(PHP_EOL);
		print_r($apiResponse);

		return $apiResponse;
	} catch (Cybersource\ApiException $e) {
		print_r($e->getResponseBody());
		print_r($e->getMessage());
	}
}

if(!defined('DO_NOT_RUN_SAMPLES')){
	echo "\nGetListOfFiles Sample Code is Running..." . PHP_EOL;
	GetListOfFiles();
}
?>
