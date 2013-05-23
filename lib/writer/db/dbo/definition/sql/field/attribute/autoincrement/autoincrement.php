<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Autoincrement  extends UBP_Lib_Db_Dbo_Definition_Field_Attribute_Autoincrement {

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
		/**
		* put your comment there...
		* 
		* @var UBP_Lib_Writer_Db_Dbo_Definition_Sql_Fromatter_Simple
		*/
		$syxFormat =& $this->table->getSyxFormat();
		$syntx = '';
		// Simply Return Syntx if TRUE!
		$value = $this->getValue();
		if ($value === true) {
			$syntx = $syxFormat->prepare('auto_increment');
		}
		// Return.
		return $syntx;
	}

} // End class.