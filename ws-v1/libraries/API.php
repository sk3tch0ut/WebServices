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

class API {
	
	const AUTHOR  = 'RJC (LordDashMe)';
	const VERSION = 'v1.0.0';
}

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/..'));

require_once APPLICATION_PATH .'/libraries/APIConstant.php';
require_once APPLICATION_PATH .'/libraries/APIException.php';
require_once APPLICATION_PATH .'/libraries/APIStatus.php';
require_once APPLICATION_PATH .'/libraries/APIUtilities.php';
require_once APPLICATION_PATH .'/libraries/APIValidator.php';