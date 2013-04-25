<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Ddl_Create extends UBP_Lib_Db_Command_Ddl {
	
	/**
	* Build command query.
	* 
	*/
	public function __toString() {
		// Initialize.
		$driver =& $this->getDriver();
		$dbo =& $this->getDBO();
		// Get table name.
		$dboName = $driver->getDBOPrefix($dbo->name());
		// Get DBO definition raw string to execute!
		$dboRawDefinition = (string) $dbo->getDefinition();
		// Build CREATE TABLE statement.
		$query = "CREATE TABLE IF NOT EXISTS`{$dboName}`{$dboRawDefinition}";
		// Return string query!
		return $query;
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

} // End class.