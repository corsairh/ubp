<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Dbo extends UBP_Lib_Object {
	
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
	* @return UBP_Lib_Db_Dbo
	*/
	public function __construct(UBP_Lib_Db_Driver & $driver = null) {
		// If driver is not supplied get one!
		if (!$driver) {
			// Get db instance
			$loader =& $this->getLoader();
			$driver = $loader->getInstanceOf('lib/db', 'driver');
		}
		// Set driver instance refence!
		$this->driver = $driver;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getDbDriver() {
		return $this->driver;
	}
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Driver $driver
	*/
	public function setDbDriver(UBP_Lib_Db_Driver & $driver) {
		// Just assign it!
		$this->driver = $driver;
		// Chaining!
		return $this;
	}
  
} // End class.