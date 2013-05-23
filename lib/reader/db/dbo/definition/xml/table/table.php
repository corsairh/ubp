<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table extends UBP_Lib_Db_Dbo_Definition_Table {
	
	/**
	* put your comment there...
	* 
	* @param mixed $tableDefinition
	* @return UBP_Ubp_Db_Definition_Table_Loader_Xml
	*/
	public function __construct($xmlDef, $loadURL = null) {
		// Load Content.
		$doc = new SimpleXMLElement($xmlDef, $loadURL);
		// Get table name and construct the parent class!
		parent::__construct((string) $doc->attributes()->name);
		// Read fields and indexes!.
		$this->fields = new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Field_Collection($doc->fields, $this);
		$this->indexes = new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Index_Collection($doc->indexes, $this);
	}

	/**
	* put your comment there...
	* 
	* @param mixed $class
	*/
	public static function loadFromClassFile($class, $extension = 'definition.xml') {
		// Class loader.
		$loader =& UBP_Lib_Classloader::getInstance();
		// Get XML file path to the class.
		$className = $loader->getClassNamePathComponent($class)->file;
		$definitionXMLFile = $loader->getClassRelativeFile($class, "{$className}.{$extension}");
		// Get XML definition content/
		$definitionXML = UBP_Lib_Filesystem_File::getInstance($definitionXMLFile)->readAll();
		// Sekf Construction!
		return new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table($definitionXML);
	}

} // End class.