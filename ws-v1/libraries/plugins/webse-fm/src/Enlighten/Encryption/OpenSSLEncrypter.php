<?php

namespace Enlighten\Encryption;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OpenSSLEncrypter
 *
 * @author Joshua Clifford Reyes
 */

use RuntimeException;

class OpenSSLEncrypter {

	/**
	 * Secret key.
	 *
	 * @var string
	 */
	private $key;

	/**
	 * Cipher method to use.
	 *
	 * @var string
	 */
	private $method;

	/**
	 * Initialize Encrpter class
	 *
	 * @param string $key
	 * @param string $method
	 *
	 * @throws \RuntimeException
	 */
	public function __construct($key, $method = 'AES-256-CTR') {

		$key = (string) $key;

		if (!$key) {
			throw new RuntimeException('Secret key cannot be empty.');
		}

		switch ($method) {
			case 'AES-128-CTR':
				$key = hash('md5', $key);
				break;

			case 'AES-256-CTR':
			default:
				$key = hash('sha256', $key);
				break;
		}
		
		if (static::supported($key, $method)) {
			$this->key = $key;
			$this->method = $method;
		} else {
			throw new RuntimeException('Only AES-256-CTR with 64 and AES-128-CTR with 32 key char length are supported.');
		}
	}

	/**
	 * Check if the key and method are subject to current 
	 * industry standard of encryption and most safe method. 
	 *
	 * @param string $key
	 * @param string $method
	 * @return boolean
	 */
	public static function supported($key, $method) {

		$length = mb_strlen($key, '8bit');

		return ($method == 'AES-256-CTR' && $length == 64) || ($method == 'AES-128-CTR' && $length == 32);
	}

	/**
	 * Encrypt the given plain-text.
	 *
	 * @param string $plaintext
	 * @return string
	 */
	public function encrypt($plaintext) {

		$iv = mcrypt_create_iv($this->getIvSize(), MCRYPT_DEV_URANDOM);

		$encrypted = openssl_encrypt(serialize($plaintext), $this->method, $this->key, 0, $iv);
		
		if ($encrypted === false) {
            throw new RuntimeException('Could not encrypt the data.');
        }

        return base64_encode(json_encode(['iv' => base64_encode($iv), 'value' => $encrypted]));
	}

	/**
	 * Decrypt the given payload.
	 *
	 * @param string $payload
	 * @return string
	 */
	public function decrypt($payload) {

		$payload = json_decode(base64_decode($payload), true);

		$decrypted = openssl_decrypt($payload['value'], $this->method, $this->key, 0, base64_decode($payload['iv']));

		if ($decrypted === false) {
            throw new RuntimeException('Could not decrypt the data.');
        }

        return unserialize($decrypted);
	}

	/**
	 * Generate iv size base on cipher or method use.
	 *
	 * @return int
	 */
	private function getIvSize() {
		
		return openssl_cipher_iv_length($this->method);
	}
}