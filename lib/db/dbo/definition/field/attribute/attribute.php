<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Dbo_Definition_Field_Attribute extends UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $value	= null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute
	*/
	public function __construct($value = null) {
		$this->setValue($value);
	}
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Field_Attribute $src
	* @param UBP_Lib_Db_Dbo_Definition_Field_Attribute $src
	* @return void
	*/
	public static function copy($src, $des) {
		// Copy value.
		$des->setValue($src->getValue());
	}

	/**
	* put your comment there...
	* 
	*/
	public function getValue() {
		return $this->value;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public abstract function setValue($value = null);

} // End class.