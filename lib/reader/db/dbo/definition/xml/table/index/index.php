<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Index extends UBP_Lib_Object {

	/**
	* put your comment there...
	* 
	* @param SimpleXMLElement $xmlElement
	* @param mixed $type
	* @return UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Index
	*/
	public function __construct(SimpleXMLElement & $xmlElement, UBP_Lib_Db_Dbo_Definition_Table_Index $type) {
		// Initialize.
		$fields =& $type->fields();
		$table =& $type->getTable();
		// Read fields.
		foreach ($xmlElement->field as $fieldElement) {
			$fieldName = (string) $fieldElement->{0};
			// Get field reference from table.
			$field =& $table->fields()->getByName($fieldName);
			// Add Refrence to the index fields list.
			$fields->add($field);
		}
	}

	/**
	* put your comment there...
	* 
	* @param mixed $xmlElement
	* @param mixed $table
	*/
	public static function getIndexTypeInstance($xmlElement, UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table $table) {
		// Initialize.
		$loader =& UBP_Lib_Classloader::getInstance();
		// Get full type path to types directory/namespace.
		$indexesPath = "lib/reader/db/dbo/definition/xml/table/index/type";
		// Create index type object!
		$index = $loader->getInstanceOf($indexesPath, $xmlElement->getName(), array($xmlElement, $table));
		// Add to list / Return index object.
		return $index;
	}

} // End class. 