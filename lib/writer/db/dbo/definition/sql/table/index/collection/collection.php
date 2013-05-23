<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Index_Collection extends UBP_Lib_Db_Dbo_Definition_Table_Index_Collection {
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		// Initialize.
		$syntx = '';
		$syntxFormat =& $this->getTable()->getSyxFormat();
		$newLineChar = $syntxFormat->getNewLineChar();
		// Aggregate all fields deinition.
		foreach ($this->list as $index) {
			$syntx[] = ((string) $index);
		}
		// Join indexes only 
		if (!empty($syntx)) {
			$syntx = ',' . implode(",{$newLineChar}", $syntx) . $newLineChar;
		}
		// Return SYNTAX.
		return $syntx;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $type
	* @param mixed $name
	* @return UBP_Lib_Db_Dbo_Definition_Table_Index_Collection
	*/
	public function addRaw($type, $name = null) {
		// Get full type path to types directory/namespace.
		$indexesPath = "lib/writer/db/dbo/definition/sql/table/index/type";
		// Create index type object!
		$index = $this->getLoader()->getInstanceOf($indexesPath, $type, array($this->getTable(), $name));
		// Add to list / Return index object.
		return $this->add($index);
	}

} // End class.