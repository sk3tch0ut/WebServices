<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sample
 *
 * @author Joshua Clifford Reyes
 */

error_reporting(E_ERROR);

require_once realpath(dirname(__FILE__) .'/..') .'/libraries/API.php';

use Libraries\API;
use Libraries\APIStatus;
use Libraries\APIConstant;
use Libraries\APIValidator;
use Libraries\APIUtilities;

APIUtilities::setHeader();
APIUtilities::setMethod('GET');

APIUtilities::setResponse(
	APIConstant::HTTP_OK, 
	APIStatus::SUCCESS, 
	'Default Implementation Example of API RESTful'
);

error_reporting(0);