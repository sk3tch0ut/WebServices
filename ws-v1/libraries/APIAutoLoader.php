<?php

namespace Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIAutoLoader
 *
 * @author Joshua Clifford Reyes
 */

class APIAutoLoader {

	/**
	 * Plugin name.
	 *
	 * @var string
	 */
	private $plugin;

	/**
	 * Route list.
	 *
	 * @var array
	 */
	private $routes;

	/**
	 * Set routes.
	 *
	 * @param string $plugin
	 * @param array $routes
	 * @return class context
	 */
	public function routes($plugin, array $routes) {
		
		$this->plugin = $plugin;
		$this->routes = $routes;
		return $this;
	}

	/**
	 * Time and Space Complexity is O(n^2).
	 *
	 * @return void
	 */
	public function load() {

		foreach ($this->routes as $folder => $subfolder) {
			foreach ($subfolder as $class) {
				$path = realpath(APPLICATION_PATH .'/libraries/plugins/'. $this->plugin .'/src/'. $folder. '/'. $class .'.php');
	    		require_once($path);
			}
		}
	}
}