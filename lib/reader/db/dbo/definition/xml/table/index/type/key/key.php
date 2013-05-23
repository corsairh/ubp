<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Index_Type_Key extends UBP_Lib_Db_Dbo_Definition_Table_Index_Type_Key {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $xmlType = null;
	
	/**
	* put your comment there...
	* 
	* @param mixed $xmlElement
	* @param mixed $table
	* @return UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Index_Type_Key
	*/
	public function __construct($xmlElement, $table) {
		// Initialize parent.
		parent::__construct($table, ((string) $xmlElement->attributes()->name));
		// Extend XML Index Type
		$this->xmlType = new UBP_Lib_Reader_Db_Dbo_Definition_Xml_Table_Index($xmlElement, $this);
		// Specific XML attributes read here!
		// ....
		// ....
		// ....
	}
	
} // End class. 