<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute_Allownull  extends UBP_Lib_Db_Dbo_Definition_Field_Attribute_Allownull {

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
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	* @return UBP_Lib_Db_Dbo_Definition_Field_Attribute
	*/
	public function setValue($value = null) {
		// Cast from XML Boolean to PHP boolean.
		if ($value !== null) {
			$value = (($value == 'true') ? true : false);
		}
		// Set value.
		return parent::setValue($value);
	}
	
} // End class.