<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field_Collection extends UBP_Lib_Db_Dbo_Definition_Table_Field_Collection {

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
		foreach ($this->list as $field) {
			$syntx[] = ((string) $field);
		}
		// Return SYNTAX.
		return implode(",{$newLineChar}", $syntx) . $newLineChar;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @param mixed $typeName
	*/
	public function addRaw($name, $typeName) {
		// Initialize.
		$table =& $this->getTable();
		// Create field type.
		$typePath = "lib/writer/db/dbo/definition/sql/table/field/type/{$typeName}";
		// Create type object.
		$type = $this->getLoader()->getInstanceOf($typePath, null, array($table));
		// Create field.
		$field = new UBP_Lib_Writer_Db_Dbo_Definition_Sql_Table_Field($table, $name, $type);
		// Add to list / Return field.
		return $this->add($field);
	}

} // End class.