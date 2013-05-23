<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Db_Dbo_Definition_List_Collection extends  UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $list = array();
	
	/**
	* put your comment there...
	* 
	* @var UBP_Lib_Db_Dbo_Definition_Table
	*/
	protected $table = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $table
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field_Collection
	*/
	public function __construct(UBP_Lib_Db_Dbo_Definition_Table & $table) {
		// Set table.
		$this->table = $table;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function count() {
		return count($this->list);
	}
  
  /**
  * put your comment there...
  * 
  * @param mixed $name
  */
  public function & getByName($name) {
  	// Initialize.
  	$field = null;
  	// Get field reference if exists!
  	if (isset($this->list[$name])) {
			$field =& $this->list[$name];
  	}
		return $field;
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
	public function iterator() {
		return new ArrayIterator($this->list);
	}

} // End class.