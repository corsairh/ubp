<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
abstract class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field_Type extends UBP_Lib_Db_Dbo_Definition_Table_Field_Type {
	
	/**
	* put your comment there...
	* 
	* @param mixed $type
	*/
	public static function extend(UBP_Lib_Db_Dbo_Definition_Table_Field_Type $type, $typeElement) {
		// Type Element attributes
		$typeAttributes = $typeElement->children();
		// Create attributes objects.
		$type->setAllowNull(new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute_Allownull($typeAttributes->allowNull));
		$type->setDefault(new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute_Default($typeAttributes->default));
		$type->setLength(new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Field_Attribute_Length($typeAttributes->length));		
	}

	/**
	* put your comment there...
	* 
	* @param mixed $typeName
	*/
	public static function getTypeNameInstance($typeElement) {
		// Loader.
		$loader =& UBP_Lib_Classloader::getInstance();
		// Get type path.
		$typeName = (string) $typeElement->attributes()->name;
		$typePath = "lib/reader/db/dbo/definition/xml/table/field/type/{$typeName}";
		$type = $loader->getInstanceOf($typePath, null, array($typeElement));
		// Return type object.
		return $type;
	}

} // End class.