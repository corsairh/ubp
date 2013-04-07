<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Table extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var UBP_Lib_Db_Driver
	*/
	protected $driver = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name = null;
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		// Initialize parent.
		parent::__construct();
		// Get DB driver instance.
		$this->driver = $this->getLoader()->getInstanceOf('lib/db', 'driver');
	}

	/**
	* Send create table statement.
	* 
	* @return UBP_Lib_Db_Table Returning $this pointer.
	*/
	public function create() {
		// Get table name.
		$tName = $this->getTableName();
		// Get full path to SQL file with table definition.
		$tDef = array();
		$tDef['name'] = $this->getClassName() . '.sql';
		$tDef['path'] = $this->getLoader()->getClassRelativeFile($this, $tDef['name']);
		// Read table definition from SQL  file.
		$tDef = UBP_Lib_Filesystem_File::getInstance($tDef['path']);
		// Build CREATE TABLE statement.
		$query = "CREATE TABLE IF NOT EXISTS`{$tName}`{$tDef->readAll()}";
		// Extecute command.
		$this->driver->exec($query);
		// Chinaing
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function delete() {
		
	}

	/**
	* put your comment there...
	* 
	*/
	public function getName() {
		return $this->name;	
	}
	                               
	/**
	* put your comment there...
	* 
	*/
	public function getTableName() {
		// Initialize table name array.
		$tableName = array();
		// Assign parts.
		$tableName['prefix'] = $this->driver->getTablePrefix();
		$tableName['name'] = $this->getName();
		// Return full table name, including prefixes!
		return implode('', $tableName);
	}

} // End class.