<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field_Collection extends UBP_Lib_Db_Dbo_Definition_Table_Field_Collection {
	
	/**
	* put your comment there...
	* 
	* @param UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table $table
	* @param SimpleXMLElement $fieldsElement
	* @return UBP_Lib_Db_Dbo_Definition_Xml_Table_Field_Collection
	*/
	public function __construct(SimpleXMLElement & $xmlElement, UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table $table) {
		// Initialize parent.
		parent::__construct($table);
		// Read!
		$loader =& $this->getLoader();
		// Get all field elements!
		$fields = $xmlElement->field;
		// For every field create Field object.
		foreach ($fields as $fieldElement) {
			$this->add(new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field($fieldElement, $this->getTable()));
		}
	}

} // End class.