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
	* 
	*/
	const PROP_TYPE_GETTER = 'get';

	/**
	* 
	*/
	const PROP_TYPE_SETTER = 'set';
		
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
	* Return Table name.
	* 
	* @return String Database table name.
	*/
	public function __toString() {
		return $this->getDbDriver()->getDBOPrefix($this->name());
	}

	/**
	* Get table definition!
	* 
	* @return UBP_TableDefinition (not implemeted yet! Now retujrn RAW string).
	*/
	public function definition() {
		// Initialize.
		$loader =& $this->getLoader();
		// Get path to the defintion file laying under the DBO  class directory.
		$definitionFilePath = $loader->getClassRelativeFile($this, ($this->getClassName() . '.sql'));
		// Get content of the definition file.
		return UBP_Lib_Filesystem_File::getInstance($definitionFilePath)
																										->readAll();
	}

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
	* put your comment there...
	* 
	* @param mixed $type
	* @param mixed $name
	*/
	public function findPropertyMethod($type, $name) {
		// Get model method name to call for SET!
		$capitalizedName = ucfirst($name);
		$method = "{$type}{$capitalizedName}";
		// Check if exists
		if (!method_exists($this, $method)) {
			echo "{$method}";
			throw new UBP_Lib_Db_Table_Exception_Modelfilternotexists($type, $name, $method);
		}
		return $method;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $property
	*/
	public function get($property) {
		// Find property Method name to call!
		$method = $this->findPropertyMethod(self::PROP_TYPE_GETTER, $property);
		// Get property value by calling the getter method.
		return $this->{$method}();
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
	public function set($property, $value) {
		// Find property Method name to call!
		$method = $this->findPropertyMethod(self::PROP_TYPE_SETTER, $property);
		// Call the filter.
		$this->{$method}($value);
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