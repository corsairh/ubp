<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Index_Type_Unique extends UBP_Lib_Db_Dbo_Definition_Table_Index_Type_Unique {

	/**
	* put your comment there...
	* 
	* @var UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Index
	*/
	protected $indexBase = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $table
	* @param mixed $name
	*/
	public function __construct($table, $name = null) {
		// Initialize parent.
		parent::__construct($table, $name);
		// Extend Writer Sql Index base class.
		$this->indexBase = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Index($this);
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$synx = (string) $this->indexBase;
		// Return syntx.
		return $synx;
	}
	
} // End class. 