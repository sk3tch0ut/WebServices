<?php

namespace Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIUtilities
 *
 * @author Joshua Clifford Reyes
 */

use Libraries\APIStatus;
use Libraries\APIConstant;

class APIUtilities {

	/**
     * Set configuration for HTTP header.
     *
     * @return void
     */
	public static function setHeader() {

		header('Content-Type: application/json');

		if (isset($_SERVER['HTTP_ORIGIN'])) {
            header('Access-Control-Allow-Origin: '. $_SERVER['HTTP_ORIGIN']);
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: '. APIConstant::HEADER_MAX_AGE);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        	if ($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) {
        		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");	
        	}

        	if ($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']) {
        		header('Access-Control-Allow-Headers: '. $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']);
        	}

            exit(0);
        }
	}

	/**
     * Set allowed method to use.
     *
     * @return json
     */
	public static function setMethod($method) {

		if ($_SERVER['REQUEST_METHOD'] != $method) {
            APIUtilities::setResponse(
                APIConstant::HTTP_UNAUTHORIZED, 
                APIStatus::ERROR, 
                'Method used is not allowed, use '. $method .' instead.'
            );
			
            exit(0);
		}
	}

	/**
     * Default API (RESTful) response.
     *
     * @param int $http - http code
     * @param string $status - status of the request
     * @param string $response - result data of request
     * @return json
     */
	public static function setResponse($http, $status, $response) {

		header("HTTP/1.1 $http");

        $response = array(
        	'http'		  => $http,
            'status'      => $status,
            'response'    => $response,
            
            'info' => array(	
            	'time' 	  => APIUtilities::serverTime(),
            	'author'  => APIConstant::AUTHOR,
	            'version' => APIConstant::VERSION
            )
        );

        echo json_encode($response);
	}

	/**
     * Server Time.
     *
     * @return date
     */
	public static function serverTime() {
		
		date_default_timezone_set("Asia/Manila");
        return date('Y-m-d H:i:s');
	}

	/**
     * Detect current user agent.
     * Time and Space Complexity is O(1).
     *
     * @return string
     */
	public static function getUserAgent() {
		
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

		if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) {
			return 'Opera';	
		} else if (strpos($user_agent, 'Edge')) {
			return 'Edge';
		} else if (strpos($user_agent, 'Chrome')) {
			return 'Chrome';
		} else if (strpos($user_agent, 'Safari')) {
			return 'Safari';
		} else if (strpos($user_agent, 'Firefox')) {
			return 'Firefox';
		} else if (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) {
			return 'Internet Explorer';
		}
	}
}