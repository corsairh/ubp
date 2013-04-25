<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Driver_Exception_Queryerror extends UBP_Lib_Exception {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $query = '';
		
	/**
	* put your comment there...
	* 
	* @param mixed $query
	* @return UBP_Lib_Db_Driver_Exception_Queryerror
	*/
	public function __construct($query) {
		// Initialize.
		$this->query = $query;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getQuery() {
		return $this->query;
	}

}