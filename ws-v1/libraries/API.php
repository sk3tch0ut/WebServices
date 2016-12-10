<?php

namespace Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of API
 *
 * @author Joshua Clifford Reyes
 */

error_reporting(E_ALL);

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/..'));

class API {
	
	const AUTHOR  = 'RJC';
	const VERSION = 'v1.0.0';

	/**
	 * Route list.
	 *
	 * @var array
	 */
	private $routes;

	/**
	 * Set routes.
	 *
	 * @param array $routes
	 * @return class context
	 */
	public function routes(array $routes) {
		
		$this->routes = $routes;

		return $this;
	}

	/**
	 * Time and Space Complexity is O(n^2).
	 *
	 * @return void
	 */
	public function load() {

		foreach ($this->routes as $folder => $subfolder) {
			foreach ($subfolder as $class) {
				$path = realpath(APPLICATION_PATH .'/libraries/plugins/webse-fm/src/Enlighten/'. $folder. '/'. $class .'.php');
	    		require_once($path);
			}
		}
	}
}

require_once APPLICATION_PATH .'/libraries/APIConstant.php';
require_once APPLICATION_PATH .'/libraries/APIDatabase.php';
require_once APPLICATION_PATH .'/libraries/APIException.php';
require_once APPLICATION_PATH .'/libraries/APIStatus.php';
require_once APPLICATION_PATH .'/libraries/APIUtilities.php';
require_once APPLICATION_PATH .'/libraries/APIValidator.php';

$api = new API();

# webse-fm routings
$api->routes([
	'Database' => [

	],
	'Encryption' => [
		'OpenSSLEncrypter'
	],
	'Hashing' => [
		'BycryptHasher',
		'DefaultHasher'
	]
])->load();