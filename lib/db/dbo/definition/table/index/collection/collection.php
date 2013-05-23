<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Dbo_Definition_Table_Index_Collection extends UBP_Lib_Db_Dbo_Definition_List_Collection {

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field $field
	* @return UBP_Lib_Db_Dbo_Definition_Table_Index_Collection
	*/
	public function add(UBP_Lib_Db_Dbo_Definition_Table_Index $index) {
		// Get name.
		$name = $index->getName();
		// Alow null name!
		if (!$name) {
			// Use numeric index!
			$name = $this->count();
		}
		// Check duplication.
		if (isset($this->list[$name])) {
			throw new UBP_Lib_Db_Dbo_Definition_Table_Field_Collection_Exception_Indexalreadyexists($index);
		}
		// Ad to list.
		$this->list[$name] = $index;
		// Chaining!
		return $index;				
	}

	/**
	* put your comment there...
	* 
	* @param mixed $name
	*/
	public function addRaw($type, $name = null) {
		// Get full type path to types directory/namespace.
		$indexesPath = "lib/db/dbo/definition/table/index/type";
		// Create index type object!
		$index = $this->getLoader()->getInstanceOf($indexesPath, $type, array($this->getTable(), $name));
		// Add to list / Return index object.
		return $this->add($index);
	}

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Index_Collection $collection
	* @param UBP_Lib_Db_Dbo_Definition_Table_Index_Collection $collection
	* @return void
	*/
	public static function copy($src, $des) {
		// Copy all fields.
		foreach ($src->list as $srcIndex) {
			// Create index object from typename and name.
			$desIndex = $des->addRaw($srcIndex->getTypeName(), $srcIndex->getName());
			// Copy field!
			self::callStatic($desIndex, 'copy', array($srcIndex, $desIndex));
		}
	}

} // End class.