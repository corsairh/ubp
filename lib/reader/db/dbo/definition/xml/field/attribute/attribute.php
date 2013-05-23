<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute extends UBP_Lib_Db_Dbo_Definition_Field_Attribute {

	/**
	* put your comment there...
	* 
	* @param SimplXMLElement $attributeElement
	* @return mixed
	*/
	public static function readValue(SimpleXMLElement $attributeElement) {
		// Initialize.
		$value = null;
		// Get allow null scalar value only if specified.
		if ($attributeElement) {
			$value = (string) $attributeElement;
		}
		return $value;
	}

} // End class.