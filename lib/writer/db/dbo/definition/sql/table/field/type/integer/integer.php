<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field_Type_Integer extends UBP_Lib_Db_Dbo_Definition_Table_Field_Type_Integer {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $table = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $type = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $length
	* @param mixed $allowNull
	* @param mixed $default
	* @return UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field_Type_Integer
	*/
	public function __construct(UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table $table, $length = null, $allowNull = null, $default = null) {
		// Initialize.
		$this->table = $table;
		// Extend Write SQL Type class.
		$this->type = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field_Type($this, 'int');
		// Override parent class.
		$this->type->extend($length, $allowNull, $default);
		// Initialize integer class objects.
		$this->autoIncrement = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Field_Attribute_Autoincrement($table);
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$syntx = '';
		// Get type syntax.
		$syntx = ((string) $this->type) . ((string) $this->getAutoIncrement());
		// Return field type syntax.
		return $syntx;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getTable() {
		return $this->table;
	}

} //End class.