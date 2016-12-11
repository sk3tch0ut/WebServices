<?php

error_reporting(E_ALL);

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/..'));

require_once APPLICATION_PATH .'/libraries/APIAutoLoader.php';
require_once APPLICATION_PATH .'/libraries/APIConstant.php';
require_once APPLICATION_PATH .'/libraries/APIException.php';
require_once APPLICATION_PATH .'/libraries/APIStatus.php';
require_once APPLICATION_PATH .'/libraries/APIUtilities.php';
require_once APPLICATION_PATH .'/libraries/APIValidator.php';

use Libraries\APIAutoLoader;

$autoload = new APIAutoLoader();

# PLUGINS
# webse-fm routings
$autoload->routes('webse-fm', 
[
	
	'Enlighten/Database' => [

	],
	
	'Enlighten/Encryption' => [
		'OpenSSLEncrypter'
	],
	
	'Enlighten/Hashing' => [
		'BycryptHasher',
		'DefaultHasher'
	]
])->load();