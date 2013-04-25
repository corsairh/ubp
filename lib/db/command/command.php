<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Command extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $driver = null;
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Driver $driver
	* @return UBP_Lib_Db_Command
	*/
	public function __construct(UBP_Lib_Db_Driver $driver) {
		// Initialize driver.
		$this->driver = $driver;
	}

	/**
	* put your comment there...
	* 
	*/
	abstract public function __toString();
	
	/**
	* put your comment there...
	* 
	*/
	public abstract function exec();

	/**
	* put your comment there...
	* 
	*/
	public function & getDriver() {
		return $this->driver;
	}

} // End class.