<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table extends UBP_Lib_Db_Dbo_Definition_Table {
	
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
	protected $syxFormat = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @return UBP_Lib_Writer_Db_Dbo_Definition_Xml_Table
	*/
	public function __construct(UBP_Lib_Db_Driver & $driver, $name, $syxFormat = null) {
		// Initialize.
		$this->driver = $driver;
		$this->syxFormat = $syxFormat;
		// Get table name and construct the parent class!
		parent::__construct($name);
		// Read fields and indexes!.
		$this->fields = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field_Collection($this);
		$this->indexes = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Index_Collection($this);
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$stmt = '';
		$driver =& $this->getDriver();
		$syntxFormatter =& $this->getSyxFormat();
		// Get full table name.
		$tblName = $driver->getDBOPrefix($this->getName());
		$fields = (string) $this->fields();
		$indexes = (string) $this->indexes();
		// Table definition SQL statment!
		// Line after the opening bracket.
		$stmt = $syntxFormatter->linalize("{$tblName}(");
		// Definition,
		$stmt .= "{$fields}{$indexes}";
		// line @ the end!
		$stmt .= $syntxFormatter->linalize(");");
		// Return Table definition!
		return $stmt;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getDriver() {
		return $this->driver;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getSyxFormat() {
		return $this->syxFormat;
	}

} // End class.