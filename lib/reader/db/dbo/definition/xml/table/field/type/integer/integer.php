<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field_Type_Integer extends UBP_Lib_Db_Dbo_Definition_Table_Field_Type_Integer {
	
	/**
	* put your comment there...
	* 
	* @param SimpleXMLElement $typeElement
	* @return UBP_Lib_Db_Dbo_Definition_Table_Field_Type_String_Varchar
	*/
	public function __construct(SimpleXMLElement $xmlElement) {
		// Initialize parent.
		parent::__construct();
		// Extend UBP_Lib_Db_Dbo_Definition_Xml_Table_Field_Type class!
		UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field_Type::extend($this, $xmlElement);
		// Initialize integer type object.
		$this->autoIncrement = new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute_Autoincrement($xmlElement->autoIncrement);
	}

} //End class.