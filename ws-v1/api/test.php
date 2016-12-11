<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author Joshua Clifford Reyes
 */

error_reporting(E_ERROR);

require_once realpath(dirname(__FILE__) .'/..') .'/libraries/API.php';

use Libraries\API;
use Libraries\APIStatus;
use Libraries\APIConstant;
use Libraries\APIDatabase;
use Libraries\APIValidator;
use Libraries\APIUtilities;

use Enlighten\Hashing\BycryptHasher;

use Enlighten\Encryption\OpenSSLEncrypter;

APIUtilities::setHeader();
APIUtilities::setMethod('GET');

APIUtilities::setResponse(
	APIConstant::HTTP_OK, 
	APIStatus::SUCCESS, 
	BycryptHasher::make('AKO', 8)
);


echo '<br>';

$secretKey = 'QUERTY';
$plainText = 'ANO BANG BAGO?';

$opensslecrypter = new OpenSSLEncrypter($secretKey, 'AES-256-CTR');
$encrypted = $opensslecrypter->encrypt($plainText);
echo $encrypted;

$openssldec = new OpenSSLEncrypter($secretKey, 'AES-256-CTR');
echo $openssldec->decrypt($encrypted);


error_reporting(0);