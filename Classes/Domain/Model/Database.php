<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace KP\Lunch\Domain\Model;


use mysqli;
/**
 * Description of Database
 *
 * @author timdi
 */
class Database {
	private $_connection;
	private static $_instance; 
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "root";
	private $_database = "flow";
	
	public static function getInstance() {
		if(!self::$_instance) { 
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		if(mysqli_connect_error()) {
			trigger_error("Failed to conenct to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
	
	private function __clone() { }
	
	public function getConnection() {
		return $this->_connection;
	}
}