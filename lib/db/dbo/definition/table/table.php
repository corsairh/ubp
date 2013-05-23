<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Dbo_Definition_Table extends UBP_Lib_Db_Dbo_Definition { 
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = null;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $indexes = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @return UBP_Lib_Db_Dbo_Definition_Table
	*/
	public function __construct($name) {
		parent::__construct($name);
		// Initialize.
		$this->fields = new UBP_Lib_Db_Dbo_Definition_Table_Field_Collection($this);
		$this->indexes = new UBP_Lib_Db_Dbo_Definition_Table_Index_Collection($this);
	}
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table $table
	* @param UBP_Lib_Db_Dbo_Definition_Table $table
	* @return void
	*/
	public static function copy($src, $des) {
		// Copy parent!
		parent::copy($src, $des);
		// Copy fields.
		UBP_Lib_Db_Dbo_Definition_Table_Field_Collection::copy($src->fields(), $des->fields());
		// Copy indexes.
		UBP_Lib_Db_Dbo_Definition_Table_Index_Collection::copy($src->indexes(), $des->indexes());
	}

	/**
	* put your comment there...
	* 
	*/
	public function & fields() {
		return $this->fields;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & indexes() {
		return $this->indexes;
	}

} // End class.