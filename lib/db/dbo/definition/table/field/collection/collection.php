<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Dbo_Definition_Table_Field_Collection extends UBP_Lib_Db_Dbo_Definition_List_Collection {

	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field $field
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field
	*/
	public function add(UBP_Lib_Db_Dbo_Definition_Table_Field $field) {
		// Get name.
		$name = $field->getName();
		// Check duplication.
		if (isset($this->list[$name])) {
			throw new UBP_Lib_Db_Dbo_Definition_Table_Field_Collection_Exception_Fieldalreadyexists($field);
		}
		// Ad to list.
		$this->list[$name] = $field;
		// Chaining!
		return $field;				
	}

	/**
	* put your comment there...
	* 
	* @param mixed $name
	* @param mixed $typeName
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field
	*/
	public function addRaw($name, $typeName) {
		// Create field type.
		$typePath = "lib/db/dbo/definition/table/field/type/{$typeName}";
		// Create type object.
		$type = $this->getLoader()->getInstanceOf($typePath);
		// Create field.
		$field = new UBP_Lib_Db_Dbo_Definition_Table_Field($this->getTable(), $name, $type);
		// Add to list / Return field.
		return $this->add($field);
	}

  /**
  * put your comment there...
  * 
  */
	public function clear() {
		// Clear list!
		$this->list = array();
		// Chaining.
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Collection $collection
	* @param UBP_Lib_Db_Dbo_Definition_Table_Field_Collection $collection
	* @return void
	*/
	public static function copy($src, $des) {
		// Copy all fields.
		foreach ($src->list as $srcField) {
			// Create field from field name and type name!
			$desField = $des->addRaw($srcField->getName(), $srcField->getType()->getTypeName());
			// Copy field!
			self::callStatic($desField, 'copy', array($srcField, $desField));
		}
	}

} // End class.