<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field extends UBP_Lib_Db_Dbo_Definition_Table_Field {

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table $table
	* @param mixed $name
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type $type
	* @return UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field
	*/
	public function __construct(UBP_Lib_Db_Dbo_Definition_Table & $table, $name, UBP_Lib_Db_Dbo_Definition_Table_Field_Type & $type) {
		// Initialize parent.
		parent::__construct($table, $name, $type);
		// Initialize writer classes.
		$this->setComment(new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Property_Comment($table));
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
		$table =& $this->getTable();
		$syxFormat =& $table->getSyxFormat();
		$driver =& $table->getDriver();
		$sytx = '';
		// Quote field name.
		$fieldName = $driver->escapeField($this->getName());
		$sytx = $syxFormat->spacefize($fieldName);
		// Get type Syntax.
		$sytx .= ((string) $this->getType());
		// Comment Syntax.
		$sytx .= ((string) $this->getComment());
		// Return field full syntax.
		return $sytx;
	}

} // End class. 