<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Length  extends UBP_Lib_Db_Dbo_Definition_Field_Attribute_Length {

	/**
	* put your comment there...
	* 
	* @var UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table
	*/
	protected $table = null;
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table $driver
	* @return UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Allownull
	*/
	public function __construct(UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table $table, $value) {
		// Set parent.
		parent::__construct($value);
		// Set DB Driver.
		$this->table = $table;
	}

	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Init with empty string.
		$syntx = '';
		// Whatever value is given set it.
		$value = $this->getValue();
		if ($value) {
			// Full Syntax.
			$syntx = "({$value})";
		}
		// Return.
		return $syntx;
	}
	
} // End class.