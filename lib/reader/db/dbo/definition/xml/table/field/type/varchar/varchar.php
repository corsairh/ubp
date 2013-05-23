<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field_Type_Varchar extends UBP_Lib_Db_Dbo_Definition_Table_Field_Type_Varchar {
	
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
	}

} //End class.