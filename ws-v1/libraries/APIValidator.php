<?php

namespace Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIValidator
 *
 * @author Joshua Clifford Reyes
 */

use Libraries\APIConstant;
use Libraries\APIException;

class APIValidator {

	/**
     * Validate Database Connection.
     * @return void
     */
	public static function validateDatabaseConnection($connection) {
		if (!$connection) {
			$message = 'No connection to the Database.';
			throw new APIException(
				APIConstant::SERVER_ERROR, 
				$message
			);
		}
	}

	/**
     * Validate Input Empty.
     * @return string
     */
	public static function validateEmptyInput($input, $field) {
		if (empty($input)) {
			$message = 'The input value is empty! parameter key is ['.$field.']';
			throw new APIException(APIConstant::INVALID_DATA_TYPE, $message);
		} else {
			return $input;
		}
	}

	/**
     * Validate Input Array.
     * @return array
     */
	public static function validateArrayInput($input, $field) {
		if (!is_array($input)) {
			$message = 'The input value is not a Array type! parameter key is ['.$field.']';
			throw new APIException(APIConstant::INVALID_DATA_TYPE, $message);
		} else {
			return $input;
		}
	}

	/**
     * Validate Input Integer.
     * @return integer
     */
	public static function validateNumericInput($input, $field) {
		if (!is_numeric($input)) {
			$message = 'The input value is not a Numeric type! parameter key is ['.$field.']';
			throw new APIException(APIConstant::INVALID_DATA_TYPE, $message);
		} else {
			return $input;
		}
	}

	/**
     * Validate Input String.
     * @return string
     */
	public static function validateStringInput($input, $field) {
		if (!is_string($input)) {
			$message = 'The input value is not a String type! parameter key is ['.$field.']';
			throw new APIException(APIConstant::INVALID_DATA_TYPE, $message);
		} else {
			return $input;
		}
    }

    /**
     * Validate Input Boolean.
     * @return boolean
     */
    public static function validateBooleanInput($input, $field) {
    	if (!is_bool($input)) {
			$message = 'The input value is not a Boolean type! parameter key is ['.$field.']';
			throw new APIException(APIConstant::INVALID_DATA_TYPE, $message);
		} else {
			return $input;
		}
    }
}