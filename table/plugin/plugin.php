<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class  UBP_Table_Plugin extends UBP_Lib_Db_Table {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name = 'plugin';
	
	/**
	* put your comment there...
	* 
	*/
	public function getFile() {
		return $this->getValueOf('file');
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function setFile($value) {
		return $this->setValueOf('file', $value);
	}

	/**
	* put your comment there...
	* 
	*/
	public function getId() {
		return $this->getValueOf('id');
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function setId($value) {
		// Make sure its not zero!
		if (($value !== null) && !is_numeric($value)) {
			throw new Exception('Invalid Plugin Id value! Id must be numeric and not zero!');
		}
		// Set.
		return $this->setValueOf('id', $value);
	}

} // End class.