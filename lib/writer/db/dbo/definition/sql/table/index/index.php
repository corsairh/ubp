<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Index extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $index = null;
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Index $type
	* @return UBP_Lib_Db_Dbo_Definition_Table_Index
	*/
	public function __construct(UBP_Lib_Db_Dbo_Definition_Table_Index $index) {
		$this->index = $index;
	}

	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$index =& $this->index;
		$table =& $index->getTable();
		$driver =& $table->getDriver();
		$syntxFormater =& $table->getSyxFormat();
		$fields = array();
		$synx = '';
		// Type name.
		$indexTypeName = $syntxFormater->casesfize($index->getTypeName());
		// Get fields list.
		foreach ($index->fields()->iterator() as $field) {
			// Field name!
			$fieldName = $field->getName();
			$fields[] = $driver->escapeField($fieldName);
		}
		if (empty($fields)) {
			throw new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Index_Exception_Nofields($index);
		}
		// Join field names with comma!
		$fields = $syntxFormater->spacefize('(' . implode(',', $fields) . ')');
		$synx = "{$indexTypeName}{$fields}";
		return $synx;
	}

} // End class. 