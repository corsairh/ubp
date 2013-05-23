<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Dbo_Definition_Field_Attribute_Autoincrement  extends UBP_Lib_Db_Dbo_Definition_Field_Attribute {
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute
	*/
	public function setValue($value = null) {
		// If there is a value passed cast to integer.
		if ($value !== null) {
			$value = (bool) $value;
		}
		// Set value.
		$this->value = $value;
		// Chaining.
		return $this;
	}
	
} // End class.