<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Dbo_Definition_Table_Field_Type_Integer extends UBP_Lib_Db_Dbo_Definition_Table_Field_Type {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $autoIncrement = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $length
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field_Type_Varchar
	*/
	public function __construct($length = null, $allowNull = null, $default = null) {
		// Construct parent!
		parent::__construct($length, $allowNull, $default);
		// Initialize.
		$this->autoIncrement = new UBP_Lib_Db_Dbo_Definition_Field_Attribute_Autoincrement();
	}
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type_Numeric_Integer $src
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type_Numeric_Integer $des
	*/
	public static function copy($src, $des) {
		// Copy type base!
		parent::copy($src, $des);
		// Copy integer specifec attributes.
		UBP_Lib_Db_Dbo_Definition_Field_Attribute_Autoincrement::copy($src->getAutoIncrement(), $des->getAutoIncrement());
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getAutoIncrement() {
		return $this->autoIncrement;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $on
	*/
	public function setAutoIncrement($autoIncrement) {
		// Set.
		$this->autoIncrement = $autoIncrement;	
		// Chaining.
		return $this;
	}
	
} //End class.