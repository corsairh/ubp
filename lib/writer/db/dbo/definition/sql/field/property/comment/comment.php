<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Property_Comment  extends UBP_Lib_Db_Dbo_Definition_Field_Property_Comment {
	
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
	public function __construct(UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table $table, $value = null) {
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
		// Initialize.
		$table =& $this->table;
		/**
		* put your comment there...
		* 
		* @var UBP_Lib_Writer_Db_Dbo_Definition_Sql_Fromatter_Simple
		*/
		$syxFormat =& $table->getSyxFormat();
		$driver =& $table->getDriver();
		// Init with empty string.
		$syntx = '';
		// Whatever value is given set it.
		$value = $this->getValue();
		if ($value) {
			// Escaping!
			$driver->escape($value);
			// Then quoting!
			$driver->quote($value);
			// Full Syntax.
			$syntx = $syxFormat->prepare('comment') . $syxFormat->spacefize($value);
		}
		// Return.
		return $syntx;
	}

} // End class.