<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Dbo_Definition_Field_Attribute_Default  extends UBP_Lib_Db_Dbo_Definition_Field_Attribute {
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function setValue($value = null) {
		// Anything for now!
		$this->value = $value;
		// Chaining.
		return $this;
	}

} // End class.