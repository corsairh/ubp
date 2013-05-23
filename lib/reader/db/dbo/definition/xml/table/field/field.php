<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field extends UBP_Lib_Db_Dbo_Definition_Table_Field {

	/**
	* put your comment there...
	* 
	* @param SimpleXMLElement $fieldElement
	* @param UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table $table
	* @return UBP_Lib_Db_Dbo_Definition_Xml_Table_Field
	*/
	public function __construct(SimpleXMLElement & $xmlElement, UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table $table) {
		// Create type object.
		$type = UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field_Type::getTypeNameInstance($xmlElement->type);
		// Construct parent field object with name.
		parent::__construct($table, (string) $xmlElement ->attributes()->name, $type);
		// Read field attributes.
		$this->comment = new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Property_Comment($xmlElement ->comment);
	}

} // End class. 