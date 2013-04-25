<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Table extends UBP_Lib_Db_Dbo {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $name = null;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $data = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $hash = array();

	/**
	* Fill table object with the given data.
	* 
	* The data will passed through the MODEL filter!
	* 
	* @param Array Row data.
	*/
	public function fill($data) {
		// Set all given data, pass-through the model filers!
		foreach ($data as $name => $value) {
			// Set value / pass to the model method.
			$this->set($name, $value);
		}
		// Chaining.
		return $this;
	}

	/**
	* Get table definition!
	* 
	* @return UBP_TableDefinition (not implemeted yet! Now retujrn RAW string).
	*/
	public function getDefinition() {
		// Initialize.
		$loader =& $this->getLoader();
		// Get path to the defintion file laying under the DBO  class directory.
		$definitionFilePath = $loader->getClassRelativeFile($this, ($this->getClassName() . '.sql'));
		// Get content of the definition file.
		return UBP_Lib_Filesystem_File::getInstance($definitionFilePath)
																										->readAll();
	}

	/**
	* put your comment there...
	* 
	* @param mixed $field
	*/
	protected function getValueOf($field) {
		return isset($this->data[$field]) ? $this->data[$field] : null;
	}

	/**
	* put your comment there...
	* 
	*/
	public function name() {
		return $this->name;	
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $field
	* @param mixed $value
	*/
	public function set($field, $value) {
		// Get model method name to call for SET!
		$capitalizedName = ucfirst($field);
		$modelMethod = "get{$capitalizedName}";
		// Check if exists
		if (!method_exists($this, $modelMethod)) {
			throw new UBP_Lib_Db_Table_Exception_Modelfilternotexists($field, $modelMethod);
		}
		// Call the filter.
		$this->{$modelMethod}($value);
		// Chaining.
		return $this;			
	}

	/**
	* put your comment there...
	* 
	* @param mixed $field
	* @param mixed $value
	*/
	protected function setValueOf($field, $value) {
		// Set value.
		$this->data[$field] = $value;
		// Chaining.
		return $this;
	}
	
} // End class.