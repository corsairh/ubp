<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute_Default  extends UBP_Lib_Db_Dbo_Definition_Field_Attribute_Default {
	
	/**
	* put your comment there...
	* 
	* @param SimpleXMLElement $allowNull
	* @return UBP_Lib_Db_Dbo_Definition_Xml_Field_Attribute_Allownull
	*/
	public function __construct(SimpleXMLElement $xmlElement) {
		// Get value.
		$value = UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute::readValue($xmlElement);
		// Construct parent with attribute value.
		parent::__construct($value);
	}
	
} // End class.