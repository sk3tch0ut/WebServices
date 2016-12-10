<?php

namespace Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIConstant
 *
 * @author Joshua Clifford Reyes
 */

class APIConstant {

	##########################################################
	# METHOD
	##########################################################
	const METHOD_POST = 'POST';
	const METHOD_GET = 'GET';
	const METHOD_PUT = 'PUT';

	##########################################################
	# DATABASE
	##########################################################
	const DB_HOST = '';
	const DB_NAME = '';
	const DB_USERNAME = '';
	const DB_PASSWORD = '';

	##########################################################
	# HEADER
	##########################################################
	const HEADER_MAX_AGE = 86400;

	##########################################################
	# COMMON ERROR MESSAGE
	##########################################################
	const EMPTY_PARAMETER = 'EMPTY PARAMTER';
	const INVALID_PARAMETER = 'INVALID PARAMETER USED';
	const INVALID_DATA_TYPE = 'INVALID DATA TYPE USED';
	const SERVER_ERROR = 'ERROR ON SERVER';

	########################################################## 
	# COMMON HTTP CODE 
	##########################################################
	# SERVER ERROR
	const HTTP_INTERNAL_SERVER_ERROR = 500;
	const HTTP_BAD_GATEWAY = 502;
	const HTTP_SERVICE_UNAVAILABLE = 503;
	# CLIENT ERROR
	const HTTP_BAD_REQUEST = 400;
	const HTTP_UNAUTHORIZED = 401;
	const HTTP_FORBIDDEN = 403;
	const HTTP_NOT_FOUND = 404;
	# REDIRECTION
	const HTTP_FOUND = 302;
	# SUCCESS
	const HTTP_OK = 200;
	const HTTP_ACCEPTED = 202;
}