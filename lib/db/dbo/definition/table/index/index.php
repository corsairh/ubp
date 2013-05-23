<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Dbo_Definition_Table_Index extends UBP_Lib_Object {

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
	protected $fields = null;
	
	/**
	* put your comment there...
	* 
	* @var UBP_Lib_Db_Dbo_Definition_Table
	*/
	protected $table = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $type
	* @param mixed $name
	* @return UBP_Lib_Db_Dbo_Definition_Table_Index
	*/
	public function __construct(UBP_Lib_Db_Dbo_Definition_Table $table, $name = null) {
		// Initialize object properties.
		$this->table = $table;
		$this->name = $name;
		// Initialize fields collection.
		$this->fields = new UBP_Lib_Db_Dbo_Definition_Table_Field_Collection($this->getTable());
	}

	/**
	* put your comment there...
	* 
	* @param mixed $src
	* @param mixed $des
	*/
	public static function copy($src, $des) {
		// Copy fields.
		foreach ($src->fields()->iterator() as $srcField) {
			$des->fields()->add($srcField);
		}
	}

	/**
	* put your comment there...
	* 
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field_Collection
	*/
	public function & fields() {
		return $this->fields;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getTable() {
		return $this->table;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getName() {
		return $this->name;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @return UBP_Lib_Db_Dbo_Definition_Table_Index
	*/
	public function setName($name = null) {
		// Set name or reset!
		$this->name = $name;
		// Chaining.
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getTypeName() {
		return $this->getClassName();		
	}

} // End class. 