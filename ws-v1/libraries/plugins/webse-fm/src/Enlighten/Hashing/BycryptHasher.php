<?php

namespace Enlighten\Hashing;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BycryptHasher
 *
 * @author Joshua Clifford Reyes
 */

use RuntimeException;

class BycryptHasher {

	/**
	 * Default cost for crypt
	 *
	 * @var int
	 */
	private static $cost = 10;

	/**
	 * Hash given value.
	 *
	 * @param string $value
	 * @param int $cost
	 * @return string
	 * 
	 * @throws \RuntimeException 
	 */
	public static function make($value, $cost = null) {

		$cost = isset($cost) ? $cost : static::$cost;

		$hash = password_hash($value, PASSWORD_BCRYPT, ['cost' => $cost]);

		if ($hash === false) {
			throw new RuntimeException('Hashing is not supported.');
		}

		return $hash;
	}

	/**
	 * Validate given hash.
	 *
	 * @param string $value
	 * @param string $hashed
	 * @param int $cost
	 * @return boolean
	 */
	public static function validate($value, $hashed, $cost = null) {

		$cost = isset($cost) ? $cost : static::$cost;

		if (strlen($hashed) === 0) {
			return false;
		}

		return password_verify($value, $hashed, ['cost' => $cost]);
	}

	/**
	 * Check if the hashed need to re-hash for new value if so then
	 * generate new one.
	 * 
	 * @param string $value
	 * @param string $hashed
	 * @param int $cost
	 * @return string
	 */
	public static function remake($value, $hashed, $cost = null) {

		$cost = isset($cost) ? $cost : static::$cost;

		if (!DefauleHasher::validate($value, $hashed, $cost)) {
			return 'Not valid hashed'; 
		}

		if (password_needs_rehash($hashed, PASSWORD_BCRYPT, ['cost' => $cost])) {
	        return DefaultHasher::make($value, $cost);
	    }

		return $hashed;
	}

	/**
	 * Check only if need re-hash.
	 *
	 * @param string $hashed
	 * @param int $cost
	 * @return string
	 */
	public static function needsRehash($hashed, $cost = null) {

		$cost = isset($cost) ? $cost : static::$cost;

		return password_needs_rehash($hashed, PASSWORD_BCRYPT, ['cost' => $cost]);
	}
}