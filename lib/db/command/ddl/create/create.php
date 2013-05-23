<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Command_Ddl_Create extends UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $driver = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $dboDefinition = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $driver
	* @param mixed $definition
	* @return UBP_Lib_Db_Command_Ddl_Create
	*/
	public function __construct(& $driver, & $dboDefinition) {
		$this->driver =& $driver;
		$this->dboDefinition =& $dboDefinition;
	}

	/**
	* put your comment there...
	* 
	* 
	*/
	public function exec() {
		// Get command query.
		$query = (string) $this;
		// Execute query.
		return $this->driver->query($query);
	}

	/**
	* put your comment there...
	* 
	*/
	protected function & getDefinition() {
		return $this->dboDefinition;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getDriver() {
		return $this->driver;
	}

} // End class.