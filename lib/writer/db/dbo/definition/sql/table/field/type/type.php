<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field_Type extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $dboType = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $typeName = null;
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type $type
	*/
	public function __construct(UBP_Lib_Db_Dbo_Definition_Table_Field_Type $type, $typeName) {
		// Initialize.
		$this->typeName = $typeName;
		$this->dboType = $type;	
	}

	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$type =& $this->dboType;
		$table =& $type->getTable();
		$syxFormat =& $table->getSyxFormat();
		$syntx = '';
		// Type name.
		$syntx = $syxFormat->prepare($this->typeName) . ((string) $type->getLength());
		// Other type attributes.
		$syntx .= ((string) $type->getAllowNull()) . ((string) $type->getDefault());
		// Return full syntax!
		return $syntx;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $length
	* @param mixed $allowNull
	* @param mixed $default
	*/
	public function extend($length, $allowNull, $default) {
		// Initialize.
		$type =& $this->dboType;
		$table =& $type->getTable();
		// Inistantiate type attributes.
		$type->setAllowNull(new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Allownull($table, $allowNull));
		$type->setDefault(new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Default($table, $default));
		$type->setLength(new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Length($table, $length));
	}
} // End class.