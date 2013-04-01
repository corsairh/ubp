<?php
/**
* 
*/

/**
* 
*/
class UBP_Lib_Response {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $stores = array();
	
	/**
	* put your comment there...
	* 
	*/
	public static function & getInstance() {
		$instance = new UBP_Lib_Response();
		return $instance;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $store
	*/
	public function read($store, $default = null) {
		return isset($this->stores[$store]) ? $this->stores[$store] : $default;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $store
	* @param mixed $value
	*/
	public function write($store, $value) {
		// Store value.
		$this->stores[$store] = $value;
		// Chaining.
		return $this;
	}
	
} // End class.
