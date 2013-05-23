<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Allownull  extends UBP_Lib_Db_Dbo_Definition_Field_Attribute_Allownull {
	
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
		// Initialize.
		$table =& $this->table;
		/**
		* put your comment there...
		* 
		* @var UBP_Lib_Writer_Db_Dbo_Definition_Sql_Fromatter_Simple
		*/
		$syxFormat =& $table->getSyxFormat();
		$syntx = '';
		// - Dont put any syntax if NULL given (database default).
		$value = $this->getValue();
		if ($value !== null) {
			// Initialize wit NULL keyword.
			$syntx = $syxFormat->prepare('null');
			// Add NOT if false.
			if ($value === false) {
				$syntx = $syxFormat->prepare('not') . $syntx;
			}			
		}
		// Return.
		return $syntx;
	}

} // End class.