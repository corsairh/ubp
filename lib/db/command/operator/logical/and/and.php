<?php
/**
* 
*/

// No direct access.
defined('ABSPATH') or die(NO_DIRECT_ACCESS_MSG);

/**
* 
*/
class UBP_Lib_Db_Command_Operator_Logical_And extends UBP_Lib_Db_Command_Operator {
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString() {
		return " AND ";
	}

} // End class.