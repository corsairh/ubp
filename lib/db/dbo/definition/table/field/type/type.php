<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Dbo_Definition_Table_Field_Type extends UBP_Lib_Object {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $allowNull = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $default = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $length = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $allowNull
	* @param mixed $length
	* @param mixed $default
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field_Type
	*/
	public function __construct($length = null, $allowNull = null, $default = null) {
		// Initialize.
		$this->length = new UBP_Lib_Db_Dbo_Definition_Field_Attribute_Length($length);
		$this->allowNull = new UBP_Lib_Db_Dbo_Definition_Field_Attribute_Allownull($allowNull);
		$this->default = new UBP_Lib_Db_Dbo_Definition_Field_Attribute_Default($default);
	}

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type $src
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Type $des
	* @return void
	*/
	public static function copy($src, $des) {
		// Copy attributes.
		UBP_Lib_Db_Dbo_Definition_Field_Attribute_Length::copy($src->getLength(), $des->getLength());
		UBP_Lib_Db_Dbo_Definition_Field_Attribute_Allownull::copy($src->getAllowNull(), $des->getAllowNull());
		UBP_Lib_Db_Dbo_Definition_Field_Attribute_Default::copy($src->getDefault(), $des->getDefault());
	}

	/**
	* put your comment there...
	* 
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute_Allownull
	*/
	public function getAllowNull() {
		return $this->allowNull;
	}

	/**                                                  
	* put your comment there...
	* 
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute_Default
	*/
	public function getDefault() {
		return $this->default;
	}

	/**
	* put your comment there...
	* 
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute_Length
	*/
	public function getLength() {
		return $this->length;
	}
		
	/**
	* put your comment there...
	* 
	*/
	public function getTypeName() {
		return $this->getClassName();
	}

	/**
	* put your comment there...
	* 
	* @param mixed $allow
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute_Allownull
	*/
	public function setAllowNull(UBP_Lib_Db_Dbo_Definition_Field_Attribute_Allownull & $allowNull) {
		// Set.
		$this->allowNull = $allowNull;
		// Chaining.
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $default
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute_Default
	*/
	public function setDefault(UBP_Lib_Db_Dbo_Definition_Field_Attribute_Default & $default) {
		// Set.
		$this->default = $default;
		// Chaining.
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $length
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute_Length
	*/
	public function setLength(UBP_Lib_Db_Dbo_Definition_Field_Attribute_Length & $length) {
		// Set length.
		$this->length = $length;
		// Chaining.
		return $this;
	}

} // End class.