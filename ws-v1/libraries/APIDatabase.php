<?php

namespace Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIDatabase
 *
 * @author Joshua Clifford Reyes
 */

use Libraries\APIException;

class APIDatabase {

	public static function PDO() {
		return 'APPLIED PDO';
	}

	public static function MYSQL() {
		return 'APPLIED MYSQL';
	}

	public static function MYSQLi() {
		return 'APPLIED MYSQLi';
	}
}