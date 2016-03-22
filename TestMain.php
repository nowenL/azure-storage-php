<?php
define('AZURE_ACCOUNT','longlutest');
define('AZURE_ACCOUNT_KEY','yesvozliijSTL3BkpI5068+5nsGiiaJp4Hf2lyodtUTrcJ/6jV5ID4CPCCmv6utMIsBgy9UzlUWvL7S/fjmP8w==');
define('AZURE_PROTOCOL','http');

require_once 'vendor/autoload.php';
// require_once 'WindowsAzure/WindowsAzure.php';


use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\Utilities;

uploadPageBlob('debug', 'phpblock');

function uploadPageBlob($container, $blobName)
{
	// $connectionString = 'DefaultEndpointsProtocol='.AZURE_PROTOCOL.';AccountName='.AZURE_ACCOUNT.';AccountKey='.AZURE_ACCOUNT_KEY;
	// $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
	
	// echo $connectionString;
	
	// $blobRestProxy->createContainer($container);
	
	//echo "create container";
	
	// create Block Blob with an image file
	$mimeBody = file_get_contents('input.txt');
	
	$boundaryRegex = '~boundary=(changesetresponse_.*)~';
	preg_match($boundaryRegex, $mimeBody, $matches);
	
	$boundary = trim($matches[1]);
	echo $boundary;
	// Split the requests
	$requests = explode('--' . $boundary, $mimeBody);
	
	var_dump($requests);
	
	// Get the body of each request
	$result = array();
	 
	// The first and last element are not request
	for($i = 1; $i < count($requests) - 1; $i++)
	{
		// Split the request header and body
		preg_match("/^.*?\r?\n\r?\n(.*)/s", $requests[$i], $matches);
		$result[] = trim($matches[1]);
	}
		
	var_dump($result);
	
	return;
	
	// $content = fopen("test.data", "r");
	
    // $content = "This is a really long section of text needed for this test.";
	// Note this grows fast, each loop doubles the last run. Do not make too big
    // This results in a 1888 byte string, divided by 50 results in 38 blocks
	/*
	for($i = 0; $i < 18; $i++){
		$content .= $content;
	}
	
	echo strlen($content);
	
	$result = $blobRestProxy->createBlockBlob($container, $blobName, $content, null);
	
	echo $result->getLastModified()->format('Y-m-d H:i:s');
	*/
}
?>