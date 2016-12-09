<?php

namespace Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIException
 *
 * @author Joshua Clifford Reyes
 */

use \Exception;

class APIException extends Exception {

	/**
     *  Exception Error.
     *  @var string
     */
	public $error;

	/**
     *  Exception Error Message.
     *  @var string
     */
	public $message;

	public function __construct($error, $message) {
		$this->error = $error;
		$this->message = $message;
	}
}