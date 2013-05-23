<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Struct extends UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $nullValue = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $returnDefault = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function getStructValue($name) {
		$method = "get{$name}";
		// Check the existance of the key!
		if (!method_exists($this, $method)) {
			throw new UBP_Lib_Struct_Exception_Invalidproperty($this, $name);
		}
		// Return the value of the key or the default.
		$value = $this->{$method}();
		return ($value !== $this->nullValue) ? $value : $this->returnDefault;
	}

} // End class.